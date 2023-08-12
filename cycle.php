 
      <!-- cycle section start -->
      <div class="cycle_section layout_padding">
         <div class="container">
            <h1 class="cycle_taital">Our cycle</h1>
            <p class="cycle_text">It is a long established fact that a reader will be distracted by the </p>
           
            <?php 
            foreach($shwprod as $row)
            {
            ?> 

            <form method="post">
           
            <div class="cycle_section_2 layout_padding mt-5">
               <div class="row">
                  <div class="col-md-6">
                     <div class="box_main">
                        <h6 class="number_text"><?php echo $row["product_id"];?>
                     
                        <input type="hidden" name="product_id" value="<?php echo $row["product_id"];?>">
                     
                        <input type="hidden" name="qty" value="<?php echo $row["qty"];?>">
                     

                     
                     </h6>
                        <div class="image_2"><img src="admin/<?php echo $row["pimage"];?>"></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <h1 class="cycles_text"><?php echo $row["productname"];?></h1>
                     <p class="lorem_text"><?php echo $row["pdescriptions"];?></p>
                     <div class="btn_main">
                     <?php 
                      if(!isset($_SESSION["customerid"]))
                      {
                     ?>
                     <div class="buy_bt"><a href="#" onclick="login()">Buy Now</a></div>
                     <?php 
                      }
                      else 
                      {
                      ?>
                     <div class="buy_bt"><input type="submit" name="addtocart" value="Buy Now" class="btn btn-lg " style="background-color:#f7c17b"></div>
                      <?php 
                      }
                      ?>
                        <h4 class="price_text">Price <del><span style="color: #f7c17b">Rs</span> <span style=" color: #325662"><?php echo $row["oldprice"];?></span></del> <?php echo $row["offerprice"];?></h4>

                        <input type="hidden" name="subtotal" value="<?php echo $row["offerprice"];?>">
                     </div>
                  </div>
               </div>
            </div>

         </form>
           
           <?php 
            }
            ?>
            <!-- <div class="cycle_section_3 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="cycles_text">Stylis Cycle</h1>
                     <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <h4 class="price_text">Price <span style=" color: #f7c17b">$</span> <span style=" color: #325662">200</span></h4>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="box_main_3">
                        <h6 class="number_text_2">02</h6>
                        <div class="image_2"><img src="<?php echo $baseurl;?>images/img-3.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="cycle_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="box_main_3">
                        <h6 class="number_text_2">03</h6>
                        <div class="image_2"><img src="<?php echo $baseurl;?>images/img-4.png"></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <h1 class="cycles_text">Mordern <br>Cycle</h1>
                     <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <h4 class="price_text">Price <span style=" color: #f7c17b">$</span> <span style=" color: #325662">200</span></h4>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="read_btn_main">
               <div class="read_bt"><a href="#">Read More</a></div>
            </div>
         </div>
      </div>
      <!-- cycle section end -->
      
   <!-- after click on buy now login first message -->
   <script>
     function login()     
     {
       alert('Are you add this cycle in Cart Login First')
       window.location='login-us';  
     }
    </script>