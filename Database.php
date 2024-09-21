<?php

class Database {
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = 'password') {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  }

  public function query($sql, $params = []) {
    $this->statement = $this->connection->prepare($sql);
    $this->statement->execute($params);
    
    return $this;
  }

  public function find() {
    return $this->statement->fetch();
  }

  public function findAll() {
    return $this->statement->fetchAll();
  }

  public function findOrFail() {
    $result = $this->find();
    if (!$result) {
      abort(ResponseCode::NOT_FOUND);
    }
    return $result;
  }
}