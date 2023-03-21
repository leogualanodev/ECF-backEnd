<?php

require_once('./src/models/class/database.class.php');

class Topics extends Database {


  public string $name;

  public function __construct()
  {
    parent::__construct();
  }

}