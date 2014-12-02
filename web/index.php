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
      <h1 class="remove-bottom"><a href="index.php">Game Project!</a></h1>
      <h3>Finding some table shit!</h3>
      <div class="nine columns clearfix">
        <form class="formContent" action="php/queries.php" method="post">
        <select name="queries" data-placeholder="Look for what?" style="width:500px;" class="chosen-select" multiple>
          <option value=""></option>
          <optgroup class="gameGroup" label="Games"></optgroup>
          <optgroup class="titleGroup" label="Titles"></optgroup>
          <optgroup class="webGroup" label="Web Rating"></optgroup>
          <optgroup class="urGroup" label="User Rating"></optgroup>
          <optgroup class="devGroup" label="Developer"></optgroup>
          <optgroup class="pubGroup" label="Publisher"></optgroup>
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


    $fromArray = array('"', '\'', '&'. '(', ')');
    $toArray = array('', '', '', '', '');

    $mainQuery = 'select * from TestGames';
    $result = $conn->query($mainQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['title']);
      echo "$('.titleGroup').append('<option value=\"title : " . $stripped . "\">Title : " . $stripped . " </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }
    $result = $conn->query($mainQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['web_rating']);
      echo "$('.webGroup').append('<option value=\"web rating : " . $stripped . "\">Web Rating : " . $stripped . " </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }
    $result = $conn->query($mainQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['Developer']);
      echo "$('.devGroup').append('<option value=\"developer : " . $stripped . "\">Developer : " . $stripped . " </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }
    $result = $conn->query($mainQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['Publisher']);
      echo "$('.pubGroup').append('<option value=\"publisher : " . $stripped . "\">Publisher : " . $stripped . " </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }
    $result = $conn->query($mainQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['user_rating']);
      echo "$('.urGroup').append('<option value=\"user rating : " . $stripped . "\">User Rating : " . $stripped . " </option>');";
      echo "$('.chosen-select').trigger('chosen:updated');";
    }

    ?>
  </script>
  </body>
</html>
