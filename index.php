<?php 
session_start();

$page_title = 'collage';
$css_file = 'style.css';

if(isset($_SESSION['name'])){

require_once("./init.php");


$students = get_all_data('collage1');

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">faculty</th>
      <th scope="col">department</th>
      <th scope="col">gpa</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($students as $student){ ?>
    <tr>
    <td><?php echo $student['id']?></td>
      <td><?php echo $student['name']?></td>
      <td><?php echo $student['faculty']?></td>
      <td><?php echo $student['department']?></td>
      <td><?php echo $student['gpa']?></td>
      <td><a class="btn btn-danger" href="delete.php?stu_id=<?php echo $student['id']?>">Delete</a></td>
      </tr>
      <?php } ?>
    
    
  </tbody>
</table>
<a href="add.php">Add student</a>



<?php 
include_once('./include/template/footer.php');

  
}else{
  header('location:signin.php');
}
?>