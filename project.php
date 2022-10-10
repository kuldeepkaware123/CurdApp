<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <h1 class="text-center text-uppercase bg-warning mb-4 m-auto border p-2">PHP Project</h1>
    <!-- Button trigger modal -->
    <div class="container d-flex justify-content-end mb-4">
        <a href="adddata.php" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Add the Record
        </a>
    </div>
    <?php
    session_start();
    include "connection.php";
    //Table inserted
    if (isset($_POST['submit'])) {
        $no = $_POST['no'];
        $_SESSION["name"] = $_POST['name'];
        $_SESSION["email"] = $_POST['email'];
        $name =  $_SESSION["name"];
        $email =  $_SESSION["email"];
        //insert inro
        $sql1 = "INSERT INTO project (S_no,name, email)
  VALUES ('$no','$name','$email');";
        mysqli_query($conn, $sql1);
    };
    // Access data from table
    $sql2 = "SELECT S_no, name,email FROM project";
    $result = mysqli_query($conn, $sql2);
    mysqli_num_rows($result);
    // print data 
    echo "<div class='container'>";
    echo "<table class='table table-striped table-hover table-bordered text-center table-responsive-md '>
                <tr class='bg-primary' >
                <th style ='color:white;' >S No</th>
                <th  style ='color:white;'>Name</th>
                <th style ='color:white;'>Email</th>
                <th style ='color:white;'>Action</th>
                </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["S_no"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td class='text-center'>" .
            "<a href=\"delete.php?del&S_no=" . $row['S_no'] . "\"class='btn btn-danger me-4'>Delete</a>".
            "<a href=\"edit.php?edit&S_no=" . $row['S_no'] . "\"class='btn btn-success'>Edit</a>" ."</td></tr>";
    };
    echo "</table>";
    echo "</div>";

    ?>
   
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>