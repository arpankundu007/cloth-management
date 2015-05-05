<?php
$servername = "localhost";
 $username = "root";
 $password = "1234";
 $dbname = "cloth_shop";
 $conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['action']) && $_POST['action'] == 'deleteEntry') {
    $id = isset($_POST['Employee_id']) ? intval($_POST['Employee_id']) : 0;
    if ($id > 0) {
        $query = "DELETE FROM Employees WHERE Employee_id=".$id." LIMIT 1";
        $result = mysqli_query($conn, $query);
        echo 'ok';
    } else {
        echo 'err';
    }
    exit; // finish execution since we only need the "ok" or "err" answers from the server.
}
$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- inserting modal -->
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Employee</h4>
            </div>
            <div class="modal-body">

            <form id="loginform" class="form-horizontal" role="form" method="post"action="insertemployee.php">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="employeename" value="" placeholder="Employee Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="login-username" type="text" class="form-control" name="employeenumber" value="" placeholder="Contact Number">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="login-username" type="text" class="form-control" name="employeebd" value="" placeholder="Date of Birth - dd/mm/yyyy">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="login-username" type="text" class="form-control" name="employeehd" value="" placeholder="Hire Date - dd/mm/yyyy">                                        
                </div>


                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="login-username" type="text" class="form-control" name="address" value="" placeholder="Address">                                        
                </div>

                <div style=" display:none;margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <input id="role" type="text" class="form-control" name="type" value="" placeholder="Role">                                        
                
                </div>
               
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <select id="roles" type="text" class="form-control" name="types" value="" placeholder="Role">                                        
                        <option value="Manager">Manager</option>
                        <option value="Sales Man">Sales Man</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Security">Security</option>
                     </select>
                </div>
                 <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save" onclick="trail();">
            </div>
        </form>
        </div>
    </div>

</div>
</div>
<!-- end of insertion -->

<div id="myeditModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit the Employee details</h4>
            </div>
            <div class="modal-body">

            <form id="loginform" class="form-horizontal" role="form" method="post"action="editemployee.php">
                
                 <div style=" display:none;margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="employeeid" type="text" class="form-control" name="employeeid"  placeholder="Employee Id">                                        
                </div>
                 
                 <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="employeename" type="text" class="form-control" name="employeename" value="" placeholder="Employee Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="employeenumber" type="text" class="form-control" name="employeenumber" value="" placeholder="Contact Number">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="employeebd" type="text" class="form-control" name="employeebd" value="" placeholder="Date of Birth - dd/mm/yyyy">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="employeehd" type="text" class="form-control" name="employeehd" value="" placeholder="Hire Date - dd/mm/yyyy">                                        
                </div>


                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="employeeaddress" type="text" class="form-control" name="address" value="" placeholder="Address">                                        
                </div>

                <div style="display:none;margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <input id="holder" type="text" class="form-control" name="type" value="" placeholder="Role">                                        
                
                </div>
               
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <select id="position" type="text" class="form-control" name="types" value="" placeholder="Role">                                        
                        <option value="Manager">Manager</option>
                        <option value="Sales Man">Sales Man</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Security">Security</option>
                     </select>
                </div>
                 <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save" onclick="trail2();">
            </div>
        </form>
        </div>
    </div>
