<?php

namespace OCA\Nodue\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class NoteController extends Controller
{
    /**
     * NoteController constructor.
     *
     * @param string        $appName
     * @param \OCP\IRequest $request
     * @param string        $userId
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return void
     */
    public function __construct(string $appName, IRequest $request, string $userId)
    {
        parent::__construct($appName, $request);
        $this->userId = $userId;
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function index(): DataResponse
    {
        //
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @param int $noteId
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function show(int $noteId): DataResponse
    {
        //
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @param string $title
     * @param string $content
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function create(string $title, string $content): DataResponse
    {
        //
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @param int    $noteId
     * @param string $title
     * @param string $content
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function update(int $noteId, string $title, string $content): DataResponse
    {
        //
    }

    /**
     * Description
     *
     * @NoAdminRequired
     *
     * @param int $noteId
     *
     * @throws \Exception
     *
     * @since 1.0
     *
     * @return \OCP\AppFramework\Http\DataResponse
     */
    public function destroy(int $noteId): DataResponse
    {
        //
    }
}
