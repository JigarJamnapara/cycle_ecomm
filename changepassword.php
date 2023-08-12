
<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
      <div class="col-md-4 bg-white h-50 p-5 fs-5">
      <ul>

      <li class="nav-item"><a class="nav-link  href="#">Welcome:<b class="text-success"><?php echo ucfirst($_SESSION["txt_name"]);?></b></a>
      
    
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
         <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Change Password <span class="fa fa-lock"></span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Delete Account <span class="fa fa-trash-o"></span></a>
      </li>

      <li class="nav-item p-2 ms-0 w-75">
         <a class="nav-link btn btn-sm btn-danger text-white" href="<?php echo $mainurl;?>manage-profile"> Logout here <span class="fa fa-power-off"></span></a>
      </li>
     
     </ul>
  


      </div>
      
      <div class="col-md-8 ms-0">
      <div class="contact_main">
         <h1 class="request_text">Change Password</h1>
         <form method="post" enctype="multipart/form-data">
       
            <div class="form-group">
               <input type="password" class="email-bt" placeholder="Enter Old password" name="txt_opass">
            </div>

            
            <div class="form-group">
               <input type="password" class="email-bt" placeholder="Enter New password" name="txt_npass">
            </div>

            
            <div class="form-group">
               <input type="password" class="email-bt" placeholder="Enter Confirmed password" name="txt_cpass">
            </div>

               <div class="form-group"> 
                 <div class="row">
               <div class="col-md-7 mt-3">      
               <input type="submit" name="change_password" value="Submit" class="btn btn-block btn-primary w-100">
               </div>
            
              </div>
       
         </form>
     
      </div>
   </div>
</div>
</div>
</div>
<!-- contact section end -->
