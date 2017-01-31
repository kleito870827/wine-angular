<?php
class Wine{
  private $conn;
  Private $table_name = "wine";

  public $wine_id;
  public $name;
  public $year;
  public $grapes;
  public $country;
  public $region;
  public $description;
  public $picture;

  public function __construct($db){
    $this->conn = $db;
  }

  function readAll(){
    $query = "SELECT
              *
            FROM
            ". $this->table_name . "
            ORDER BY
            id DESC";

  $stmt = $this->conn->prepare( $query );

  $stmt->execute();

  return $stmt;
  }
}
?>
