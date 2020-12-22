<?php

class Team extends DatabaseObject {

  static protected $table_name = "team";
  static protected $db_columns = ['id', 'nome', 'cognome', 'title', 'email', 'descr', 'quote', 'img_path', 'ig', 'fb'];

  public $id;
  public $nome;
  public $cognome;
  public $title;
  public $descr;
  public $quote;
  public $img_path;
  public $ig;
  public $fb;

}

?>
