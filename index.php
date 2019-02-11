<?php
/**
 * Created by PhpStorm.
 * User: Jake
 * Date: 2/11/2019
 * Time: 7:05 AM
 */

//connect to DB
require '/home2/jsuhover/config.php';
try{
    //instantiate a database object
    $dbh = new PDO ( DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "Connected to database!";
}
catch(PDOException $e) {
    echo $e->getMessage();
}


//Define the query
$sql = "INSERT INTO pets (type,name,color)
      VALUES (:type, :name, :color)";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';

$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();

//Bind the parameters
$type = 'snake';
$name = 'Slitherin';
$color = 'green';

$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";


//Bind the parameters
$type = 'dog';
$name = 'Rex';
$color = 'black';

$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Bind the parameters
$type = 'hamster';
$name = 'Andrew';
$color = 'brown';

$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Define the query
$sql = "UPDATE pets SET name = :new
        WHERE name = :old";

//prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$old = 'Joey';
$new = 'Troy';
$statement->bindParam(':old', $old, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);

//Execute
$statement->execute();


//Define the query
$sql = "UPDATE pets SET color = :new
        WHERE name = :name";

//prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$name = 'Oscar';
$new = 'brown';
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);

//Execute
$statement->execute();


//Define the query
$sql = "DELETE FROM pets WHERE id = :id";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$id = 1;
$statement->bindParam(':id',$id, PDO::PARAM_INT);

//Execute
$statement->execute();

//Define the query
$sql = "SELECT * FROM pets WHERE id = :id";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_INT);

//Execute the statement
$statement->execute();

//Process the result
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name'].", ".$row['type'].", ".$row['color'];


//Define the query
$sql = "SELECT * FROM pets";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Execute the statement
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    echo $row['name'].", ".$row['type'].", ".$row['color'];
}

