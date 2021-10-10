<?php
   //error varibles set to empty
   $titleErr= $authorErr = $pubErr ="";
 
//condition to check if elements are empty after submit
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['next'])){
      
    if(empty($_POST['title'])){
      $titleErr = " Title is a required field";
    }else{      
      $Title = test_input($_POST['title']);
    }

    if(empty($_POST['author'])){
      $authorErr =  "Author is a required field";
    }else{
      $Author = test_input($_POST['author']);
    }

    if(empty($_POST['publication'])){
      $pubErr = "Publication Year is a required field";
    }else{
      $Year = test_input($_POST['publication']);
    }
    }
  }
       //function to clean data before assigment
   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
}
?>




