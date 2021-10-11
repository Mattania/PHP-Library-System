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
  </head>
  <body> 
<?php
 $titleErr = $pubErr = $authorErr = $imgErr="";

 if(isset($_POST['next'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

          //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

       if(!empty($_POST['title'])){
           $title = test_input($_POST['title']);
         }else{      
           $titleErr = "* Book Title is a required field";
           ?>
            <style>
                #title_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style>
           <?php
         }

         if(!empty($_POST['author'])){
           $author= test_input($_POST['author']);
         }else{      
           $authorErr = "* Author is a required field";
           ?>
           <style>
               #author_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style> 
           <?php
         }

         if(!empty($_POST['pub'])){
            $year= test_input($_POST['pub']);
          }else{      
            $pubErr = "* Publication Year is required";
            ?>
            <style>
                #pub_input{border:1px solid red; background-color:rgba(240, 52, 52, 0.2);}
            </style>
            <?php
          }

          if(!empty($_POST['file'])){
            $image= test_input($_POST['file']);
          }else{      
            $imgErr = "* Image is required";
          }
         
    }


    }
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
                    <label for="exampleInputEmail1">Title</label> <span class = "error"><?php echo $titleErr;?></span>
                    <input type="text" class="form-control" id="title_input" aria-describedby="emailHelp" placeholder="Eg. Art of War" name='title'>
                    </div>
                    <div class = "form-group">
                    <label for="exampleInputEmail1">Author</label><span class = "error"><?php echo $authorErr;?></span>
                    <input type="text" class="form-control" id="author_input" aria-describedby="emailHelp" placeholder="Eg. Sun Tzu" name='author'>
                    </div>
                    <div class = "form-group">
                    <label for="exampleInputEmail1">Year of Publication</label><span class = "error"><?php echo $pubErr;?></span>
                    <input type="number" class="form-control" min=1900 max=2021 id="pub_input" aria-describedby="emailHelp" placeholder="Eg. 2000" name='pub'>
                    </div>
                    <div class="form-group " id="cover">
                        <label for="exampleFormControlFile1">Book Cover Image</label><span class = "error"><?php echo $imgErr;?></span>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                        <input type="submit" class="btn bg-success" id="upload-btn" value="upload" name="submit">
                    </div>
                    <input type="submit" class="btn btn-primary" name ="next" value="Continue"> 
                    
                </form>
    </div>
</div>

  </body>
</html>