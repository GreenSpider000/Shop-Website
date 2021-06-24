<?php
    include '../heder.php';
    include '../conn.php';
?>

    <div class="canva">
        <table border = "3px">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>category</th>
            </tr>
            <?php
                $qur = mysqli_query($con, "SELECT * FROM product")  or die(mysqli_error($con));

                while ($row = mysqli_fetch_array($qur)) { 
                    $id = $row['id'];
                    $img = $row['img'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $dic = $row['discription'];
                    $cat = $row['category'];
                   echo "<tr>
                            <td>". $id ."</td>
                            <td> <img src='". $img ."' style = 'height: 100px;'></td>
                            <td>". $name ."</td>
                            <td>". $price ."</td>
                            <td>". $dic ."</td>
                            <td>". $cat ."</td>
                        </tr>";
                }


            ?>
        </table>
    </div>