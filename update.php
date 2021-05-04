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
$userid=intval($_GET['id']);
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

<body>


<?php
// Get the userid
$userid=intval($_GET['id']);
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecord($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
  ?>
<div class="container mt-5 text-center mb-5">
  <form action="" name="insertrecord" method="POST">
          <h2 class="text-primary mt-2 mb-4">Update Data</h2>
          <div class="row">

              <div class="input-group col-lg-12 mb-4">
                  <div class="input-group-prepend">
                          <span class="input-group-text bg-light text-light px-4 border-md border-right-0">
                              <i class="fa fa-list text-primary" style=" font-size:25px;padding:10px;"></i>
                          </span>
                  </div>
                      <input id="name" type="text" name="todo" placeholder="Enter Todos"  value="<?php echo htmlentities($row['todo']);?>"
                          class="form-control bg-light text-dark border-left-0 border-md" required style="padding:10px">
              </div>

             
              
                  <div class="form-group col-lg-12 mx-auto mb-0">
                      <button class="btn btn-primary mb-2" name="update" style="border-radius:10px;">
                          <h4><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</h4>
                      </button>
                  </div>
              </div>
          </div>
      </form>
 
</div>
<?php } ?>
</body>
