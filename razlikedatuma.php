<?php require "partials/header.php";?>

<title>Razlike Datuma</title>
<link rel="shortcut icon" href="cal.png">
</head>

<body >

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"></form>
    <?php
     include "partials/navbar.php"; 
    
   
     ?>
       <br><br>
   <?php include"partials/godinemjeseci.php";?>
   
  
    <?php include "partials/footer.php"; ?>