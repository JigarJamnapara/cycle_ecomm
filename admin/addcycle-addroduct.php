<main id="main" class="main">

<div class="pagetitle">
  <h1>Add Products of cycle</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $mainurl;?>admin-dashboard">Home</a></li>
      <li class="breadcrumb-item">Add products</li>
 
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-8">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Cycle Products here</h5>

          <!-- Horizontal Form -->
          <form id="frm3" method="post" enctype="multipart/form-data">
           
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">Select cycle category</label>
              <div class="col-sm-7">
                <select  name="catname"  class="form-control" id="inputText" data-bvalidator="required">
                <option value="">-select category-</option>
         
                <?php 
                 foreach($shwcat as $shwcat1)
                 {
                ?>
                <option value="<?php echo $shwcat1["category_id"];?>"><?php echo $shwcat1["categoryname"];?></option>
               <?php 
                 }
                 ?>
                </select>
              </div>
            </div>
          
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">Select cycle Subcategory</label>
              <div class="col-sm-7">
                <select  name="subcatname"  placeholder="Cycle main Category" class="form-control" id="inputText" data-bvalidator="required">
                <option value="">-select subcategory-</option>
                <?php 
                 foreach($shwsubcat as $shwsubcat1)
                 {
                ?>
                <option value="<?php echo $shwsubcat1["categorysub_id"];?>"><?php echo $shwsubcat1["sub_catname"];?></option>
               <?php 
                 }
                 ?>
                </select>
              </div>
            </div>
          
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">cycle products Name</label>
              <div class="col-sm-7">
                <input type="text" name="pname" data-bvalidator="required,alpha" placeholder="Cycle Product Name" class="form-control" id="inputText">
              </div>
            </div>

            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">cycle products Images</label>
              <div class="col-sm-7">
                <input type="file" name="pimg" data-bvalidator="required" placeholder="Cycle Sub Category" class="form-control" id="inputText">
              </div>
            </div>
            
            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">products old price</label>
              <div class="col-sm-7">
                <input type="text" name="oprice" data-bvalidator="required" placeholder="Old price" class="form-control" id="inputText">
              </div>
            </div>

            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">products offer price</label>
              <div class="col-sm-7">
                <input type="text" name="newprice" data-bvalidator="required" placeholder="Offer price" class="form-control" id="inputText">
              </div>
            </div>

            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">products qty</label>
              <div class="col-sm-7">
                <input type="text" name="qty" data-bvalidator="required" placeholder="Qty" class="form-control" id="inputText">
              </div>
            </div>
            
            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">products Descriptions</label>
              <div class="col-sm-7">
                <textarea  name="pdescription" data-bvalidator="required" placeholder="Old price" class="form-control" id="inputText"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-5 col-form-label">Added Date</label>
              <div class="col-sm-7">
                <input type="date" name="adddate" data-bvalidator="required" class="form-control" id="inputEmail">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="addprod">AddProducts</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>

 
  </div>
</section>

</main><!-- End #main -->

<!-- bvalidator jquery call here -->
<script>
$(document).ready(function(){
$("#frm3").bValidator();
});

</script>