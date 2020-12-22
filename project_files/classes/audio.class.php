<?php

class Audio extends DatabaseObject {

  static protected $table_name = "audio";
  static protected $db_columns = ['id', 'title', 'voices', 'episode', 'genre', 'duration', 'path', 'albumOrder', 'plays' ];

  public $id;
  public $title;
  public $voices;
  public $episode;
  public $genre;
  public $duration;
  public $path;
  public $albumOrder;
  public $plays;

  static public function find_duration_by_id($id){
    $sql = "SELECT duration FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>
