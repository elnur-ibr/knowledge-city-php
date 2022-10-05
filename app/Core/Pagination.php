<?php

namespace App\Core;

use PDO;

class Pagination
{
    /**
     * @var DB
     */
    protected DB $db;
    public int $currentPage;
    public int $perPage;
    public int $total;
    public int $lastPage;
    public array $items = [];

    public function __construct(DB $db, int $currentPage, int $perPage)
    {
        $this->db = $db;
        $this->currentPage = $currentPage;
        $this->perPage = $perPage;

        $this->totalCount();
        $this->setLastPage();
        $this->setItems();
    }

    public function totalCount()
    {
        $this->db->removeLimit();
        $this->db->removeOffset();

        $stmt = $this->db->prepareCountQuery();

        $stmt->execute();

        $this->total =  $stmt->fetch(PDO::FETCH_ASSOC)['count(*)'];
    }

    public static function make(DB $db, int $page, int $perpage)
    {
        return new self(...func_get_args());
    }

    public function toArray(): array
    {
        return [
            'total'       => $this->total,
            'lastPage'    => $this->lastPage,
            'items'       => $this->items,
            'perPage'     => $this->perPage,
            'currentPage' => $this->currentPage,
        ];
    }

    public function setLastPage()
    {
        $this->lastPage = (integer) ($this->total / $this->perPage);
    }

    public function setItems()
    {
        $this->db->limit($this->perPage);
        $this->db->offset($this->currentPage);

        $stmt = $this->db->prepareSelectQuery();

        $stmt->execute();

        $this->items =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}