<?php

   require "vendor/autoload.php";

   if(extension_loaded('mongodb')){
      // connect to mongodb
      
      $client = new MongoDB\Client("mongodb://localhost:27017/");

      $collections = $client->pdfreader->pdfcontent;

      
   }else{
      echo "Please install mongo driver in your php";exit;
   }

   

?>