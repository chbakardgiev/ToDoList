<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <meta name="viewport"  content="width=device-width, initial-scale=1">
<title>To Do List</title>
    </head> 
    <body>
         
        <div class="container">
        <div class="form-group">
        <form class="form-horizontal" action="insert.php" method="post">
        <label class="control-label" for="text">Text:</label>
        <input type="text" class="form-control" name='text'>
        <input style="margin-top: 0.3%" class="btn btn-default" type="submit">
        </form>
            </div>
            <br><br>
        <?php
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=todolist', $user, $pass);
        $pdo->beginTransaction();
        $pdo->exec("set names utf8");
        $statement = $pdo->prepare('SELECT * FROM list');
        $statement->execute();
        $result = $statement->fetchall();
        $statement = null; // doing this is mandatory for connection to get closed
        $pdo->commit();
        $pdo = null;
         echo 
    "<table class=\"table table-responsive\" border='2'>
    <tr>
    <th>Order of tasks</th>
    <th>To-Do</th>
    </tr>";  $br=1;
     foreach($result as $row){
         echo "<tr>";
  echo "<td>" .$br. "</td>";
  echo "<td>" . $row['text'] . "</td>";
  $r = $row['id'];
  echo "<td><button onclick="."javascript:window.location.replace(\"delete.php?id=$r\")".">Delete</button>";
  echo "</tr>";
 $br++;
    }
    echo "</table>";
   
    ?>
        </div>
    </body>
</html>