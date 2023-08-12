
<section id="content">
<div class="card mt-5 container p-5">
<div class="card-header bg-white"><h4><span>My Cart(1 item)</span></h2></h4></div>
<div class="card-body">

    <table class="table" style="width:100%">
      <?php 
        
        foreach($shwcrt as $row)
        {

      ?>
        <tr align="center">
            <td><img src="admin/<?php echo $row["pimage"];?>" class="img-fluid" style="width: 85px; height: 85px;"></td>
            <td><?php echo $row["productname"];?></td>
            <td><?php echo $row["subtotal"];?>
            <input type="hidden" id="price" value="<?php echo $row["subtotal"];?>"></td>
            <td><input type="number" name="qty" id="qty" min="1" max="10" value="1" class="form-control w-25" onchange="return totalcrt(this.value)"></td>
            
            <td><a href="<?php echo $mainurl;?>viewcart?delete-cartid=<?php echo $row["cartid"];?>" onclick="return confirm('Are you sure to delete your cart ?')"><i class="bi bi-trash fs-4 text-danger"></i></td>
        </tr>

        <?php 
        }
        ?>
    </table>


</div>
<div class="card-footer bg-white shadow p-3">

    <div class="row">
        <div class="col-md-7">
            <p><i class="bi bi-geo-alt fs-2"></i> Delivery pin code</p>
            <div class="input-group p-1 w-50">
                <input type="text" name="pincode" placeholder="Enter your pincode" class="form-control">
                <span class="input-group-text bg-primary text-white">Submit</span>

            </div> 
            </div>

            <div class="col-md-4">
            <h4>Total₹   <span class="float-end fs-6" id="tot"> <?php  echo $subtotal[0]["total"] ;?> </span></h4>

            <b>Grand Total₹ <span class="float-end" id="tot1"> <?php  echo $subtotal[0]["total"] ;?></span></b>
            <p>Inclusive of all the applicable taxes</p>

            <p><a href="<?php echo $mainurl;?>checkout"><button type="button" name="checkout" class="btn btn-primary text-white btn-lg w-100">Checkout</button></a></p>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<!-- subtotal after qty change of cart -->
<script>
function totalcrt()
{
    var q=document.getElementById("qty").value;
    var p=document.getElementById("price").value;
    var t=p*q;
    document.getElementById("tot").innerHTML=t;
    document.getElementById("tot1").innerHTML=t;

}
</script>    
