<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using  PHP OOP </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: black;
    color: #fff;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    position: relative;
}

#sidebar .h6 {
    color: #fff;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar.active .custom-menu {
    margin-right: -50px;
}

#sidebar h1 {
    margin-bottom: 20px;
    font-weight: 700;
}

#sidebar h1 .logo {
    color: #fff;
}

#sidebar ul.components {
    padding: 0;
}

#sidebar ul li {
    font-size: 16px;
}

#sidebar ul li>ul {
    margin-left: 10px;
}

#sidebar ul li>ul li {
    font-size: 14px;
}

#sidebar ul li a {
    padding: 10px 0;
    display: block;
    color: rgba(255, 255, 255, 0.8);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

#sidebar ul li a:hover {
    color: #fff;
}

#sidebar ul li.active>a {
    background: transparent;
    color: #fff;
}

@media (max-width: 991.98px) {
    #sidebar {
        margin-left: -250px;
    }

    #sidebar.active {
        margin-left: 0;
    }

    #sidebar .custom-menu {
        margin-right: -50px !important;
        top: 10px !important;
    }
}

#sidebar .custom-menu {
    display: inline-block;
    position: absolute;
    top: 20px;
    right: 0;
    margin-right: -20px;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

@media (prefers-reduced-motion: reduce) {
    #sidebar .custom-menu {
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
    }
}

#sidebar .custom-menu .btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

#sidebar .custom-menu .btn.btn-primary {
    background: #6749b9;
    border-color: #6749b9;
}

#sidebar .custom-menu .btn.btn-primary:hover,
#sidebar .custom-menu .btn.btn-primary:focus {
    background: #6749b9 !important;
    border-color: #6749b9 !important;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

@media (max-width: 991.98px) {
    #sidebarCollapse span {
        display: none;
    }
}

#content {
    width: 100%;
    padding: 0;
    min-height: 100vh;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
</style>
<body>
    

</body>
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

</script>
</html>