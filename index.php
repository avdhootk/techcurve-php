<?php
include('db.php');
include('mysqldb.php');



// query for mongo
$resultFromMongo = $collections->find()->toArray();



$sql = "SELECT * FROM pdfcontent";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    $sql = "UPDATE pdfcontent SET pdf_content='".htmlspecialchars($resultFromMongo[0]->pdf_content)."' WHERE id=1";


    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
} else {
    $sql = "INSERT INTO pdfcontent (key_data, pdf_content) VALUES ('pdf-data', '".htmlspecialchars($resultFromMongo[0]->pdf_content)."')";
    // echo $sql;exit;

    if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

}







// GET NEW DATA FROM MYSQL

$sql = "SELECT * FROM pdfcontent";
$result = $conn->query($sql);


$final_array = [];

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    $final_array[] = $row;
  }

}



// var_dump($final_array);exit;


?>


<form action="index.php">
    <input type="submit" name="submit" value="Sync With Mongodb">
</form>

<h1>This is content from mysql table , to sync this with mongo please click on sync button</h1>

<p><?php echo (!empty($final_array) && isset($final_array[0]['pdf_content'])) ? htmlspecialchars_decode($final_array[0]['pdf_content']) : '';?></p>