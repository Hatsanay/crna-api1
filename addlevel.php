<?php 
  $db = "db_crna";
  $host = "localhost";
  $db_user = 'root';
  $db_password = '';
  //MySql server and database info

  $link = mysqli_connect($host, $db_user, $db_password, $db);
  //connecting to database

  if(isset($_REQUEST["country"])){
      $country = $_REQUEST["country"];
  }else{
      $country = "";
  } //if there is country parameter then grab it

  $json["error"] = false;
  $json["errmsg"] = "";
  $json["data"] = array();

  $country = mysqli_real_escape_string($link, $country);
  //remove the conflict of inverted comma with SQL query. 

  $sql = "SELECT * FROM city_list WHERE LCASE(country_name) = LCASE('$country') ORDER BY city_name ASC";
  $res = mysqli_query($link, $sql);
  $numrows = mysqli_num_rows($res);
  if($numrows > 0){
     //check if there is any data
      while($array = mysqli_fetch_assoc($res)){
           array_push($json["data"], $array);
      }
  }else{
      $json["error"] = true;
      $json["errmsg"] = "No any data to show.";
  }

  mysqli_close($link);

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($json);

?>