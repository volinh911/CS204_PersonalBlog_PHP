<?php
include_once '../admin/admin_header.php';
include '../db.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM post WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $results = $stmt->get_result();
  $rows = $results->fetch_assoc();
  $title = filter_var($rows['title'], FILTER_SANITIZE_STRING);
  $content = filter_var($rows['content'], FILTER_SANITIZE_STRING);
  $id = filter_var($rows['ID'], FILTER_SANITIZE_STRING);
} else if(isset($_POST['submit'])) {
  $id = $_POST['submit'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "UPDATE post SET post.content = ?, post.title = ? WHERE post.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $content, $title, $id);
  $stmt->execute();
  var_dump($stmt);
  if($stmt->affected_rows == 1 && $stmt->errno == 0) {
    $location = "Location: ./../showpost.php?id={$id}&update=true";
    header($location);
  }
}
 ?>
<div class="container-fluid pb-5 offset-md-2">
  <h2 class="display-4 mt-3 mb-3" style="font-family: 'Caveat', cursive; font-size: 3rem"><i class="fas fa-edit"></i> Edit a post....</h2>
  <div class="row">
    <form class="" action="admin_edit.php" method="post">
      <label class="font-weight-bold" for="title">Post Title</label>
      <input type="text" name="title" value="<?php if(isset($title)) {echo $title;} ?>" class="form-control" placeholder="Post title..."value="">
      
      <label class="font-weight-bold mt-3" for="content">Post Content</label>
      <textarea name="content" class="form-control" rows="8" cols="80"><?php if(isset($content)) {echo $content;} ?></textarea>
      
      <button type="submit" class="btn mt-4 btn-block btn-outline-warning" value="<?php if(isset($id)) {echo $id;} ?>" name="submit">Edit Post</button>
    </form>
  </div>
</div>
