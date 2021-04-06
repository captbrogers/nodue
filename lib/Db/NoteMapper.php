<?php

namespace OCA\Nodue\Db;

use OCA\Nodue\Db\Note;
use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;
use OCP\AppFramework\Db\Entity;

class NoteMapper extends QBMapper
{
    /**
     * NoteMapper constructor.
     *
     * @since 1.0
     *
     * @param \OCP\IDBConnection $db
     *
     * @return void
     */
    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, 'nodue', Note::class);
    }

    /**
     * Find a Note entity by id that belongs to a user.
     *
     * @since 1.0
     *
     * @param int    $noteId
     * @param string $userId
     *
     * @return \OCP\AppFramework\Db\Entity
     */
    public function find(int $noteId, string $userId): Entity
    {
        $qb = $this->db->getQueryBuilder();
        $cleanNoteId = $qb->expr()->eq('id', $qb->createNamedParameter($noteId));
        $cleanUserId = $qb->expr()->eq('user_id', $qb->createNamedParameter($userId));

        $qb->select('*')
            ->from($this->getTableName())
            ->where($cleanNoteId)
            ->andWhere($cleanUserId);

        return $this->findEntity($qb);
    }

    /**
     * Find all Note entities belonging to a user.
     *
     * @since 1.0
     *
     * @param string $userId
     * @param boolean $isPinned
     *
     * @return array
     */
    public function findAll(string $userId, bool $isPinned = false): array
    {
        $qb = $this->db->getQueryBuilder();
        $cleanUserId = $qb->expr()->eq('user_id', $qb->createNamedParameter($userId));

        $qb->select('*')
            ->from($this->getTableName())
            ->where($cleanUserId)
            ->where('is_pinned = :isPinned')
            ->setParameter('isPinned', $isPinned);

        return $this->findEntities($qb);
    }
}
