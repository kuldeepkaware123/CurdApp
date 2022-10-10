

<?php
 include "connection.php";
if (isset($_GET['del'])) {
    $id = $_GET['S_no'];
    mysqli_query($conn, "DELETE FROM project WHERE S_no = $id");
    header('location: project.php');
    exit;
};
?>