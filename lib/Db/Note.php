<?php

namespace OCA\Nodue\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Note extends Entity implements JsonSerializable
{
    /** @var string $userId */
    protected $userId;

    /** @var string $aclUserIds */
    protected $aclUserIds;

    /** @var boolean $isPinned */
    protected $isPinned;

    /** @var string $title */
    protected $title;

    /** @var string $content */
    protected $content;

    /** @var string $createdAt */
    protected $createdAt;

    /** @var string $updatedAt */
    protected $updatedAt;

    /**
     * Note entity constructor.
     *
     * @since 1.0
     *
     * @return void
     */
    public function __construct()
    {
        $this->addType('id', 'integer');
    }

    /**
     * JSON serialize entity data.
     *
     * @since 1.0
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'is_pinned'  => $this->is_pinned,
            'title'      => $this->title,
            'content'    => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
