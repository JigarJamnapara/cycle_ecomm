<?php 
$mainurl="http://localhost/php9amTTS/module5/cycle-ecommerce/";
$baseurl="http://localhost/php9amTTS/module5/cycle-ecommerce/assets/";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cycle</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo $baseurl;?>css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo $baseurl;?>images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo $baseurl;?>css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo $baseurl;?>css/owl.carousel.min.css">
      <link rel="stylesoeet" href="<?php echo $baseurl;?>css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

   </head>
   <body>

<!-- header section start -->
<div class="header_section header_bg">
<nav class="navbar navbar-expand-lg">
    <a href="<?php echo $mainurl;?>" class="logo"><img src="<?php echo $baseurl;?>images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
             <a class="nav-link" href="<?php echo $mainurl;?>">Home</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>about-us">About</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>our-cycle">Our Cycle</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>shop">Shop</a>
          </li>
          <?php 
           if(!isset($_SESSION["customerid"]))
           {
          ?>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>news">News</a>
          </li>
          <?php 
           }
           ?>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>contact-us">Contact Us</a>
          </li>
       </ul>
       <form class="form-inline my-2 my-lg-0">
          <div class="login_menu">
             <ul>
             <?php 
           if(!isset($_SESSION["customerid"]))
           {
          ?>  
                <li><a href="<?php echo $mainurl;?>login-us">Login</a></li>
            <?php 
           }
           else 
           {
            
            ?>

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Welcome:<b class="text-success"><?php echo ucfirst($_SESSION["txt_name"]);?></b></a>
         
          <ul class="dropdown-menu" style="background-color:#274d5a; min-width:250px !important">

          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>manageprofile"><span class="fa fa-users"></span> Manage Profile</a>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Manage Notification <span class="fa fa-bell"></span></a>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Manage Orders <span class="fa fa-truck"></span></a>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>changepassword-here"> Change Password <span class="fa fa-lock"></span></a>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Delete Account <span class="fa fa-trash-o"></span></a>
          </li>

          <li class="nav-item p-2 ms-3">
             <a class="nav-link btn btn-sm btn-danger text-white" href="<?php echo $mainurl;?>manageprofile?logout-here"> Logout here <span class="fa fa-power-off"></span></a>
          </li>
         
         </ul>
      
         </li>
            <?php 
           }
           ?>
               <?php 
               if(!isset($_SESSION["customerid"]))
               {
               ?>
                <li class="mt-2"><i class="bi bi-cart fs-4"></i><a href="#"><span class="badge badge-danger top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span></a></li>
                <?php 
               }
               else 
               {

               ?>
                <li class="mt-2"><i class="bi bi-cart fs-4"></i><a href="<?php echo $mainurl;?>viewcart"><span class="badge badge-danger top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $totalcartcount[0]["total_count"];?></span></a></li>

                <?php 
               }
               ?>
                <li><a href="#"><img src="<?php echo $baseurl;?>images/search-icon.png"></a></li>
             </ul>
          </div>
          <div></div>
       </form>
    </div>
    <div id="main">
       <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="<?php echo $baseurl;?>images/toggle-icon.png" style="height: 30px;"></span>
    </div>
 </nav>




 
     
      <!-- copyright section end -->    
      <!-- Javascript files-->
      <script src="<?php echo $baseurl;?>js/jquery.min.js"></script>
      <script src="<?php echo $baseurl;?>js/popper.min.js"></script>
      <script src="<?php echo $baseurl;?>js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo $baseurl;?>js/jquery-3.0.0.min.js"></script>
      <script src="<?php echo $baseurl;?>js/plugin.js"></script>
      <!-- sidebar -->
      <script src="<?php echo $baseurl;?>js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo $baseurl;?>js/custom.js"></script>
      <!-- javascript --> 
      <script src="<?php echo $baseurl;?>js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
           document.getElementById("main").style.marginLeft = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
           document.getElementById("main").style.marginLeft= "0";
          
         }

         $("#main").click(function(){
             $("#navbarSupportedContent").toggleClass("nav-normal")
         })
      </script>
   </body>
</html>