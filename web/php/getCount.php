<?php
  include 'DBConnect.php';

  $conn = openConnect();

  $num = $_POST['indexNum'];
  $val = $_POST['info'];
  $out = array();
  if ($num == 0){
    $query = 'select count(title) as num from TestGames where title='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }
  else if ($num == 1) {
    $query = 'select count(web_rating) as num from TestGames where web_rating='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }
  else if ($num == 2) {
    $query = 'select count(user_rating) as num from TestGames where user_rating='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }
  else if ($num == 3) {
    $query = 'select count(Developer) as num from TestGames where Developer='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }
  else if ($num == 4) {
    $query = 'select count(Publisher) as num from TestGames where Publisher='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }
  else if ($num == 5) {
    $query = 'select count(Genres) as num from TestGames where Genres='.$val;
    $result = $conn->query($query);
    if (empty($result)) {
      echo "0";
      exit();
    }
    while ( $row = $result->fetch_assoc() ) {
      $out = $row['num'];
    }
    echo "$out";
    exit();
  }

?>
