<!DOCTYPE html>
<html lang="en">
<?php
require "config/connection.php";
$res = mysqli_query($conn, 'SELECT stdID, fname, lname, deptName FROM students, department WHERE students.deptID = department.deptID');

$strKeyword = null;

$sql = "SELECT students.stdID, students.fname, students.lname, department.deptName
        FROM students
        LEFT JOIN department ON students.deptID = department.deptID where students.stdID
        LIKE '%".$strKeyword."%'";
$query = mysqli_query($conn,$sql);

?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit DATA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css?v=1001" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css?v=1001" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">EDIT<br>STUDENT</div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="btn btn-primary" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      
      <div class="container-fluid">
        <h1 class="mt-4">Edit Data</h1>
      </div>
      <div class="col">
          <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                <tr>
                <th>Keyword
                <input name="id" type="text" id="id" value="<?php echo $strKeyword;?>">
                <input type="submit" value="Search"></th>
                </tr>
            </form>
            <table class="table">
            <thead>
                <tr>
                    <th>StudentID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {?>
                <tr>
                    <td width="125"><?php echo $row['stdID']; ?> </td>
                    <td width="125"><?php echo $row['fname']; ?> </td>
                    <td width="125"><?php echo $row['lname']; ?> </td>
                    <td width="200"><?php echo $row['deptName']; ?> </td>
                    <td width="50"><a href="formedit.php?stdID=<?php echo $row['stdID']; ?>">Edit</a></td>
                    <td width="50"><a href="deletedata.php?stdID=<?php echo $row['stdID']; ?>" onclick=\"return confirm('Do you want to delete this record? !!!')\">del</a></td>
                </tr>
                <?php } 
                mysqli_close($conn);?>
            </tbdody>
        </table>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
