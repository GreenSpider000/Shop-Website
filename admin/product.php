
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

            $pname = strip_tags($_POST['name']);
            $pname = str_replace(' ', '', $pname);
            $pname = ucfirst(strtolower($pname));

            $price = $_POST['price'];
            $dis = $_POST['dis'];

            $checkbox1=$_POST['cat']; 
            $chk="";  
            foreach($checkbox1 as $chk1)  
            {  
                $chk .= $chk1.",";  
            }

            $imageName = $_FILES['fileToUpload']['name'];
            $errorMessage = "";
            
            if($imageName != ""){
                $targetDir = "../images/";
                $imageName = $targetDir . uniqid() . basename($imageName); //img name
                $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);
                $uploadOk = 1;

                if($uploadOk){
                    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)){
                        //image Upload Okey
                        $errorMessage = "uploaded";
                    }
                    else{
                        $uploadOk = 0;
                        $errorMessage = "fail to upload";
                    }
                }
            }

            $query = "INSERT INTO product(name, img, price, discription, category ) VALUES ('$pname', '$imageName', '$price', '$dis', '$chk')";
            mysqli_query($con, $query) or die(mysqli_error($con));
            ?>
            <script>
                alert("product Uploaded");
            </script>
            <?php
        }

    ?>

</head>
<body>
    <div class="main">
        <form class="post_form" action="product.php" method="POST" enctype="multipart/form-data">
            <label for="img"> Upload Product Image </label> <br>
            <input type="file" name="fileToUpload" id="fileToUpload"/><br><br>

            <label for="name"> Product name </label> <br>
            <input type="text" name="name" id=""><br><br>

            <label for="price"> Product price </label> <br>
            <input type="text" name="price" id=""><br><br>

            <label for="dis"> Product Discription </label> <br>
            <textarea id="dis" name="dis" rows="4" cols="50"> </textarea><br><br>

            <?php
                 $qur = mysqli_query($con, "SELECT * FROM categories ")  or die(mysqli_error($con));
                 while ($row = mysqli_fetch_array($qur)) { 
                    $name = $row['cat_name'];
                    echo "<input type='checkbox' id='vehicle1' name='cat[]' value='$name'> $name <br>";
                 }

            ?>

            <!-- <label for="cat"> Product Category(s) </label> <br>
            <input type='checkbox' id='vehicle1' name='cat[]' value='Clothig'> Clothig <br>
            <input type='checkbox' id='vehicle1' name='cat[]' value='electronics'> electronics <br>
            <input type='checkbox' id='vehicle1' name='cat[]' value='books'> books <br>
            <input type='checkbox' id='vehicle1' name='cat[]' value='Home Furnishings'> Home Furnishings <br> <br> -->

            <br><br><button type="submit" name = "upload" style="background: linear-gradient(45deg, #4caf50, #cddc39);"> Upload</button>
            <button type="reset"> Cancle </button>

        </form>
    </div>
</body>
</html>