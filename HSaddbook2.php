<?php
session_start();
ob_start();
if($_SESSION['username'] != "HSadmin"){
  echo "<script>alert('Dont try to skip the Log In');window.location.href='HSlogin.php';</script>";
  exit;
}
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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>
      .form-container{
        margin-top:2rem;
        height: 98%;
        max-height: 110%;
        width:35%;
        border:0.5rem;
        box-shadow:var(--shadow-large);
        background-color:var(--color-white);
        overflow:hidden;

    }
    label{
      font-size: 12px;
    }
    input[type="text"], input[type="number"]{
      height: 30px;
    }

    input[type="number"]{
      width: 150px;
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
    <script>
      $('body').on('keyup', '#copies_input', function(){
        newval = $(this).val().replace(/[^0-9.]/g, "");
        $(this).val(newval);
      });
      $('body').on('keyup', '#isbn_input', function(){
        newval = $(this).val().replace(/[<>%*/|^()#""?+=_~`@!&{}:;\$]/g, "");
        $(this).val(newval);
      });
      $('body').on('keyup', '#sub_input', function(){
        newval = $(this).val().replace(/[<>%*/|^()#""?+=_~`@!&{}:;\d\$]/g, "");
        $(this).val(newval);
      });
      $('body').on('keyup', '#call_num_input', function(){
        newval = $(this).val().replace(/[<>%*/|^()#""'?+=_~`@!&{}:;a-z\$]/g, "");
        $(this).val(newval);
      });
    </script>

<?php
 $isbnErr = $subErr = $copiesErr = $callNumErr="";

 if(isset($_POST['submit'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
         //function to clean data before assigment
         function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

     //  isbn validation
      if(!empty($_POST['isbn'])){
           $isbn = test_input($_POST['isbn']);
          }else{      
          $isbnErr = '<i class="fas fa-exclamation-circle"></i> Please enter a isbn ';
         
        }
        
       //  call number validation
        if(!empty($_POST['call_num'])){
          $call_num= test_input($_POST['call_num']);
         }else{      
          $callNumErr = '<i class="fas fa-exclamation-circle"></i>'." Please enter call number";
         
        }

       //  subject validation
        if(!empty($_POST['sub'])){
           $sub= test_input($_POST['sub']);
         }else{      
           $subErr = '<i class="fas fa-exclamation-circle"></i> Please enter subject';
           
         }

        //  copies validation
        if(!empty($_POST['copies'])){
          $copies= test_input($_POST['copies']);
        }else{      
          $copiesErr = '<i class="fas fa-exclamation-circle"></i> Please enter subject';
          
        }

      function isbn10($isbn)
      {
        $isbn = preg_replace('/[^\d]/', '', $isbn);
        $digits = str_split(substr($isbn, 0, 9));

        $sum = 0;

        foreach ($digits as $index => $digit)
        {
            $sum += (10 - $index) * $digit;
        }

        $check = 11 - ($sum % 11);

        // $check may hold either 10 or 11, but not 0
        // 10 becomes X, 11 becomes 0 -- output is 1 character only
        if ($check == 10)
        {
          $check = 'X';
        }
        elseif ($check == 11)
        {
          $check = '0';
        }

      return $check;
   }
   
    }
    if(isset($_POST['submit'])){
      setcookie('copies',$copies, time()+(60*60*7));
      setcookie('sub',$sub, time()+(60*60*7));
      setcookie('isbn',$isbn, time()+(60*60*7));
      setcookie('call_num',$call_num, time()+(60*60*7));
  }
    $_SESSION['copies'] = $copies;
    $_SESSION['sub'] = $sub;
    $_SESSION['call_num'] = $call_num;
    $_SESSION['isbn'] = $isbn;
    header("Location:try.php");
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
        <div class ="bg-warning" id="header"><h2 class="form-title" >#2 Add Book</h2> </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <small  class="form-text text-muted text-center">Please fill out </small> 
                <div class="form-group">
                    <label>Title</label> 
                    <input type="text" class="form-control" id="title_input" placeholder="<?php echo $_SESSION['title'];  ?>" disabled>
                    </div>
                    <div class = "form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" id="author_input" placeholder="<?php echo $_SESSION['author'];  ?>"  disabled>
                    </div>
                    <div class = "form-group">
                    <label>Year of Publication</label><span class = "error">
                    <input type="number" class="form-control"  placeholder="<?php echo $_SESSION['year']; ?>"disabled>
                    </div>
                    <div class="form-group " id="cover">
                    <label for="exampleFormControlFile1">Book Cover Image</label>
                    <span><?php echo $_SESSION['fileToUpload']; ?></span>
                    
                    </div>
                    <div class = "form-group">
                    <label>ISBN </label><span class = "error"><?php echo $isbnErr;?></span>
                    <input type="text" class="form-control"  id="isbn_input"  placeholder="ISBN-10  e.g. 978-3-16-148410-0" name='isbn' required>
                    </div>
                    <div class = "form-group">
                    <label>Call Number </label><span class = "error"><?php echo $callNumErr;?></span>
                    <input type="text" class="form-control"  id="call_num_input"   placeholder="Eg. ML410.B1.M67 2000" name='call_num' required>
                    </div>
                    <div class = "form-group">
                    <label>Subject Area </label><span class = "error"><?php echo $subErr;?></span>
                    <input type="text" class="form-control"  id="sub_input"  placeholder="Eg. Music" name='sub' required>
                    </div>
                    <div class = "form-group">
                    <label>Number of Copies  </label><span class = "error"><?php echo $copiesErr;?></span>
                    <input type="number" class="form-control" min=1 max=100 maxlength="3" id="copies_input" pattern="^[0-9]{3}$"  placeholder="Eg. 3" name='copies' required>
                    </div>
                    <input type="submit" class="btn btn-success" name ="submit" value="Submit"> 
                    
                </form>

    </div>
</div>
  </br>
  </br>
  </body>
</html>