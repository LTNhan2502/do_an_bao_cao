<!DOCTYPE HTML>
<html>
  <head>
    <?php
      set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
      spl_autoload_extensions('.php');
      spl_autoload_register();
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sogo Hotel by Colorlib.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="Content/css/animate.css">
    <link rel="stylesheet" href="Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Content/css/aos.css">
    <link rel="stylesheet" href="Content/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="Content/css/jquery.timepicker.css">
    <link rel="stylesheet" href="Content/css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    

    <!-- Theme Style -->
    <link rel="stylesheet" href="Content/css/style.css">
  </head>
  <body>
    
    <!-- Header -->
    <?php
        include_once "./View/header.php";
    ?>

    <!-- Tạo trang home -->
    <?php
        $ctrl = 'home';
        if(isset($_GET['action'])){
            $ctrl = $_GET['action'];
        }
        include_once "./Controller/$ctrl.php";
    ?>

    
    
    <!-- Tạo footer -->
    <?php
        include_once "./View/footer.php";
    ?>

    <script src="Content/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="Content/js/popper.min.js"></script>
    <script src="Content/js/bootstrap.min.js"></script>
    <script src="Content/js/owl.carousel.min.js"></script>
    <script src="Content/js/jquery.stellar.min.js"></script>
    <script src="Content/js/jquery.fancybox.min.js"></script>
    
    
    <script src="Content/js/aos.js"></script>
    
    <script src="Content/js/bootstrap-datepicker.js"></script> 
    <script src="Content/js/jquery.timepicker.min.js"></script> 
    <!-- <script src="ajax/"></script> -->

    

    <script src="Content/js/main.js"></script>
  </body>
</html>