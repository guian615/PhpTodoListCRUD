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

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4 pt-5">
            <h3 class="logo">Todo List Menu</a></h3>
            <ul class="list-unstyled components mb-5">

                <li class="text-center">
                    <a href="index.php"><button class="btn btn-primary"> <i class="fa fa-home" aria-hidden="true"
                                style="font-size:30px;"></i>
                        </button></a>
                    <a href="trash.php"><button class="btn btn-danger mt-4"><i class="fa fa-bars " aria-hidden="true"
                                style="font-size:30px;"> trash</i>
                        </button></a>
                    <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModal"> <i
                            class="fa fa-plus" aria-hidden="true" style="font-size:30px;"></i>
                    </button>

                    <?php
                     include_once("insert.php");
                    ?>
                    <!-- Insert Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel">Add Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" name="insertrecord" method="POST">
                                        <input id="name" type="text" name="todo" placeholder="Enter Todos"
                                            class="form-control bg-light text-dark border-left-0 border-md" required
                                            style="padding:10px">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="insert" class="btn btn-primary">Add Task</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

        <body>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h3>PHP Crud Operation To do List</h3>
                        <hr />
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
                                                <input class="form-check-input check1" type="checkbox">
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

                                        <td>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                data-target="#update<?php echo htmlentities($row['id'])?>">
                                                <span<i class="fa fa-pencil " aria-hidden="true"
                                                    style="font-size:20px;"></i></span>
                                            </button></a>
                                            <a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button
                                                    class="btn btn-danger btn-xs"
                                                    onClick="return confirm('Do you really want to delete');">
                                                    <span<i class="fa fa-trash " aria-hidden="true"
                                                        style="font-size:20px;"></i></span>
                                                </button></a>

                                            <!-- Update Modal -->
                                            <?php
                                                include_once("update.php");
                                            ?>
                                            <div class="modal fade" id="update<?php echo htmlentities($row['id'])?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-primary" id="exampleModalLabel">
                                                                Edit Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="./update.php?delID=<?php echo htmlentities($row['id']);?>"
                                                                name="insertrecord" method="POST">
                                                                <input type="hidden"
                                                                    value="<?php echo htmlentities($row['id']);?>">
                                                                <input id="name" type="text" name="todo"
                                                                    placeholder="Enter Todos"
                                                                    value="<?php echo htmlentities($row['todo']);?>"
                                                                    class="form-control bg-light text-dark border-left-0 border-md"
                                                                    required style="padding:10px">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="update"
                                                                class="btn btn-primary">Update Task</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


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
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$('.check1').change(function() {
    if ($(this).prop("checked") == true) {
        $(this).parent().parent().next().next().css("text-decoration", "line-through");
    } else if ($(this).prop("checked") == false) {
        $(this).parent().parent().next().next().css("text-decoration", "none");
    }
});
(function($) {

    "use strict";

    var fullHeight = function() {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function() {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });

})(jQuery);
</script>