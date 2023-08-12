<?php
error_reporting(0);
require_once("model/model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class controller extends model
{
public function __construct()
     {
        parent::__construct();

        // fetch state in register form dynamic from cycle_state table
        $stshw=$this->selectalldata('cycle_state');
        // add or store customer account in cycle_customer tables
        // email handeling
        try

        {

        if(isset($_POST["add_register"]))
        {
            require_once("PHPMailer.php");
            require_once("Exception.php");
            require_once("SMTP.php");

           date_default_timezone_set("asia/calcutta");
           $tmp_name=$_FILES["txt_img"]["tmp_name"];
           $path="uploads/customers/".$_FILES["txt_img"]["name"];
           move_uploaded_file($tmp_name,$path);
           $nm=$_POST["txt_name"];
           $em=$_POST["txt_email"];
           $pass=base64_encode($_POST["txt_password"]);
           $cpass=base64_encode($_POST["txt_cpassword"]);
           $mob=$_POST["txt_mobile"];
           $add=$_POST["txt_address"];
           $st=$_POST["txt_state"];
           $adatetime=date("d/m/Y H:i:s a");
           if($pass==$cpass)
           {

    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug =false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bkpandey.pandey@gmail.com';                     //SMTP username
    $mail->Password   ='uxeeafrteucoktnb';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('bkpandey.pandey@gmail.com','Thanks register Note sending emails');
    $mail->addAddress($_POST["txt_email"],'Mailer');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thanks for Create Account with cycle ecommerce';
    $mail->Body    = "They’re easy to use for customers and harder to figure out for email harvesters. As you would expect, building an effective PHP email contact form isn’t hard at all. We’re going to explain the process step by step in this article."."<br>"."For more details contact us with"."Mobile numbers :9998003
    879"."<br>"."Email  us on <a href='mailto:info@gmail.com'>info@gmail.com</a>";
    $mail->send();

           $data=array("photo"=>$path,"name"=>$nm,"email"=>$em,"password"=>$pass,"mobile"=>$mob,"address"=>$add,"state_id"=>$st,"added_date_time"=>$adatetime);
            $chk=$this->insalldata('cycle_customer',$data);
            if($chk)
            {
                echo "<script>
                alert('Your Account successfully created we send a welcome emailed also')
                window.location='login-us';
                </script>";
            }
        }

        else
        {
            echo "<script>
            alert('Your password and confirmed password does not matched try again')
            window.location='register-us';
            </script>";
        }
    }
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



// login as customer
if(isset($_POST["log"]))
{

    $em=$_POST["txt_email"];
    $pass=base64_encode($_POST["txt_password"]);
    if(isset($_POST['rememberme']))
    {
        setcookie('emailcookie',$em, time()+180);
        setcookie('passwordcookie',$pass, time()+180);
        header('location:login.php');
    }else{
        header('location:login.php');
    }
    $chk=$this->login('cycle_customer',$em,$pass);

    if($chk)
    {
            echo "<script>
            alert('you are Logged in as customer successfully')
            window.location='./';
            </script>";

    }
    else
    {
        echo "<script>
        alert('your email and password are incorect try again')
        window.location='login-us';
        </script>";
    }
}

// forget password

 if(isset($_POST["add_frg"]))
 {
    require_once("PHPMailer.php");
    require_once("Exception.php");
    require_once("SMTP.php");
    $email=$_POST["txt_email"];

    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug =false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bkpandey.pandey@gmail.com';                     //SMTP username
    $mail->Password   ='uxeeafrteucoktnb';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('bkpandey.pandey@gmail.com','Forget Password');
    $mail->addAddress($_POST["txt_email"],'Mailer');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $pass=$this->frgpassword('cycle_customer','password','email',$email);
    $mail->Subject = 'Forget Password for Cycle Ecommers';
    $mail->Body = "Your password is :".$pass."<br>"."For any fraud Contact with admin Immediately on Mobile numbers :9998003
    879"."<br>"."Email  us on <a href='mailto:info@gmail.com'>info@gmail.com</a>";
    $mail->send();
    if($pass)
    {
        echo "<script>
        alert('We successfully send your password on your email address kindly checked and Login again')
        window.location='login-us';
        </script>";
    }
    else
    {

        echo "<script>
        alert('This email is not exist or no account found of this email try again')
        window.location='forgetpassword-here';
        </script>";
    }
 }


//  manage profile

if(isset($_SESSION["customerid"]))
{

    $customerid=$_SESSION["customerid"];
    $shwprof=$this->joindata('cycle_customer','cycle_state','customerid',$customerid,'cycle_customer.state_id=cycle_state.state_id');

}

// update customer profile data

if(isset($_POST["upd_profile"]))
{
    $id=$_SESSION["customerid"];
    $tmp_name=$_FILES["txt_img"]["tmp_name"];
    $path="uploads/customers/".$_FILES["txt_img"]["name"];
    move_uploaded_file($tmp_name,$path);
    $nm=$_POST["txt_name"];
    $em=$_POST["txt_email"];
    $mob=$_POST["txt_mobile"];
    $add=$_POST["txt_address"];
    $st=$_POST["txt_state"];

    $chk=$this->updprofiledata('cycle_customer',$path,$nm,$em,$mob,$add,$st,'customerid',$id);
    if($chk)
    {
        echo "<script>
        alert('Your profile Updated successfully')
        window.location='manageprofile';
        </script>";
    }

}

// Automatic Logout as customer

        // Set the inactivity timeout to 2 minutes
        $timeout = 15;

        // Get the current time
        $current_time = time();

        // Check if the user has been inactive for more than the timeout period
        if (isset($_SESSION['last_activity']) && ($current_time - $_SESSION['last_activity'] > $timeout)) {

            // Log the user out
            session_destroy();

            // Redirect the user to the login page
            header("Location: login-us");

        } else {

            // Update the last activity timestamp
            $_SESSION['last_activity'] = $current_time;
        }

// passsword change of customers here

if(isset($_POST["change_password"]))
{
    $id=$_SESSION["customerid"];
    $opass=base64_encode($_POST["txt_opass"]);
    $npass=base64_encode($_POST["txt_npass"]);
    $cpass=base64_encode($_POST["txt_cpass"]);
    $chk=$this->chngepasswordcustomer('cycle_customer','customerid',$opass,$npass,$cpass,$id);

    if($chk)
    {
        unset($_SESSION["customerid"]);
        unset($_SESSION["txt_email"]);
        unset($_SESSION["txt_name"]);
        session_destroy();
        echo "<script>
        alert('Your Password Changed successfully')
        window.location='login-us';
        </script>";
    }

    else
    {
        echo "<script>
        alert('Your password , old password and confirmed password does not matched try again')
        window.location='changepassword-here';
        </script>";
    }
}

// delete customers data
if(isset($_GET["delete-account-id"]))
{
    $did=$_GET["delete-account-id"];
    $id=array("customerid"=>$did);
    $chk=$this->deletedata('cycle_customer',$id);
    if($chk)
    {
        unset($_SESSION["customerid"]);
        unset($_SESSION["txt_email"]);
        unset($_SESSION["txt_name"]);
        session_destroy();
        echo "<script>
        alert('Your Profile successfully deleted')
        window.location='login-us';
        </script>";
    }

}
// show all product on customer panel that will added by admin
$shwprod=$this->selectalldata('cycle_addproducts');
// add to cart by customers
if(isset($_POST["addtocart"]))
{
    date_default_timezone_set("Asia/Calcutta");
    $customerid=$_SESSION["customerid"];
    $product_id=$_POST["product_id"];
    $qty=$_POST["qty"];
    $subtotal=$_POST["subtotal"];
    $rdatetime=date("d/m/Y H:i:s a");
    $data=array("customerid"=>$customerid,"product_id"=>$product_id,"qty"=>$qty,"subtotal"=>$subtotal,"added_date_time"=>$rdatetime);
    $chk=$this->insalldata('cycle_addcart',$data);
    if($chk)
    {
        echo "<script>
        alert('Your Product successfully added in cart')
        window.location='viewcart';
        </script>";
    }
}

// view cart after login as customer
if(isset($_SESSION["customerid"]))
{
    $customerid=$_SESSION["customerid"];
    $shwcrt=$this->joindata1('cycle_addcart','cycle_customer','cycle_addproducts','cycle_addcart.customerid=cycle_customer.customerid','cycle_addcart.product_id=cycle_addproducts.product_id','customerid',$customerid);
}

// count cart as customer login
if(isset($_SESSION["customerid"]))
{
    $id=$_SESSION["customerid"];
    $totalcartcount=$this->selectcountcrt('cycle_addcart','customerid',$id);
}

// subtotal of totals from cart as customer login
if(isset($_SESSION["customerid"]))
{
    $id=$_SESSION["customerid"];
    $subtotal=$this->subtotalcrt('cycle_addcart','subtotal','customerid',$id);
}
// delete cart from viewcart  as customer login
if(isset($_GET["delete-cartid"]))
{
    $did=$_GET["delete-cartid"];
    $id=array("cartid"=>$did);
    $chk=$this->deletedata('cycle_addcart',$id);
    if($chk)
    {
        echo "<script>
        alert('Your Cart successfully Deleted from cart')
        window.location='viewcart';
        </script>";
    }
}


// logout as customers
if(isset($_GET["logout-here"]))
{
    $chk=$this->logout();
    if($chk)
    {
        echo "<script>
        alert('You are logout as customers  successfully')
        window.location='login-us';
        </script>";
    }

}

        // load your template using routing
        if(isset($_SERVER["PATH_INFO"]))
        {
            //http://localhost/php9amTTS/module5/cycle-ecommerce/
            switch($_SERVER["PATH_INFO"])
            {
                case '/':
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("banner.php");
                    require_once("content.php");
                    require_once("footer.php");
                    break;

                case '/about-us':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("about.php");
                    require_once("footer.php");
                    break;

                case '/our-cycle':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("cycle.php");
                    require_once("footer.php");
                    break;

                case '/shop':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("cycle.php");
                    require_once("footer.php");
                    break;

                case '/news':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("news.php");
                    require_once("footer.php");
                    break;

            case '/contact-us':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("contact.php");
                require_once("footer.php");
                break;

                case '/manageprofile':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("manageprofile.php");
                    require_once("footer.php");
                    break;

            case '/register-us':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("register.php");
                require_once("footer.php");
                break;
            case '/forgetpassword-here':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("forgetpassword.php");
                require_once("footer.php");
                break;

            case '/changepassword-here':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("changepassword.php");
                require_once("footer.php");
                break;
            case '/login-us':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("login.php");
                require_once("footer.php");
                break;

            case '/viewcart':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("viewcart.php");
                require_once("footer.php");
                break;
            case '/checkout':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("checkout.php");
                require_once("footer.php");
                break;

            case '/PaymentFailure':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("paymentfailure.php");

                break;

                case '/PaymentSuccess':
                    require_once("index.php");
                    require_once("page-navbar.php");
                    require_once("paymentssuccess.php");

                    break;

            case '/manageorders':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("vieworder.php");
                require_once("footer.php");
                break;



            case '/billprint':
                require_once("index.php");
                require_once("page-navbar.php");
                require_once("invoice.php");

                break;

                default:
                require_once("index.php");
                require_once("navbar.php");
                require_once("404.php");

                break;
            }

        }

     }
}

$obj=new controller;

?>