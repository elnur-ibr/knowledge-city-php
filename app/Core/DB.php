<?php

namespace App\Core;

use PDO;
use PDOStatement;

class DB
{
    /**
     * @var PDO
     */
    private PDO $pdo;

    /**
     * @var string
     */
    private string $table;

    /**
     * @var array
     */
    private array $wheres;

    /**
     * @var array
     */
    private array $bindings = [];

    /**
     * @var int
     */
    private int $offset;

    /**
     * @var int
     */
    private int $limit;

    /**
     * @var array
     */
    private array $query = [];

    /**
     *
     */
    public function __construct()
    {
        $this->initPdo();
    }

    /**
     * @return void
     */
    public function initPdo(): void
    {
        $this->pdo = new PDO(
            'mysql:host=' . config('database.host')
            . ';dbname=' . config('database.database'),
            config('database.username'),
            config('database.password')
        );
    }

    /**
     * @param string $table
     * @return self
     */
    public function table(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string $column
     * @param string $value
     * @return DB
     */
    public function where(string $column, string $value): self
    {
        $this->wheres [] = [
            'column' => $column,
            'value'  => $value,
        ];

        return $this;
    }

    /**
     * @return false|\PDOStatement
     */
    public function prepareSelectQuery(): mixed
    {
        $this->query = ["SELECT *"];

        return $this->proceed();
    }

    /**
     * @return false|PDOStatement
     */
    public function prepareCountQuery()
    {
        $this->query = ["SELECT count(*)"];

        return $this->proceed();
    }

    /**
     * @return false|PDOStatement
     */
    public function proceed()
    {
        $this->fromTable();
        $this->processWheres();
        $this->processLimit();
        $this->processOffset();

        $stmt = $this->pdo->prepare(implode(' ', $this->query));

        $this->bindParams($stmt);

        return $stmt;
    }

    /**
     * @return void
     */
    public function fromTable(): void
    {
        $this->query [] = "FROM $this->table";
    }

    /**
     * @param PDOStatement $stmt
     * @return void
     */
    public function bindParams(PDOStatement &$stmt): void
    {
        if (isset($this->bindings) && count($this->bindings)) {
            foreach ($this->bindings as $key => $value) {
                if (is_array($value)) {
                    $stmt->bindValue($key + 1, $value['value'], $value['type']);
                } else {
                    $stmt->bindValue($key + 1, $value);
                }
            }
        }
    }

    /**
     * @return void
     */
    public function processOffset(): void
    {
        if (isset($this->offset)) {
            $this->query [] = 'OFFSET ?';
            $this->bindings [] = ['value' => $this->offset, 'type' => PDO::PARAM_INT];
        }
    }

    /**
     * @return void
     */
    public function processLimit(): void
    {
        if (isset($this->limit)) {
            $this->query [] = 'LIMIT ?';
            $this->bindings [] = ['value' => $this->limit, 'type' => PDO::PARAM_INT];
        }
    }

    /**
     * @return void
     */
    public function processWheres(): void
    {
        if (isset($this->wheres) && count($this->wheres)) {
            $whereQuery = [];
            foreach ($this->wheres as $key => $condition) {

                $whereQuery [] = $condition['column'] . ' = ?';

                $this->bindings [] = $condition['value'];
            }

            $whereQuery = implode(' and ', $whereQuery);

            $this->query [] = implode(' ', ['WHERE', $whereQuery]);
        }
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $stmt = $this->prepareSelectQuery();

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        $this->limit = 1;

        $stmt = $this->prepareSelectQuery();

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $page
     * @param int $limit
     */
    public function paginate(int $page = 1, int $perPage = 15)
    {
        /*
        $this->limit($perPage);
        $this->offset($page);

        $stmt = $this->prepareSelectQuery();

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        */

        return Pagination::make($this, $page, $perPage)->toArray();
    }

    /**
     * @param int $page
     * @return void
     */
    public function offset(int $page): void
    {
        $this->offset = ($page - 1) * $this->limit;
    }

    /**
     * @param int $limit
     * @return void
     */
    public function limit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return void
     */
    public function removeLimit()
    {
        unset($this->limit);
    }

    /**
     * @return void
     */
    public function removeOffset()
    {
        unset($this->offset);
    }
}