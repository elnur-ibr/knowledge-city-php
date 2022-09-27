<?php

namespace App\Core;

use PDO;

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
     * @var string
     */
    private string $query;

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
        $this->query = "SELECT * FROM $this->table";

        $this->processWheres();
        $this->processLimit();

        $stmt = $this->pdo->prepare($this->query);

        //Binding params
        if (isset($this->bindings) && count($this->bindings)) {
            foreach ($this->bindings as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
        }

        return $stmt;
    }

    /**
     * @return void
     */
    public function processLimit(): void
    {
        if(isset($this->limit)) {
            $this->query = implode(' ', [$this->query, "LIMIT $this->limit"]);
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

            $this->query = implode(' ', [$this->query, 'WHERE', $whereQuery]);
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
}