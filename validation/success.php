<?php 
 session_start();
 ?>

<html>
    <head>
        <title>Successful</title>
    <style>
         @keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to { 
        transform: rotate(360deg);
    }
}
 

 @-webkit-keyframes rotate {
    from {
        -webkit-transform: rotate(0deg);
    }
    to { 
        -webkit-transform: rotate(360deg);
    }
}

.load {
	width: 50px;
	height: 50px;
	margin: 110px auto 0;
	border:solid 10px #8822aa;
	border-radius: 50%;
	border-right-color: transparent;
	border-bottom-color: transparent;
	 -webkit-transition: all 0.5s ease-in;
    -webkit-animation-name:             rotate; 
    -webkit-animation-duration:         1.0s; 
    -webkit-animation-iteration-count:  infinite;
    -webkit-animation-timing-function: linear;
    	
    	 transition: all 0.5s ease-in;
    animation-name:             rotate; 
    animation-duration:         1.0s; 
    animation-iteration-count:  infinite;
    animation-timing-function: linear; 
}
    </style>
    </head>
    <body>
        <?php echo "Log in Successful";?>
    <div class="load"></div>
    <?php 
sleep(3);
header('location:../HSaddbook.php');
?>
    </body>
</html>
