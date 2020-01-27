<!DOCTYPE html>
<html lang="en">
<?php
require "config/connection.php";
$res = mysqli_query($conn, 'SELECT * FROM department ORDER BY deptID ASC');

if (isset($_POST['submit'])) {
    require "config/connection.php";
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $stdID = $_POST['studentID'];
    $deptID = $_POST['deptID'];
    
    $sql = "INSERT INTO students (stdID, fname, lname, deptID) VALUES ('$stdID', '$fname', '$lname', '$deptID')";
    $qu= mysqli_query($conn,$sql);
    if(!$qu)
    {
      echo "<script type='text/javascript'>";
      echo "alert('Error back to Create again');";
            echo "window.location = 'cewate.php'; ";
      echo "</script>";
    }
    else
    {
      echo "<script type='text/javascript'>";
	echo "alert('Create Succesfuly');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
    }
}
    
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ADD STUDENT</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css?v=1001" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css?v=1001" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">ADD<br>STUDENT</div>
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
        <h1 class="mt-4">Add Student</h1>
      </div>
      <div class="col">
        <form method="post">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname" id="firstname"><br>
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lastname" id="lastname"><br>
          <label for="studentID">Student ID</label>
          <input type="text" class="form-control" name="studentID" id="studentID"><br>
          <label for="deptID">Department ID</label>
          <select name="deptID" class="form-control">
			<option value=""><-- Please Select Department --></option>
			<?php
			$strSQL = "SELECT * FROM department ORDER BY deptID ASC";
			$objQuery = mysqli_query($conn,$strSQL);
			while($objResuut = mysqli_fetch_array($objQuery))
			{
			?>
			<option value="<?php echo $objResuut["deptID"];?>"><?php echo $objResuut["deptID"]." - ".$objResuut["deptName"];?></option>
			<?php
			}
			?>
		  </select><br>

          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          <p id="result"></p>
        </form>
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
