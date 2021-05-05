<body>
    <?php
    include("header.php");
?>
    <?php
// include database connection file
require_once('function.php');
// Object creation
$insertdata=new DB_con();
if(isset($_POST['insert']))
{
// Posted Values
$todo=$_POST['todo'];
//Function Calling
$sql=$insertdata->insert($todo);
if($sql)
{

echo "<script>alert('You Added Successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}
?>

</body>