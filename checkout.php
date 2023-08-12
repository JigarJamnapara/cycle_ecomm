<?php 
$MERCHANT_KEY = "FH2qsrBv";
$SALT = "StCMXYEpZ3";
// Merchant Key and Salt as provided by Payu.
$PAYU_BASE_URL = "https://secure.payu.in";		// For Sandbox Mode
$action = '';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}
$formError = 0;
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<script type="text/javascript">
var hash = '<?php echo $hash ?>';
function submitPayuForm() {
if(hash == '') {
return;
}
var payuForm = document.forms.payuForm;
payuForm.submit();
}
</script>   

<body onLoad="submitPayuForm()">
<section id="content">
<div class="card mt-5 container-fluid p-5">
<div class="row">
<div class="col-md-7">
<h3><span>Getting your Order *</span></h3>
<hr>
<h5><span>Shipping Informations *</span></h5>

<form method="post" id="frm" action="<?php echo $action; ?>"  name="payuForm" enctype="multipart/form-data" onsubmit="return validation(this.value)">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
<div class="form-group">
<input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" class="form-control" placeholder="Enter Ammount *" />
</div>
<div class="form-group">
<input type="text" placeholder="FirstName" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" class="form-control">
</div>
<div class="form-group">
<input type="text"  placeholder="Email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" class="form-control">
</div>

<div class="form-group">
<input type="text" placeholder="Mobile" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" class="form-control">
</div>

<div class="form-group">
<textarea  name="productinfo" class="form-control" placeholder="Address *"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea>
</div>

<!-- payment success url -->
<input type="hidden" name="surl" value="<?php echo $mainurl;?>PaymentSuccess" size="64" />
<!-- payment failure url -->
<input type="hidden" name="furl" value="<?php echo $mainurl;?>PaymentFailure" size="64" />

<input type="hidden" name="service_provider" value="payu_paisa" size="64" />


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
</div>
<div class="col-md-5 mt-5">
<div class="card-header bg-white"><h4><span>Order Summary</span></h4></div>
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
</tr>

<?php 
}
?>
</table>
</div>
<div class="card-footer bg-white shadow p-3">
<div class="col-md-10">
<h4>Total₹   <span class="float-end fs-6" id="tot"> <?php  echo $subtotal[0]["total"] ;?> </span></h4>
<b>Grand Total₹ <span class="float-end" id="tot1"> <?php  echo $subtotal[0]["total"] ;?></span></b>
<p>Inclusive of all the applicable taxes</p>
<?php 
  if(!$hash) 
  {
     ?>
<p><button type="submit" name="checkout" class="btn btn-primary text-white btn-lg w-100">Place Order here</button></p>
<?php 
  }
?>

</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


