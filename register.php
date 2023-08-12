
   <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="contact_main">
               <h1 class="request_text">Register Form</h1>
               <form method="post" enctype="multipart/form-data">
               <div class="form-group">
                     <input type="file" class="email-bt" placeholder="Name" name="txt_img">
                  </div>
               <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Name" name="txt_name">
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Email" name="txt_email">
                  </div>

                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Password " name="txt_password">
                  </div>

                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Confirm Password" name="txt_cpassword">
                  </div>

                  
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Mobile" name="txt_mobile">

                  </div>
                  <div class="form-group mt-5">
                     <textarea  class="form-control mt-5" placeholder="Address" name="txt_address"></textarea>
                  </div>

                 
                  <div class="form-group">
                     <select name="txt_state"  class="email-bt1 form-control" placeholder="state" name="state">
                        <option value="">-select state-</option>
                        <?php 
                           foreach($stshw as $stshw1)
                           {
                         ?>
                         <option value="<?php echo $stshw1["state_id"];?>"><?php echo $stshw1["statename"];?></option>

                         <?php 
                           }
                        ?>
                       
                     </select>
                  </div>


                  <div class="form-group"> 
                    <div class="row">
                  <div class="col-md-4 mt-3">      
                  <input type="submit" name="add_register" value="Register" class="btn btn-lg btn-primary">
                  </div>
                  <div class="col-md-4 mt-3">    
                  <input type="reset" name="reset" value="Reset" class="btn btn-lg btn-danger float-left">
                  </div>
                 </div>
          
                  <div class="form-group">
            <b class="text-white">Already have an account ? &nbsp; <a href="<?php echo $mainurl;?>login-us">Login here</a></b>
            </div>     
                  
         </form>
          
          
         </div>
            
         </div>
      </div>
          
      </div>
          
      </div>
      <!-- contact section end -->
  