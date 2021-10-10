<?php
session_start();
?>
<!-- <!doctype html>
<html>
  <head><title>OHHS Library - Add book</title>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">

      <link rel="stylesheet" href="css/addbook.css" /> 

  </head>
  <body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <h2 class="navbar-brand"><?php echo "Welcome ".$_SESSION['username']; ?></h2>
        </div>  
    </nav> 

      <div class="mycontainer">
 
    <div class="form-container">
                <form method="post" action="validation/HSaddbook_validate.php" >
                    <h2 class="form-title">Complete Submission</h2>
                    <div class="error-message"></div>	
                    <input class="disable" type="text" name="title" placeholder="Title">
                    <input class="disable"  type="text" name="author" placeholder="Author">
                    <input class="disable"  type="text"  name="publication" placeholder="Year of Publication" >
                    <input style="pointer-events:none;"  type="file" name="file">
                    <input type="text" name="isbn" placeholder="ISBN">
                    <input type="text" name="call_num" placeholder="Call Number">
                    <input type="text" name="sub_area" placeholder="Subject Area">
                    <input type="number" min=1 max=999 name="copies" placeholder="Number of Copies" >
                    <input type="submit" name ="login" value="SUBMIT"> 
                    
                </form>
    </div>
</div>

  </body>
</html> -->