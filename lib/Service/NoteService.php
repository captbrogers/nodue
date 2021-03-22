<?php

namespace OCA\Nodue\Service;

use Exception;
use OCA\Nodue\Db\Note;
use OCA\Nodue\Db\NoteMapper;
use OCA\Nodue\Exceptions\NotFoundException;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

class NoteService
{
    /** @var \OCA\Nodue\Db\NoteMapper */
    private $mapper;

    public function __construct(NoteMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findAll(string $userId)
    {
        return $this->mapper->findAll($userId);
    }

    private function handleExceptio($e)
    {
        if ($e instanceof DoesNotExistException ||
            $e instanceof MultipleObjectsReturnedException) {
            throw new NotFoundException($e->getMessage());
        } else {
            throw $e;
        }
    }

    public function find(int $id, string $userId)
    {
        try {
            return $this->mapper->find($id, $userId);

            // in order to be able to plug in different storage backends like files
            // for instance it is a good idea to turn storage related exceptions
            // into service related exceptions so controllers and service users
            // have to deal with only one type of exception
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }

    public function create(string $title, string $content, string $userId)
    {
        $note = new Note();
        $note->setTitle($title);
        $note->setContent($content);
        $note->setUserId($userId);
        return $this->mapper->insert($note);
    }

    public function update(int $id, string $title, string $content, string $userId)
    {
        try {
            $note = $this->mapper->find($id, $userId);
            $note->setTitle($title);
            $note->setContent($content);
            return $this->mapper->update($note);
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }

    public function delete(int $id, string $userId)
    {
        try {
            $note = $this->mapper->find($id, $userId);
            $this->mapper->delete($note);
            return $note;
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }
}
