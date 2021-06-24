<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title> Admin </title>

    <?php

        include '../conn.php';

        if(isset($_POST['upload'])){
            $id = $_POST['id'];

            $query = "delete from product where id = '$id'";
            mysqli_query($con, $query) or die(mysqli_error($con));
            ?>
            <script>
                alert("product deleted");
            </script>
            <?php
        }
    ?>

</head>
<body>
    <div class="main">
        <form class="post_form" action="delete.php" method="POST" enctype="multipart/form-data">
            <label for="id"> Enter Product Id (which you want to update) </label> <br>
            <input type="text" name="id" id=""><br><br>
            
            <button type="submit" name = "upload"> Delete</button>
            <button type="reset"> Cancle </button>
        </form>
    </div>
</body>
</html>
