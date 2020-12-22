<?php

class Episodi extends DatabaseObject {

  static protected $table_name = "episodi";
  static protected $db_columns = ['id', 'title', 'voices', 'descr', 'testo', 'img_cover'];

  public $id;
  public $title;
  public $voices;
  public $descr;
  public $testo;
  public $img_cover;

  static public function list_episodes(){
    $sql = "SELECT * FROM " . static::$table_name ." ORDER BY id DESC";
    return static::find_by_sql($sql);
  }

}

?>
