
   <!-- contact section start -->
   <div class="contact_section layout_padding">
      <div class="container">
         <div class="row">
         <div class="col-md-4 bg-white h-50 p-5 fs-5 mt-5">
         <ul>

         <li class="nav-item"><a class="nav-link  href="#">Welcome:<b class="text-success"><?php echo ucfirst($_SESSION["txt_name"]);?></b></a>
         
       
         <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl;?>manageprofile"><span class="fa fa-users"></span> Manage Profile</a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl;?>manageprofile"> Manage Notification <span class="fa fa-bell"></span></a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl;?>manageprofile"> Manage Orders <span class="fa fa-truck"></span></a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl;?>changepassword-here"> Change Password <span class="fa fa-lock"></span></a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl;?>manageprofile?delete-account-id=<?php echo $shwprof[0]["customerid"];?>" onclick="return confirm('Are you sure to removed your Account ?')"> Delete Account <span class="fa fa-trash-o"></span></a>
         </li>

         <li class="nav-item p-2 ms-0 w-75">
            <a class="nav-link btn btn-sm btn-danger text-white" href="<?php echo $mainurl;?>manageprofile?logout-here"> Logout here <span class="fa fa-power-off"></span></a>
         </li>
        
        </ul>
     


         </div>
         
         <div class="col-md-8 ms-0">
         <div class="contact_main">
            <h1 class="request_text">Manage Profile</h1>
            <form method="post" enctype="multipart/form-data">
            <div class="form-group">
            <input type="hidden" class="email-bt" placeholder="Name" name="txt_img">      
            
            <div class="form-group">
                 <img src="<?php echo  $shwprof[0]["photo"];?>" class="img-fluid" style="width:250px; height:220px; border-radius:50%">
                  <input type="file" class="email-bt" placeholder="Name" name="txt_img">
               </div>
             
             </div>
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Name" name="txt_name" value="<?php echo  $shwprof[0]["name"];?>">
               </div>
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Email" name="txt_email" value="<?php echo  $shwprof[0]["email"];?>">
               </div>
               <div class="form-group">
                  <input type="text" class="email-bt" placeholder="Phone Numbar" name="txt_mobile" value="<?php echo  $shwprof[0]["mobile"];?>">
               </div>
               <div class="form-group">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="txt_address">

                  <?php echo  $shwprof[0]["address"];?>
                  </textarea>
               </div>


               <div class="form-group">
                     <select name="txt_state"  class="email-bt1 form-control" placeholder="state" name="txt_state">
                        <option value="">-select state-</option>
                        <?php 
                           foreach($stshw as $stshw1)
                           {
                              if($stshw1["state_id"]==$shwprof[0]["state_id"])
                              {
                         ?>
                         <option value="<?php echo $shwprof[0]["state_id"];?>" selected="selected"><?php echo $shwprof[0]["statename"];?></option>

                         <?php 
                           }
                           else 
                           {
                        ?>
                       <option value="<?php echo $stshw1["state_id"];?>"><?php echo $stshw1["statename"];?></option>

                        <?php 
                           }

                        }
                        ?>
                       
                     </select>
                  </div>

                  <div class="form-group"> 
                    <div class="row">
                  <div class="col-md-4 mt-3">      
                  <input type="submit" name="upd_profile" value="Update profile" class="btn btn-lg btn-primary">
                  </div>
                  <div class="col-md-4 mt-3 ms-5">    
                  <input type="reset" name="reset" value="Reset" class="btn btn-lg btn-danger float-left">
                  </div>
                 </div>
          
            </form>
        
         </div>
      </div>
   </div>
   </div>
   </div>
   <!-- contact section end -->
