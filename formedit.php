<!DOCTYPE html>
<html lang="en">
<?php
require "config/connection.php";
$res = mysqli_query($conn, 'SELECT stdID, fname, lname, deptName FROM students, department WHERE students.deptID = department.deptID');

if (isset($_POST['submit'])) {
  require "config/connection.php";
  
  $sql = "UPDATE students SET 
          fname='".$_POST["txtfname"]."' ,
          lname='".$_POST["txtlname"]."' , 
          deptID='".$_POST["txtdeptID"]."' 
          WHERE stdID='".$_GET["stdID"]."' ";
  $qu= mysqli_query($conn,$sql);
  if(!$qu)
  {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
          echo "window.location = 'index.php'; ";
    echo "</script>";
  }
  else
  {
    echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
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
        <form method="post">
        <?php
           $sql = "SELECT students.stdID, students.fname, students.lname, department.deptID
           FROM students
           LEFT JOIN department ON students.deptID = department.deptID where students.stdID ='".$_GET["stdID"]."' ";
            $objQuery = mysqli_query($conn,$sql);
            $objResult = mysqli_fetch_array($objQuery);
            if(!$objResult)
            {
              echo "Not found stdID=".$_GET["stdID"];
            }
            else
            {
            ?>
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

                <tr>
                <div class="form-group">
                    <td width="125"><input type="text"  name="txtstdID" size="20" value="<?php echo $objResult['stdID'];?>"disabled='disabled'></td>
                    <td width="125"><input type="text" class="form-control" name="txtfname" size="10" value="<?php echo $objResult['fname']; ?>"> </td>
                    <td width="125"><input type="text" class="form-control" name="txtlname" size="10" value="<?php echo $objResult['lname']; ?>"> </td>
                    <td width="200">
                    <select name="txtdeptID" class="form-control">
                              <?php
                              $strSQL = "SELECT * FROM department ORDER BY deptID ASC";
                              $objQuery = mysqli_query($conn,$strSQL);
                              while($objResuut = mysqli_fetch_array($objQuery))
                              {
                              ?>
                        <option value="<?php echo $objResuut["deptID"];?>"><?php echo $objResuut["deptID"]." - ".$objResuut["deptName"];?></option>
                              
                        <option value="<?php echo $objResuut["deptID"];?>"><?php echo $objResuut["deptID"]." - ".$objResuut["deptName"];?></option>
                              <?php
                              }
                              ?>
                        </select> </td>
                    <td><input type="submit" class="btn btn-primary" name="submit" value="SAVE"></td>
                </div>
                </tr>
                
            </tbdody>
        </table>
        
        <?php } 
                mysqli_close($conn);?>
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