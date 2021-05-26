<?php
function db__getRow($sql){
  global $dbConnect;
  $rs = mysqli_query($dbConnect, $sql);
  $row = mysqli_fetch_assoc($rs);

  return $row;
}

function db__getRows($sql){
  global $dbConnect;
  $rs = mysqli_query($dbConnect, $sql);
  $rows = [];
  while($row = mysqli_fetch_assoc($rs)){
    $rows[] = $row;
  }
  
  return $rows;
}

function db__insert($sql){
  global $dbConnect;
  mysqli_query($dbConnect, $sql);

  return mysqli_insert_id($dbConnect);
}

function db__modify($sql){
  global $dbConnect;
  mysqli_query($dbConnect, $sql);
}

function db__delete($sql){
  global $dbConnect;
  mysqli_query($dbConnect, $sql);
}