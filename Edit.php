
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<?php
session_start();
include "connection.php";
if (isset($_GET['edit'])) {
    $id = $_GET['S_no'];
    $sql =  "SELECT name,email FROM project WHERE S_no = $id";
    $record = mysqli_query($conn,$sql);
    $n = mysqli_fetch_array($record);
    $_SESSION["name"] = $n['name'];
    $_SESSION["email"] = $n['email'];
}
?>
    <div class="container w-50 my-4 border p-4 bg-light">
        <div class="modal-header mb-3">
            <h5 class="modal-title" id="exampleModalLabel">Please Insert The data on Table</h5>
            <a href="project.php" class="btn btn-danger d-block">Back</a>
        </div>
        <div class="modal-body">
            <!-- Form -->
            <form action="Update.php" method="POST">
                    <input type="hidden" class="form-control" id="exampleInputPassword1" name="no" value="<?php echo $id; ?>">
               
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo  $_SESSION["name"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION["email"]; ?>">
                </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
                 <button class="btn btn-primary d-block" type="submit" name="update">Update</button>   
        </div>
        </form>
    </div>

</body>
</html>