<?php

namespace OCA\Nodue\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class NoteMapper extends QBMapper
{

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, 'notestutorial_notes', Note::class);
    }

    public function find(int $id, string $userId)
    {
        $qb = $this->db->getQueryBuilder();
        $cleanNoteId = $qb->expr()->eq('id', $qb->createNamedParameter($id));
        $cleanUserId = $qb->expr()->eq('user_id', $qb->createNamedParameter($userId));

        $qb->select('*')
            ->from($this->getTableName())
            ->where($cleanNoteId)
            ->andWhere($cleanUserId);

        return $this->findEntity($qb);
    }

    public function findAll(string $userId)
    {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
           ->from($this->getTableName())
           ->where(
            $qb->expr()->eq('user_id', $qb->createNamedParameter($userId))
           );

        return $this->findEntities($qb);
    }
}
