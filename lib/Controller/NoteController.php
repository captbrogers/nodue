<?php

namespace OCA\Nodue\Controller;

use Exception;
use OCA\Nodue\Db\Note;
use OCA\Nodue\Db\NoteMapper;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class NoteController extends Controller
{
    /** @var \OCA\Nodue\Db\NoteMapper $noteMapper */
    private $noteMapper;

    /** @var string $userId */
    private $userId;

    /**
     * NoteController constructor.
     *
     * @since 1.0
     *
     * @param string                   $appName
     * @param \OCP\IRequest            $request
     * @param \OCA\Nodue\Db\NoteMapper $noteMapper
     * @param string                   $userId
     *
     * @return void
     */
    public function __construct(string $appName, IRequest $request, NoteMapper $noteMapper, string $userId)
    {
        parent::__construct($appName, $request);
        $this->noteMapper = $noteMapper;
        $this->userId = $userId;
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function index(): DataResponse
    {
        return new DataResponse($this->noteMapper->findAll($this->userId));
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function pinned(): DataResponse
    {
        return new DataResponse($this->noteMapper->findAll($this->userId, true));
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @param int $noteId
     *
     * @throws \Exception
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function show(int $noteId): DataResponse
    {
        try {
            return new DataResponse($this->noteMapper->find($noteId, $this->userId));
        } catch (Exception $e) {
            return new DataResponse([], Http::STATUS_NOT_FOUND);
        }
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @param string $title
     * @param string $content
     *
     * @throws \Exception
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function create(string $title, string $content): DataResponse
    {
        $note = new Note();
        $note->setTitle($title);
        $note->setContent($content);
        $note->setUserId($this->userId);

        return new DataResponse($this->noteMapper->insert($note));
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @param int    $noteId
     * @param string $title
     * @param string $content
     *
     * @throws \Exception
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function update(int $noteId, string $title, string $content): DataResponse
    {
        try {
            $note = DataResponse($this->noteMapper->find($noteId, $this->userId));
        } catch (Exception $e) {
            return new DataResponse([], Http::STATUS_NOT_FOUND);
        }

        $note->setTitle($title);
        $note->setContent($content);
        $note->setUpdatedAt(gmdate('Y-m-d H:i:s'));

        return new DataResponse($this->noteMapper->update($note));
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @since 1.0
     *
     * @param int $noteId
     *
     * @throws \Exception
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function destroy(int $noteId): DataResponse
    {
        try {
            $note = DataResponse($this->noteMapper->find($noteId, $this->userId));
        } catch (Exception $e) {
            return new DataResponse([], Http::STATUS_NOT_FOUND);
        }

        $this->noteMapper->delete($note);
        return new DataResponse($note);
    }
}
