<html>
<head>
    <title>Platform.sh minimal example with DB connectivity</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body class="container">
    <div class="page-header">
        <h1>Platform.sh minimal example</h1>
        <h2>With a MySQL Instance</h2>
        <img src="image.jpg" width="20%" alt="DATABASE at Postmasters, March 2009">
    </div>
    <div><em>Image Credit: DATABASE at Postmasters, March 2009, by Michael Mandiberg, CC BY-SA 2.0</em></div>

<?php
    if (empty($_ENV['PLATFORM_RELATIONSHIPS'])){
        echo "<h4>This script does not seem to be running on Platform.sh</h4>";    
        } 
    else 
    {
        echo "<h5>Here is the configuration for this app \$PLATFORM_APPLICATION:<h5><pre>".base64_decode($_ENV['PLATFORM_APPLICATION'])."</pre>";
        echo "<h5>Here are the routes for this app \$PLATFORM_ROUTES:<h5><pre>".base64_decode($_ENV['PLATFORM_ROUTES'])."</pre>";
        echo "<h5>Here are the relationships for this app \$PLATFORM_RELATIONSHIPS:<h5><pre>".base64_decode($_ENV['PLATFORM_RELATIONSHIPS'])."</pre>";

        /* We get the relationships form the platform environement */
        $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
        
        /* We are using a database called "database" found in our relationships
         * this is configured in .platform.app.yaml Line 6
         */
        $link = mysql_connect($relationships['database'][0]['host'], $relationships['database'][0]['username'], $relationships['database'][0]['password'])
            or die('Could not connect: ' . mysql_error());
        echo '<h5>Connected successfully<h5>';
        mysql_select_db($relationships['database'][0]['path']) or die('Could not select database');
        // Performing SQL query
        echo "<div class=well>";
        $query = 'CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL);';
        $result = mysql_query($query) or print(mysql_error());
        echo "</div><div";
        $query = 'INSERT INTO users(name) VALUES ("John");';
        $result = mysql_query($query) or print(mysql_error());
        echo "</div><div>";
        $query = 'SELECT * from users;';
        $result = mysql_query($query) or print(mysql_error());
        echo "</div><h5>Created table inserted values here is the first result:</h5><div>";
        echo mysql_result($result, 0) . ": " .mysql_result($result, 1);
        echo "</div><div>You can play with branching from this environment and see what happens. You
              will notice that if you branch after running this the database structure
              as well as the data will be copied with the environment.</div>";
    }
?>
</body>
</html>