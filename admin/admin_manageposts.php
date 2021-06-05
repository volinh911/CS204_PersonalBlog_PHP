<?php
include '../admin/admin_header.php';
include '../db.php';
$sql = "SELECT * FROM post ORDER BY ID";
$results = $conn->query($sql);
if ($results->num_rows >= 1) {
    $posts = $results->fetch_all(MYSQLI_ASSOC);
}
?>

<div class="container-fluid py-3">
    <h3 class="text-center py-3" style="font-family: 'Caveat', cursive; font-size: 3rem">Post List</h3>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <?php
                foreach ($posts as $post) {
                    $content = filter_var(substr($post['content'], 0, 50), FILTER_SANITIZE_URL);
                    $title = filter_var(substr($post['title'], 0, 20), FILTER_SANITIZE_URL);

                    echo "<tr>";
                    echo "<th scope='row'>{$post['ID']}</th>";
                    echo "<td scope='row'>{$post['author']}</td>";
                    echo "<td scope='row'>{$title}...</td>";
                    echo "<td scope='row'>{$content}...</td>";
                    echo "<td>
                                <a type='button' class='btn btn-info' href='./../showpost.php?id={$post['ID']}'>Read</a>
                                <a type='button' class='btn btn-success' href='admin_edit.php?id={$post['ID']}'>Edit</a>
                                <a type='button' class='btn btn-danger' href='admin_delete.php?id={$post['ID']}'>Delete</a>
                            </td>
                        ";
                    echo "</tr>";
                }
                ?>
            
        </tbody>
    </table>
</div>