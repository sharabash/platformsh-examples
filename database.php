<?php
function play_with_database($database_name){
  $link = mysqli_connect($relationships[$database_name][0]['host'], $relationships[$database_name][0]['username'], $relationships[$database_name][0]['password'], $relationships[$database_name][0]['path'])
      or die('Could not connect: ' . mysql_error());
  // Performing SQL queries
  echo "<div class=\"well\"> <h4>Create Table Gibberish</h4>";
  $query = 'CREATE TABLE giberrish (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, random_stuff VARCHAR(30) NOT NULL);';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  $giberrish =  str_shuffle("Platform.sh is a powerful new cloud solution for Continuous Integration and Hosting of PHP websites");
  $query = 'INSERT INTO giberrish(random_stuff) VALUES ("'.$giberrish.'");';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  $query = 'SELECT * from giberrish;';
  $result = mysqli_query($link, $query) or print(mysqli_error($link));
  echo "</div><h5>Created table inserted values here are the results:</h5><div>";
  while($obj = $result->fetch_object()){
      echo $obj->id.": ". $obj->random_stuff ."<br>";
  }
}
if (empty($_ENV['PLATFORM_RELATIONSHIPS'])){
    echo "<h4>This script does not seem to be running on Platform.sh</h4>";    
    } 
else 
{
    echo "<h5>Here is the configuration for this app \$PLATFORM_APPLICATION:<h5><code>".base64_decode($_ENV['PLATFORM_APPLICATION'])."</code>";
    echo "<h5>Here are the routes for this app \$PLATFORM_ROUTES:<h5><code>".base64_decode($_ENV['PLATFORM_ROUTES'])."</code>";
    echo "<h5>Here are the relationships for this app \$PLATFORM_RELATIONSHIPS:<h5><code>".base64_decode($_ENV['PLATFORM_RELATIONSHIPS'])."</code>";

    /* We get the relationships form the platform environement */
    $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
    
    /* We are using  here the two databases called "database1" and "database2" found in our relationships
     * this is configured in .platform.app.yaml Line 6
     */
    play_with_database("database1"); 
    play_with_database("database2");
    echo "</div><div class=\"well\">You can play with branching from this environment and see what happens. You
          will notice that if you branch after running this the database structure
          as well as the data will be copied with the environment to the new one.</div>";
}
?>