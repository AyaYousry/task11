<?php
session_start();
if(isset($_SESSION['name'])){
    
require_once('./init.php');

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['stu_id'])){
        delete_with_id('students',$_GET['stu_id']);
    }
}


}else{
    header('location:signin.php');
  }


