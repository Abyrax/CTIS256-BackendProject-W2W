<?php

const DSN = "mysql:host=localhost;dbname=project;port=3306;charset=utf8mb4" ;
const USER = "root" ;
const PASSWORD = "admin" ;

 $db = new PDO(DSN, USER, PASSWORD) ;
 
 function checkUser($email, $pass) {
     global $db ;

     $stmt = $db->prepare("select * from auth where email=?") ;
     $stmt->execute([$email]) ;
     if ( $stmt->rowCount()) {
         $user = $stmt->fetch(PDO::FETCH_ASSOC) ;
         return password_verify($pass, $user["password"]) ;
     }
     return false ;
 }

 function validSession() {
     return isset($_SESSION["user"]) ;
 }

 function getUser($email) {
     global $db ;
     $stmt = $db->prepare("select * from auth where email=?") ;
     $stmt->execute([$email]);
     return $stmt->fetch(PDO::FETCH_ASSOC) ;
 }

