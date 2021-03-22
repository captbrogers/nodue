<?php

namespace OCA\Nodue\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Note extends Entity implements JsonSerializable
{
    /** @var string $title */
    protected $title;

    /** @var string $content */
    protected $content;

    /** @var string $userId */
    protected $userId;

    /** @var string $aclUserIds */
    protected $aclUserIds;

    public function __construct()
    {
        $this->addType('id', 'integer');
    }

    public function jsonSerialize()
    {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'content' => $this->content,
        ];
    }
}
