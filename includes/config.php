<?php

  try{
        $connect = new PDO("mysql:host=localhost;dbname=attendance","root","");
        // print("Connection successful");
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        session_start();
   }catch(PDOException $e){
        print("Failed to Connect".$e->getMessage());
    }
