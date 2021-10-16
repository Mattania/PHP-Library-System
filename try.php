<?php
session_start();
ob_start();
?> 

<!doctype html>
<html>
  <head><title>BOOK INFO TABLE</title>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
      <link rel = "stylesheet" href="css/addbook.css" media="all" type="text/css"/>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>

      .form-container{
        margin-top:2rem;
        height: 98%;
        max-height: 110%;
        width:100%;
        border:0.5rem;
        box-shadow:var(--shadow-large);
        background-color:var(--color-white);

    }
    
    .mycontainer{
    width: 100%;
    height: 100%;
    display:grid;
    place-items:center;
 
    }
    </style>
    </head>
  <body>
    <!-- text file -->
    <?php
      $myfile = fopen("HSbookdata.txt", "w") or die("Unable to open file!");
      $txt = $_SESSION['title']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['author']."\n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['year']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['fileToUpload']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['isbn']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['call_num']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['sub']." \n";
      fwrite($myfile, $txt);
      $txt = $_SESSION['copies']." \n";
      fwrite($myfile, $txt);

      fclose($myfile);
    ?>        

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <h2 class="navbar-brand"><?php echo "Welcome ".$_SESSION['username']; ?></h2>
          <h5  style="text-align:left; cursor:pointer;"><u><a href="logout.php">Log out</a></u></h5>
        </div>  
    </nav> 

   <div class="mycontainer">
     <div class="form-container">
     <div class ="bg-warning" id="header"><h2 class="form-title" > Book Data </h2> </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
    
                <table border='1' cellspacing="10" cellpadding='2' class="table table-striped table-dark">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year Published</th>
                    <th>Book Cover</th>
                    <th>ISBN</th>
                    <th>Call Number</th>
                    <th>Subject</th>
                    <th>Number of Copies</th>
                </tr>
  </thead>
  <tbody style="color:white;">
                <tr>
                <td><h6><?php echo $_SESSION['title']; ?></h6></td>
                <td><h6><?php echo $_SESSION['author'];?></h6></td>
                <td><h6><?php echo $_SESSION['year'];?></h6></td>
                <td><h6><?php echo $_SESSION['fileToUpload'];?></h6> </td>
                <td><h6><?php echo $_SESSION['isbn'];?></h6></td>
                <td><h6><?php echo $_SESSION['call_num'];?></h6> </td>
                <td><h6><?php echo $_SESSION['sub'] ;?></h6></td>
                <td><h6><?php echo $_SESSION['copies'];?></h6> </td>
                </tr>
  </tbody>              

                </table>
                </form>
      </div>
    </div>
  </br>
  </br>
  </body>
</html>



