<?php
header("Access-Control-Allow-Origin: *");
Header("Content-Type: application/json; charset=UTF-8");

include_once "../database/database.php";
include_once "../objects/wine.php";

$database = new Database();
$db = $database->getConnection();

$wine = new Wine($db);

$stmt = $wine->readAll();
$num = $stmt->rowCount();

if($num>0){
  $data="";
  $x=1;

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    $data .= '{';
      $data .= '"id":"' . $wine_id . '",';
      $data .= '"name":"' . $name . '",';
      $data .= '"year":"' . $year . '",';
      $data .= '"grapes":"' . $grapes . '",';
      $data .= '"country":"' . $country . '",';
      $data .= '"region":"' . $region . '",';
      $data .= '"description":"' . $description . '",';
      $data .= '"picture":"' . $picture . '"';
    $data .='}';

    $data .= $x<$num ? ',' : '';

    $x++;
  }
}

echo json_encode('['.$data.']');
