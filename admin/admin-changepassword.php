<?php 
if(!isset($_SESSION["admin_id"]))
{
  echo "<script>
  window.location='./';
  </script>";
}
?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Change password here</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $mainurl;?>admin-dashboard">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Layouts</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-8">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Change password here</h5>

          <!-- Horizontal Form -->
          <form method="post" id="frm">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Old password</label>
              <div class="col-sm-8">
                <input type="password" name="opass" class="form-control" id="inputText" data-bvalidator="required,minlen[4],maxlen[10]">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">New Password</label>
              <div class="col-sm-8">
                <input type="password" name="npass" class="form-control" id="inputEmail" data-bvalidator="required,minlen[4],maxlen[10]">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" name="cpass" class="form-control" id="inputPassword" data-bvalidator="required,minlen[4],maxlen[10]">
              </div>
            </div>
        
            <div class="text-center">
              <button type="submit" name="changepass" class="btn btn-primary">Submit</button>
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
    $("#frm").bValidator();
});

</script>