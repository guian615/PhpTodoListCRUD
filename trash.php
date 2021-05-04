<?php
// include function file
require_once('function.php');

//Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
$rid=$_GET['del'];
$deletedata=new DB_con();
$sql=$deletedata->deleteTrash($rid);
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
                <h3>Recently Deleted Task</h3>
                <hr />
                <a href="index.php"><button class="btn btn-primary"> <i class="fa fa-home" aria-hidden="true" style="font-size:30px;"></i>
                    </button></a>
                   
                <div class="table-responsive mt-4" style="  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <table id="mytable" class="table">
                        <thead class="bg-dark text-light text-center">
                            <th>Number of Trash</th>
                            <th>Trash</th>
                            <th>Created</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $fetchdata=new DB_con();
                                $sql=$fetchdata->fetchdataTrash();
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql)) 
                                {
                            ?>
                            <tr class="text-center">
                                <td>
                                    <?php echo htmlentities($cnt);?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['trashName']);?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['created_at']);?>
                                </td>

                                <td><a href="trash.php?del=<?php echo htmlentities($row['id']);?>">
                                        <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');">
                                            <span<i class="fa fa-trash" aria-hidden="true" style="font-size:20px;"></i>
                                            </span>
                                        </button>
                                    </a>
                                </td>
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
  

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>

</html>