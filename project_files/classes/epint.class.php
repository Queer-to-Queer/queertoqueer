<?php

class epint extends DatabaseObject {

  static protected $table_name = "ep_int";
  static protected $db_columns = ['id', 'id_episodio', 'id_intervistato'];

  public $id;
  public $id_episodio;
  public $id_intervistato;


  static public function find_by_episode_id($id){
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id_episodio='" . self::$database->escape_string($id) . "'";
    return static::find_by_sql($sql);
  }

}

?>
