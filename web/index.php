<?php
include "php/DBConnect.php";
?>

<html>
  <head>
    <title>Game Project???</title>
    <link rel="stylesheet" type="text/css" href="lib/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/base.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/layout.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  </head>
  <body id="Main Page">
    <div class="container">
      <h1 class="remove-bottom"><a href="index.html">Game Project!</a></h1>
      <h3>Finding some table shit!</h3>
      <div class="nine columns clearfix">
        <form class="formContent" action="php/Basic.php" method="post">
        <select name="queries[]" data-placeholder="Look for what?" style="width:500px;" class="chosen-select" multiple>
          <option value=""></option>
          <optgroup class="gameGroup" label="Games"></optgroup>
          <optgroup class="playerGroup" label="Players"></optgroup>
          <optgroup class="systemGroup" label="System"></optgroup>
        </select>
        <div class="three columns offset-by-one">
        <input type="submit" class="submit" value="Go!" class="submit button" />
        </div>
      </form>
      </div>
    </div>
    <script type="text/javascript" src="lib/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/searching.js"></script>
    <script>
    <?php

    $conn = openConnect();
    $genreQuery = "select * from Games";
    $result = mysql_query($genreQuery, $conn);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo $row;
      }
    } else {
      echo "0 results";
    }

    while ( $row = mysql_fetch_assoc($result) ) {
      echo "$('.genreGroup').append('<option value=\"Genre : ".$row['genre']."\">Genre : ".$row['genre']." </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }

    function getPlayer($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS");
      return $res;
    }

    function getGames($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES");
      return $res;
    }

    function getPlayerByGender($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY GENDER");
      return $res;
    }

    function getPlayerByRegion($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY REGION");
      return $res;
    }

    function getPlayerByGenre($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY PREFFERED_GENRE");
      return $res;
    }

    function getPlayerByIncome($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY INCOME");
      return $res;
    }

    function getPlayerByMarital($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY MARITAL_STATUS");
      return $res;
    }

    function getGamesByDeveloper($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY DEVELOPER");
      return $res;
    }

    function getGamesByPublisher($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY PUBLISHER");
      return $res;
    }

    function getGamesByGenre($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY GENRE");
      return $res;
    }

    function getGamesByESRB($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY ESRB");
      return $res;
    }

    function getGamesByRating($SQLConnection) {
      $res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY WEB_RATING");
      return $res;
    }

    function getOther($SQLConnection, $SQLQuery) {
      $res = $SQLConnection->query($SQLQuery);
      return $res;
    }

    function printResult($SQLResult) {
      if($SQLResult->num_rows >0) {
        while($row = $SQLResult->fetch_assoc()) {
          echo $row;
        }

      }

    }
    ?>
  </script>
  </body>
</html>
