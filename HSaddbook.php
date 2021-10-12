<?php
session_start();
?> 
<!doctype html>
<html>
  <head><title>OHHS Library - Add book</title>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
      <link rel = "stylesheet" href="css/addbook.css" media="all" type="text/css"/>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body> 
    <script>
      $('body').on('keyup', '#pub_input', function(){
        newval = $(this).val().replace(/[^0-9.]/g, "");
        $(this).val(newval);
      });
      $('body').on('keyup', '#input', function(){
        newval = $(this).val().replace(/[<>%\$]/g, "");
        $(this).val(newval);
      });
    </script>

<?php
 $titleErr = $pubErr = $authorErr = $imgErr=$message="";
 if(isset($_POST['next'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

          //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

      //  title validation
       if(!empty($_POST['title'])){
           if(preg_match('/^[a-z0-9 .\-]+$/i', $_POST['title'])){
            $title = test_input($_POST['title']);
            ?>
            <?php
           }else{
            $titleErr = "<ul>Allowed characters:<li>alphanumeric characters</li><li>special characters dash, underscore</li></ul>";
            ?>
             <style>
                 #title_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
             </style>
            <?php
           }
         }else{      
           $titleErr = "* Please enter a title ";
           ?>
            <style>
                #title_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style>
           <?php
         }
         
        //  author validation
         if(!empty($_POST['author'])){
          if(preg_match('/^[a-z0-9 .\-\']+$/i', $_POST['title'])){
           $author= test_input($_POST['author']);
          }else{
            $authorErr = "<ul>Allowed characters:<li>alphanumeric characters</li><li>special characters dash'-', underscore'-'</li></ul></div>";
            ?>
              <style>
                 #author_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
             </style>
            <?php
          }
         }else{      
           $authorErr = "* Please enter author's name";
           ?>
           <style>
               #author_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style> 
           <?php
         }

        //  publication year validation
         if(!empty($_POST['pub'])){
            $year= test_input($_POST['pub']);
          }else{      
            $pubErr = "* Please enter publication year";
            ?>
            <style>
                #pub_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style>
            <?php
          }
      }
  
    }
  
?>

<?php
if(isset($_FILES['fileToUpload'])){
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $message= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $imgErr= "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $imgErr= "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES['fileToUpload']['size'] > 500000) {
      $imgErr= "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $imgErr= "Sorry, only JPG, JPEG & PNG  files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $imgErr= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        $imgErr= "Sorry, there was an error uploading your file.";
      }
    }
  }
?>

  <?php

    if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year']) && isset($_FILES['fileToUpload'])){
      $_SESSION['title'] = $title;
      $_SESSION['author'] = $author;
      $_SESSION['year'] = $pub;
      $_SESSION['fileToUpload'] = $target_file;

      echo $_SESSION['title'];
      echo  $_SESSION['author'];
      echo $_SESSION['year'];
      echo $_SESSION['fileToUpload'];

      header("Location:HSaddbook2.php");
    }
  
  ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <h2 class="navbar-brand"><?php echo "Welcome ".$_SESSION['username']; ?></h2>
          <h5  style="text-align:left; cursor:pointer;"><u><a href="logout.php">Log out</a></u></h5>
        </div>  
    </nav> 

   <div class="mycontainer">
    <div class="form-container">
        <div class ="bg-warning" id="header"><h2 class="form-title" >#1 Add Book</h2> </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                <small  class="form-text text-muted text-center">Please fill out </small> 
                <div class="form-group">
                    <label>Title</label> <span class = "error" id="title-error"><?php echo $titleErr;?></span>
                    <input type="text" class="form-control" id="title_input" placeholder="Eg. Art of War" name='title'>
                    </div>
                    <div class = "form-group">
                    <label>Author</label><span class = "error"><?php echo $authorErr;?></span>
                    <input type="text" class="form-control" id="author_input" placeholder="Eg. Sun Tzu" name='author'>
                    </div>
                    <div class = "form-group">
                    <label>Year of Publication</label><span class = "error"><?php echo $pubErr;?></span>
                    <input type="number" class="form-control" min=1900 max=2021 maxlength="4" id="pub_input" pattern="^[0-9]{4}$"  placeholder="Eg. 2000" name='pub'>
                    </div>
                    <div class="form-group " id="cover">
                        <label for="exampleFormControlFile1">Book Cover Image</label><span class = "error"><?php echo $imgErr;?></span> <span><?php echo $message; ?></span>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload" accept="image/*">
                    </div>
                    <input type="submit" class="btn btn-primary" name ="next" value="Continue"> 
                    
                </form>
    </div>
</div>

  </body>
</html>



