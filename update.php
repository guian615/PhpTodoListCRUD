<?php
  include_once("header.php");
?>
<?php
// include function file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['delID']);
// Posted Values
$todo=$_POST['todo'];

//Function Calling
$sql=$updatedata->update($todo,$userid);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
 echo "<script>window.location.href='index.php'</script>";
}

?>
