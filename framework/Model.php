<?php

namespace Framework;

use PDO;

abstract class Model
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function all()
    {
        return $this->pdo->query("SELECT * FROM {$this->table}")
            ->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $keys = implode(",", array_keys($data));
        $values = implode(",", array_fill(0, count($data), "?"));
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($keys) VALUES ($values)");
        $stmt->execute(array_values($data));
    }
}
