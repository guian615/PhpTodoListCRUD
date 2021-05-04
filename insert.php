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
// Message for successfull insertion
// echo "<script>swal('Good job!', 'Successfully Added!', 'success');</script>";
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

<div class="container mt-5 text-center mb-5">
    <form action="" name="insertrecord" method="POST">
            <h2 class="text-primary mt-2 mb-4">Create To do List</h2>
            <div class="row">

                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-light text-light px-4 border-md border-right-0">
                                <i class="fa fa-list text-primary" style=" font-size:25px;padding:10px;"></i>
                            </span>
                    </div>
                        <input id="name" type="text" name="todo" placeholder="Enter Todos"
                            class="form-control bg-light text-dark border-left-0 border-md" required style="padding:10px">
                </div>

                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button class="btn btn-primary mb-2" name="insert" style="border-radius:10px;">
                            <h4><i class="fa fa-paper-plane" aria-hidden="true"></i> Add</h4>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    
</div>
     
</body>