</div>
</div>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="admin.php">Admin's Page Of Cloth Shop</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
               
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="charts.php"><i class="fa fa-fw fa-user"></i> Employers</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-user"></i> Customers</a>
                    </li>
                    <li>
                        <a href="forms.php"><i class="fa fa-fw fa-user"></i> Vendors</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.php"><i class="fa fa-fw fa-tag"></i>Products</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.php"><i class="fa fa-fw fa-usd"></i> Transactions</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.php"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-user"></i> Employees
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                  <div class="row">
                     <a href="#"class="btn btn-primary pull-right" onclick="openform();">Add New Employee</a>
                    <div class="col-lg-12">
                        <h2>Employees</h2>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name </th>
                                        <th>Contact Number</th>
                                        <th>Date of Birth</th>
                                        <th>Date on Hired</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                        // Create connection
                                $servername = "localhost";
                                $username = "root";
                                $password = "1234";
                                $dbname = "cloth_shop";
                                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                                if ($conn->connect_error) {
                                   die("Connection failed: " . $conn->connect_error);
                                } 
                                $sql = "SELECT * FROM Employees";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>". $row["Employee_id"]."</td>"; 
                                        echo "<td>". $row["Employee_name"]."</td>"; 
                                        echo "<td>". $row["Employee_number"] ."</td>";
                                        echo "<td>". $row["Employee_bd"] ."</td>";
                                        echo "<td>". $row["Employee_hd"] ."</td>";
                                        echo "<td>". $row["Employee_age"] ."</td>";
                                        echo "<td>". $row["Employee_address"] ."</td>";
                                        echo "<td>". $row["Employee_type"] ."</td>";
                                        echo '<td><button class="btn btn-danger" id="deletedata" data-id= "'.$row["Employee_id"].'" >Delete</button></td>';
                                        echo '<td><button id = "editer" class= "btn btn-success" onclick= "editform('.$row["Employee_id"].',\''.$row["Employee_name"].'\', '.$row["Employee_number"].',\''.$row["Employee_bd"].'\',\''.$row["Employee_hd"].'\', '.$row["Employee_age"].', \''.$row["Employee_address"].'\', \''.$row["Employee_type"].'\');" >Update</button></td>';
                                        //echo '<td><button class="btn btn-danger">D</button></td>';
                                        //echo '<td><button class="btn btn-success">E</button></td>';
                                        echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

     <script type="text/javascript">
    
function openform(){
    
    $("#myModal").modal('show');
};


function trail(){
    var e = document.getElementById("roles");
    var temp = e.options[e.selectedIndex].text;
    var dum = document.getElementById("role");
    dum.value = temp;
    //console.log(temp);
}
//var currentRow,

function trail2(){
    var e = document.getElementById("position");
    var temp = e.options[e.selectedIndex].text;
    var dum = document.getElementById("holder");
    dum.value = temp;
    //console.log(temp);
}

function editform(id, name, number, bd, hd, age, address, type){
    var elem = document.getElementById("employeename");
    elem.value = name;
    var temp = document.getElementById("employeenumber");
    temp.value = number;
    var texter = document.getElementById("employeeid");
    texter.value = id;
    var dummy = document.getElementById("employeebd");
    dummy.value = bd;
    var real = document.getElementById("employeehd");
    real.value = hd;
    var x = document.getElementById("employeeaddress");
    x.value = address;
    //var e = document.getElementById("roles");
    //var z = e.options[e.selectedIndex].text;
    //console.log(z);
    //e.options[e.selectedIndex].text = type;
    //var z = e.options[e.selectedIndex].text;
    //console.log(z);
    $("#myeditModal").modal('show');   
};
 
$(document).on('click','#deletedata',function(){
    id = $(this).attr('data-id'); 
    // Get the clicked id for deletion 
    currentRow = $(this).closest('tr'); // Get a reference to the row that has the button we clicked
    $.ajax({
        type:'post',
        url:location.pathname, // sending the request to the same page we're on right now
        data:{'action':'deleteEntry','Employee_id':id},
        success:function(response){
            if (response == 'ok') {
                // Hide the row nicely and remove it from the DOM once the animation is finished.
                    currentRow.slideUp(200,function(){
                    currentRow.remove();
                })
            } else {
                location.reload();
                // throw an error modally to let the user know there was an error
            }
        }
    })
});

$( document.body ).on( 'click', '.dropdown-menu li', function( event ) {
 
   var $target = $( event.currentTarget );
 
   $target.closest( '.btn-group' )
      .find( '[data-bind="label"]' ).text( $target.text() )
         .end()
      .children( '.dropdown-toggle' ).dropdown( 'toggle' );
 
   return false;
 
});


</script>




</body>

</html>
