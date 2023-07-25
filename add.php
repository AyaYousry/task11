<?php 

$page_title = "Add student";
$css_file = 'style.css';
include_once("./include/template/header.php");
require_once("./connect_db.php");

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $name   = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $faculty  = filter_var($_POST['fauclty'],FILTER_SANITIZE_EMAIL);
    $department  = filter_var($_POST['department'],FILTER_SANITIZE_STRING);
    $gpa    = filter_var($_POST['gpa'],FILTER_SANITIZE_STRING);

    global $con;

    $stmt = $con->prepare("INSERT INTO students(name,faculty,department,gpa) value(?,?,?,?)");
    $stmt->execute(array($name,$faculty,$department,$gpa));

   
    header("Refresh:3;url=add_employee.php"); 
}

?>


<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container mt-5">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">faculty</label>
    <input type="text" name="faculty" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">department</label>
    <input type="text" name="department" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">gpa</label>
    <input type="text" name="gpa" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<?php include_once("./include/template/footer.php");
 ?>