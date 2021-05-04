<?php
// include function file
require_once('function.php');

//Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
    $rid=$_GET['del'];
    $deletedata=new DB_con();

    $fetchdata=new DB_con();
    $fetchdata->insertTrash();
    $sql=$fetchdata->delete($rid);
    
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record deleted successfully');</script>";

echo "<script>window.location.href = 'trash.php'</script>";
}
    }

?>
<?php
    include_once("header.php");
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>PHP Crud Operation To do List</h3>
                <hr />

                <a href="trash.php"><button class="btn btn-danger mt-4"><i class="fa fa-bars " aria-hidden="true" style="font-size:30px;"> trash</i>
                    </button></a>
                <a href="insert.php"><button class="btn btn-primary mt-4"> <i class="fa fa-plus" aria-hidden="true" style="font-size:30px;"></i>
                    </button></a>
                   
                <div class="table-responsive mt-5" style="  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <table id="mytable" class="table">
                        <thead class="bg-dark text-light text-center">
                        <th>Mark as Done</th>
                            <th>Number of Todos</th>
                            <th>Todos</th>
                            <th>Created</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $fetchdata=new DB_con();
                                $sql=$fetchdata->fetchdata();
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql)) 
                                {
                            ?>
                            <tr class="text-center">
                            <td>
                                <div class="form-check ">
                                    <input class="form-check-input check1" type="checkbox" >
                               </div>
                               </td>
                                <td class="s">
                             
                                    <?php echo htmlentities($cnt);?>
                                </td>
                                <td class="t">
                                    <?php echo htmlentities($row['todo']);?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['created_at']);?>
                                </td>

                                <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button
                                            class="btn btn-primary btn-xs"><span<i class="fa fa-pencil " aria-hidden="true" style="font-size:20px;"></i></span></button></a>
                               <a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button
                                            class="btn btn-danger btn-xs"
                                            onClick="return confirm('Do you really want to delete');"><span<i class="fa fa-trash " aria-hidden="true" style="font-size:20px;"></i></span></button></a></td>
                            </tr>
                            <?php
                            // for serial number increment
                                 $cnt++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        $('.check1').change(function(){
            if($(this).prop("checked") == true){
            $(this).parent().parent().next().next().css("text-decoration","line-through");
                }
            else if($(this).prop("checked") == false){
                $(this).parent().parent().next().next().css("text-decoration","none");
                }
                });
    </script>
</body>