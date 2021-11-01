<?php
include('db.php');
include('mysqldb.php');



// query for mongo
$result = $collections->find()->toArray();


// if()

// var_dump($result[0]->pdf_content);exit;

?>


<form action="sync.php">
    <input type="submit" name="submit" value="submit">
</form>

<h1>This is content from mongodb</h1>

<p><?php echo (!empty($result) && isset($result[0]->pdf_content)) ? htmlspecialchars_decode($result[0]->pdf_content) : '';?></p>