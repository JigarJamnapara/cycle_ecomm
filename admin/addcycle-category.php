  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add main Category of cycle</h1>
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
              <h5 class="card-title">Add Cycle Category here</h5>

              <!-- Horizontal Form -->
              <form id="frm1" method="post">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">cycle category Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="catname" data-bvalidator="required,alpha" placeholder="Cycle main Category" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Added Date</label>
                  <div class="col-sm-8">
                    <input type="date" name="adddate" data-bvalidator="required" class="form-control" id="inputEmail">
</div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="addcyclecat">AddCycleCategory</button>
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
    $("#frm1").bValidator();
});

</script>