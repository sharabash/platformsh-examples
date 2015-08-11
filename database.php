<?php
/*
* Hey guys, I know this is horrible horrible code.. This is just to explain how to use platform.sh
* Not how to write proper PHP code..
*/
function play_with_database($database_name, $relationships){
  $link = mysqli_connect($relationships[$database_name][0]['host'], $relationships[$database_name][0]['username'], $relationships[$database_name][0]['password'], $relationships[$database_name][0]['path'])
      or die('Could not connect: ' . mysql_error());
  // Performing SQL queries
  echo "<h1>Connecting to Database:$database_name </h1>";
  echo "<hr> <h4>Create Table Gibberish</h4>";
  $query = 'CREATE TABLE giberrish (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, random_stuff VARCHAR(30) NOT NULL);';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  $giberrish =  str_shuffle("Platform.sh is a powerful new cloud solution for Continuous Integration and Hosting of PHP websites");
  $query = 'INSERT INTO giberrish(random_stuff) VALUES ("'.$giberrish.'");';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  $query = 'SELECT * from giberrish;';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  echo "<hr><h5>Created table inserted values here are the results:</h5><hr>";
  while($obj = $result->fetch_object()){
      echo $obj->id.": ". $obj->random_stuff ."<br>";
  }
  echo "<hr>";
}


if (empty($_ENV['PLATFORM_RELATIONSHIPS'])){
    echo "<h4>This script does not seem to be running on Platform.sh</h4>";    
  } 
else 
{
    echo "<h5>Here is the configuration for this app from the \$PLATFORM_APPLICATION environment variable:</h5><code>".json_encode(json_decode(base64_decode($_ENV['PLATFORM_APPLICATION']),true), JSON_PRETTY_PRINT)."</code>";
    echo "<h5>Here are the routes for this app from the \$PLATFORM_ROUTES environment variable:<h5><code>".json_encode(json_decode(base64_decode($_ENV['PLATFORM_ROUTES']),true), JSON_PRETTY_PRINT)."</code>";
    echo "<h5>Here are the relationships for this app from the \$PLATFORM_RELATIONSHIPS environment variable:</h5><pre>".json_encode(json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']),true), JSON_PRETTY_PRINT)."</pre>";

    /* We get the relationships from the platform environement */
    $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
    
    /* We are using  here the two databases called "database1" and "database2" found in our relationships
     * this is configured in .platform.app.yaml Line 6
     */
    play_with_database("first_database", $relationships); 
    play_with_database("second_database", $relationships);
    echo "<hr><br><div class=\"well\">You can play with branching from this environment and see what happens. You
          will notice that if you branch after running this the database structure
          as well as the data will be copied with the environment to the new one.</div>";
}
?>