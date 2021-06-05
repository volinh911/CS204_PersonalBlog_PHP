<?php
include '../admin/admin_header.php';
include '../db.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}
if(isset($_POST['delete'])) {
  $id = $_POST['delete'];
  $sql = "DELETE FROM post WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    $location = "Location: ./../index.php?delete=true";
    header($location);
  }
}
?>
<div class="jumbotron">
  <h1 style="font-family: 'Caveat', cursive; font-size: 3rem" class="mb-3"><i class="fas fa-trash-alt"></i> Are you sure you want to delete? <i class="far fa-sad-tear"></i></h1>
  <form class="" action="admin_delete.php" method="post">
    <button type="submit" name="delete" value="<?php if(isset($id)) {echo $id;} ?>" class="btn mr-5 float-left btn-danger">Delete</button>
  </form>
  <button type="submit" name="cancel" class="btn float-left btn-success"><a href="./../index.php">Cancel</a></button>
</div>