<?php

class Intervistati extends DatabaseObject {

  static protected $table_name = "intervistati";
  static protected $db_columns = ['id', 'nome', 'cognome', 'descr'];

  public $id;
  public $nome;
  public $cognome;
  public $descr;

}

?>
