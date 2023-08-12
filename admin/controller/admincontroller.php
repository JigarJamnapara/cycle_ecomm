<?php
require_once("model/adminmodel.php");
class admincontroller extends adminmodel
{
    public function __construct()
    {
        parent::__construct();
        // logic for admin login
        if(isset($_POST["log"]))
        {
            $em=$_POST["txt_email"];
            $pass=$_POST["txt_password"];

            $chk=$this->adminlogin('cycle_admin',$em,$pass);
            if($chk)
            {
            if(isset($_POST['rememberme'])){
        setcookie('emailcookie',$em, time()+180);
        setcookie('passwordcookie',$pass, time()+180);
                echo "<script>
                alert('You are Logged in successfully')
                window.location='admin-dashboard';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Your email and password are Incorrect try again')
                window.location='./';
                </script>";
            }
        }

        // change password admin logic
        if(isset($_POST["changepass"]))
        {
            $id=$_SESSION["admin_id"];
            $opass=$_POST["opass"];
            $npass=$_POST["npass"];
            $cpass=$_POST["cpass"];
            $chk=$this->chngepasswordadmin('cycle_admin','admin_id',$opass,$npass,$cpass,$id);
            if($chk)
            {
              unset($_SESSION["admin_id"]);
              unset($_SESSION["email"]);
              session_destroy();
              echo "<script>
              alert('Your password are changed successfully')
              window.location='./';
              </script>";
            }
            else
            {
                echo "<script>
                alert('Your opass,npass and confirm password does not macthed try again')
                window.location='admin-changepassword';
                </script>";
            }
        }
        // insert main category of cycle in admin
         if(isset($_POST["addcyclecat"]))
         {
            $catnm=$_POST["catname"];
            $addate=$_POST["adddate"];
            $data=array("categoryname"=>$catnm,"added_date"=>$addate);
            $chk=$this->insalldata('cycle_addcategory',$data);
            if($chk)
            {
                echo "<script>
                alert('Your Category Added successfully')
                window.location='admin-addcategory';
                </script>";
            }

         }

    $shwsubcategory=$this->joindata('cycle_addcategory','cycle_sub','cycle_addcategory.category_id=cycle_sub.category_id');


// insert sub category of cycle in admin
if(isset($_POST["addcyclesubcat"]))
{

   $catnm=$_POST["catname"];
   $subcatnm=$_POST["subcatname"];
   $addate=$_POST["adddate"];
   $data=array("sub_catname"=>$subcatnm,"added_date"=>$addate,"category_id"=>$catnm);
   $chk=$this->insalldata('cycle_sub',$data);
   if($chk)
   {
       echo "<script>
       alert('Your Category Added successfully')
       window.location='admin-addsubcategory';
       </script>";
   }

}

        //data or show all data of cycle category
        $shwcat=$this->selectalldata('cycle_addcategory');
        //data or show all data of cycle subcategory
         $shwsubcat=$this->selectalldata('cycle_sub');
        // add products here
         if(isset($_POST["addprod"]))
         {
            $catnm=$_POST["catname"];
            $subcatnm=$_POST["subcatname"];
            $prodnm=$_POST["pname"];
            $tmp_name=$_FILES["pimg"]["tmp_name"];
            $path="upload/products/".$_FILES["pimg"]["name"];
            move_uploaded_file($tmp_name,$path);
            $oprice=$_POST["oprice"];
            $nprice=$_POST["newprice"];
            $qty=$_POST["qty"];
            $pdesc=$_POST["pdescription"];
            $addate=$_POST["adddate"];
            $data=array("category_id"=>$catnm,"categorysub_id"=>$subcatnm,"productname"=>$prodnm,"pimage"=>$path,"oldprice"=>$oprice,"offerprice"=>$nprice,"qty"=>$qty,"pdescriptions"=>$pdesc,"added_date"=>$addate);
             $chk=$this->insalldata('cycle_addproducts',$data);
             if($chk)
             {
                 echo "<script>
                 alert('Your Products Added successfully')
                 window.location='admin-addproduct';
                 </script>";
             }

         }

        // logout admin logic
        if(isset($_GET["logout-admin"]))
        {
            $chk=$this->logout();
            if($chk)
            {
                echo "<script>
                alert('You are successfully logout as a admin')
                window.location='./';
                </script>";
            }
        }
        //load views of admin create an routing
        if(isset($_SERVER["PATH_INFO"]))
        {
            switch($_SERVER["PATH_INFO"])
            {
                case '/':
                    require_once("index.php");
                    require_once("admin-login.php");
                    break;
                case '/admin-dashboard':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("sidebar.php");
                    require_once("admin-dashboard.php");
                    require_once("footer.php");
                    break;
                case '/admin-changepassword':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("sidebar.php");
                    require_once("admin-changepassword.php");
                    require_once("footer.php");
                    break;
                case '/admin-addcategory':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("sidebar.php");
                    require_once("addcycle-category.php");
                    require_once("footer.php");
                    break;
                case '/admin-managecategory':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("sidebar.php");
                    require_once("manage-category.php");
                    require_once("footer.php");
                    break;

            case '/admin-addsubcategory':
                require_once("index.php");
                require_once("header.php");
                require_once("sidebar.php");
                require_once("addcycle-subcategory.php");
                require_once("footer.php");
                break;
            case '/admin-managesubcategory':
                require_once("index.php");
                require_once("header.php");
                require_once("sidebar.php");
                require_once("manage-subcategory.php");
                require_once("footer.php");
                break;

            case '/admin-addproduct':
                require_once("index.php");
                require_once("header.php");
                require_once("sidebar.php");
                require_once("addcycle-addroduct.php");
                require_once("footer.php");
                break;
            case '/admin-manageproduct':
                require_once("index.php");
                require_once("header.php");
                require_once("sidebar.php");
                require_once("manage-addproduct.php");
                require_once("footer.php");
                break;

                default:
                    require_once("index.php");
                    require_once("404.php");
                    break;
            }
        }
    }
}
}

$obj=new admincontroller;
?>