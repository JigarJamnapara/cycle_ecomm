
   <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="contact_main">
               <h1 class="request_text">Login Form</h1>
               <form method="post">

               <div class="form-group">
                     <input type="hidden" class="email-bt" placeholder="Email" name="txt_name">
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Email"
                     name="txt_email" value="<?php if(isset($_COOKIE['emailcookie']))
                     {echo $_COOKIE['emailcookie'];} ?>">
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Password "
                     name="txt_password" value="<?php if(isset($_COOKIE['passwordcookie']))
                     {echo $_COOKIE['passwordcookie'];} ?>">
                  </div>
                   <div class="form-group">
                     <input type="checkbox" class="email-bt" name="rememberme"> Remember Me
                  </div>

                  <div class="form-group">
                  <input type="submit" name="log" class="btn btn-lg btn-info" value="login">
                  <b><a href="<?php echo $mainurl;?>forgetpassword-here">Forget Password ?</a></b>

                  </div>
                  <div class="form-group">
            <b class="text-white">Don't have an account ? &nbsp; <a href="<?php echo $mainurl;?>register-us">Create Account</a></b>
            </div>


               </form>


         </div>
      </div>

      </div>

      </div>
      <!-- contact section end -->
