
<main id="main" class="main">

<div class="pagetitle">
  <h1>Manage All SubCategory</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo $mainurl;?>admin-dashboard">Home</a></li>
      <li class="breadcrumb-item active">Manage SubCategory</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Manage SubCategory</h5>
          
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">CategoryName</th>
                <th scope="col">SybCategoryName</th>
                <th scope="col">Added Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach($shwsubcategory as $row)
                { 
                ?>
              <tr>
             
                <td><?php echo $row["categorysub_id"];?></td>
                <td><?php echo $row["categoryname"];?></td>
                <td><?php echo $row["sub_catname"];?></td>
                <td><?php echo $row["added_date"];?></td>
                <td><a href="" class="btn btn-sm btn-danger text-white"><span class="bi bi-trash"></span></a>
                |<a href="" class="btn btn-sm btn-primary text-white"><span class="bi bi-pencil"></span></a>
                </td>
              </tr>
              <?php 
                }
                ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
