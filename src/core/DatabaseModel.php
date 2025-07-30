<?php

class DatabaseModel{
  protected $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

  public function fetchAll($sql){
    $result = $this->mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  // public function execute($sql, $params = []){
  //   $stmt = $this->mysqli->prepare($sql);
  //   if ($params){
  //     $stmt->bind_param(...$params);
  //   }
  //   $stmt->execute();
  //   $stmt->close();
  // }


protected function execute($sql, $params = []) {
  $stmt = $this->mysqli->prepare($sql);
  if ($params) {
    if (is_array($params) && count($params) >= 2 && is_string($params[0])) {
      $types = array_shift($params); // 先頭の型定義を取り出す
      $stmt->bind_param($types, ...$params);
    }
  }
  $stmt->execute();
    $stmt->close();
  // return $stmt;
}
}
