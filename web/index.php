<?php
include "php/DBConnect.php";
?>

<html>
  <head>
    <title>GameR PlayeR</title>
    <link rel="stylesheet" type="text/css" href="lib/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/base.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/layout.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  </head>
  <body id="main">
  <a href="https://github.com/manny/final_db_project"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
    <div class="container">
      <div class="centre">
      <h1 class="remove-bottom"><a href="index.php">Game<span id="R">R</span> Playe<span id="R">R</span></a></h1>
      <h6 id="description">Use our extensive gamer database to gain insights about gamers and make more effective recomendations!</h3>
      <div class="nine columns clearfix">
        <form class="formContent" action="php/queries.php" method="post">
        <select name="queries[]" data-placeholder="Search by game info (title, rating, genre, etc)" style="width:400px;" class="chosen-select" multiple>
          <option value=""></option>
          <optgroup class="gameGroup" label="Games"></optgroup>
          <optgroup class="titleGroup" label="Titles"></optgroup>
          <optgroup class="webGroup" label="Web Rating"></optgroup>
          <optgroup class="urGroup" label="User Rating"></optgroup>
          <optgroup class="devGroup" label="Developer"></optgroup>
          <optgroup class="pubGroup" label="Publisher"></optgroup>
          <optgroup class="genreGroup" label="Publisher"></optgroup>
          <optgroup class="esrbGroup" label="ESRB"></optgroup>
          <optgroup class="genderGroup" label="Gender "></optgroup>
          <optgroup class="incomeGroup" label="Income "></optgroup>
          <optgroup class="regionGroup" label="Region "></optgroup>
          <optgroup class="gnGroup" label="Given Name "></optgroup>
          <optgroup class="snGroup" label="Surname "></optgroup>
          <optgroup class="miGroup" label="Middle Initial "></optgroup>
          <optgroup class="cityGroup" label="City Group "></optgroup>
          <optgroup class="stateGroup" label="City Group "></optgroup>
          <optgroup class="msGroup" label="City Group "></optgroup>
          <optgroup class="pgGroup" label="City Group "></optgroup>
          <optgroup class="systemGroup" label="System"></optgroup>
          <div class="three columns offset-by-one">
            <input type="submit" id="submit-button" class="submit" value="Go!" class="submit-button" />
          </div>
        </select>
      </div>
      </form>
      </div>
    <script type="text/javascript" src="lib/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/searching.js"></script>
    <script async>
    <?php

    $conn = openConnect();


    $fromArray = array('"', '\'', '&'. '(', ')', '|');
    $toArray = array('', '', '', '', '', '');

    #Game Shit

    $gameQuery = 'select distinct * from TestGames';
    $result = $conn->query($gameQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['title']);
      echo "$('.titleGroup').append('<option value=\"title - " . $stripped . "\">Title - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['web_rating']);
      echo "$('.webGroup').append('<option value=\"web rating - " . $stripped . "\">Web Rating - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Developer']);
      echo "$('.devGroup').append('<option value=\"developer - " . $stripped . "\">Developer - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Publisher']);
      echo "$('.pubGroup').append('<option value=\"publisher - " . $stripped . "\">Publisher - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['user_rating']);
      echo "$('.urGroup').append('<option value=\"user rating - " . $stripped . "\">User Rating - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Genres']);
      echo "$('.genreGroup').append('<option value=\"genres - " . $stripped . "\">Genres - " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['esrb']);
      echo "$('.esrbGroup').append('<option value=\"esrb - " . $stripped . "\">ESRB - " . $stripped . " </option>');";
    }

    #People Shit
    /*
    $peopleQuery = 'select distinct * from TestPlayers2';
    $result = $conn->query($peopleQuery);
    while ( $row = $result->fetch_assoc() ) {
      $stripped = str_replace($fromArray,$toArray,$row['Income']);
      echo "$('.incomeGroup').append('<option value=\"income : " . $stripped . "\">Income : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Region']);
      echo "$('.regionGroup').append('<option value=\"region : " . $stripped . "\">Region : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Gender']);
      echo "$('.genderGroup').append('<option value=\"gender : " . $stripped . "\">Gender : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['GivenName']);
      echo "$('.gnGroup').append('<option value=\"given name : " . $stripped . "\">Given Name : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['MiddleInitial']);
      echo "$('.miGroup').append('<option value=\"middleinitial : " . $stripped . "\">Middile Initial : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['SurName']);
      echo "$('.snGroup').append('<option value=\"surname : " . $stripped . "\">Surname : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['City']);
      echo "$('.cityGroup').append('<option value=\"city : " . $stripped . "\">City : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['State']);
      echo "$('.stateGroup').append('<option value=\"state : " . $stripped . "\">State : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Marital_Status']);
      echo "$('.msGroup').append('<option value=\"marital status : " . $stripped . "\">Marital Status : " . $stripped . " </option>');";
      $stripped = str_replace($fromArray,$toArray,$row['Preferred_Genre']);
      echo "$('.pgGroup').append('<option value=\"preferred genre : " . $stripped . "\">Preferred Genre : " . $stripped . " </option>');";
    }
    */

    echo "$('.chosen-select').trigger('chosen:updated');";
    ?>
  </script>
  <script>
  var found = [];
  $("select option").each(function() {
    if($.inArray(this.value, found) != -1) $(this).remove();
    found.push(this.value);
  });
  echo "HERE!";
  echo "$('.chosen-select').trigger('chosen:updated');";
  </script>
  </body>
</html>
