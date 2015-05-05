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
    $id = isset($_POST['Supplier_id']) ? intval($_POST['Supplier_id']) : 0;
    if ($id > 0) {
        $query = "DELETE FROM Suppliers WHERE Supplier_id=".$id." LIMIT 1";
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
                <h4 class="modal-title">Add New Vendor</h4>
            </div>
            <div class="modal-body">

            <form id="loginform" class="form-horizontal" role="form" method="post"action="insertvendor.php">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" required=""class="form-control" name="vendorname" value="" placeholder="Vendor Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                    <input id="login-username" type="text" class="form-control" name="companyname" value="" placeholder="Company Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="login-username" type="text" class="form-control" name="contactnumber" value="" placeholder="Contact Number">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="login-username" type="text" class="form-control" name="address" value="" placeholder="Address">                                        
                </div>

                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
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
                <h4 class="modal-title">Edit the Vendor details</h4>
            </div>
            <div class="modal-body">

            <form id="loginform" class="form-horizontal" role="form" method="post"action="editvendor.php">
                
                <div style=" display:none;margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="vendorid" type="text" class="form-control" name="vendorid"  placeholder="Vendor Id">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="vendorusername" type="text" class="form-control" name="vendorname"  placeholder="Vendor Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="vendorcompany" type="text" class="form-control" name="vendorcompany"  placeholder="Vendor Company">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="vendornumber" type="text" class="form-control" name="vendornumber"  placeholder="Vendor Number">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="vendoraddress" type="text" class="form-control" name="vendoraddress"  placeholder="Vendor Address">                                        
                </div>

                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
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
               
                <a class="navbar-brand" href="index.php">Admin's Page Of Cloth Shop</a>
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
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-user"></i> Employers</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-user"></i> Customers</a>
                    </li>
                    <li class="active">
                        <a href="forms.php"><i class="fa fa-fw fa-user"></i> Vendors</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.php"><i class="fa fa-fw fa-tag"></i> Products</a>
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
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Vendors
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                     <a href="#"class="btn btn-primary pull-right" onclick="openform();">Add New Vendor</a>
                    <div class="col-lg-12">
                        <h2>Vendors</h2>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Supplier_id</th>
                                        <th>Name </th>
                                        <th>Company_Name</th>
                                        <th>Contact_Number</th>
                                        <th>Address</th>
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
                                $sql = "SELECT * FROM Suppliers";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>". $row["Supplier_id"]."</td>"; 
                                        echo "<td>". $row["Supplier_name"]."</td>"; 
                                        echo "<td>". $row["Supplier_company"] ."</td>";
                                        echo "<td>". $row["Supplier_number"] ."</td>";
                                        echo "<td>". $row["Supplier_address"] ."</td>";
                                        echo '<td><button class="btn btn-danger" id="deletedata" data-id= "'.$row["Supplier_id"].'" >Delete</button></td>';
                                        echo '<td><button id = "editer" class= "btn btn-success" onclick= "editform('.$row["Supplier_id"].',\''.$row["Supplier_name"].'\', \''.$row["Supplier_company"].'\','.$row["Supplier_number"].',\''.$row["Supplier_address"].'\');" >Update</button></td>';
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="js/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
    
function openform(){
    $("#myModal").modal('show');
};

//var currentRow,

function editform(id,name,company,number,address){
    var elem = document.getElementById("vendorusername");
    elem.value = name;
    var temp = document.getElementById("vendornumber");
    temp.value = number;
    var texter = document.getElementById("vendorid");
    texter.value = id;
    var dummy = document.getElementById("vendorcompany");
    dummy.value = company;
    var real = document.getElementById("vendoraddress");
    real.value = address;
    $("#myeditModal").modal('show');   
};
 
$(document).on('click','#deletedata',function(){
    id = $(this).attr('data-id'); 
    // Get the clicked id for deletion 
    currentRow = $(this).closest('tr'); // Get a reference to the row that has the button we clicked
    $.ajax({
        type:'post',
        url:location.pathname, // sending the request to the same page we're on right now
        data:{'action':'deleteEntry','Supplier_id':id},
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


</script>


</body>

</html>
