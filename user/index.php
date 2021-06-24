<?php
    include '../heder.php';
    include '../conn.php';
?>

    <div class="canva">
        <form action="search.php" method="post">
            <input type="search" name="psearch" id="">
            <button type="submit" name="search"> Search </button> <br><br>
        </form>

        <form action="search.php" method="post">
            <select name='select_sort'>
                <option value='ASC'> Price Low to High </option>
                <option value='DESC'> Price High to Low </option>
            </select>
            <button type="submit" name="sort_btn"> Sort </button> <br><br>
        </form>
        
        <form action="index.php" method="post">
            <select name='select_cat'>
                <option value='Books'> Books </option>
                <option value='Clothig'> Clothig </option>
                <option value='Home Furnishings'> Home Furnishings </option>
                <option value='Electronic'> Electronic </option>
            </select>
            <button type="submit" name="cat_btn"> Sort </button> <br><br>
        </form>

        <table border = "3px">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
            <?php
                $qur = mysqli_query($con, "SELECT * FROM product ")  or die(mysqli_error($con));

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

            <?php
                if(isset($_POST['cat_btn']))
                {
                    $var_cat = $_POST['select_cat'];
                    $qur = mysqli_query($con, "SELECT * FROM product WHERE category like '%$$var_cat%' ")  or die(mysqli_error($con));

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
                }
            ?>
        </table>
    </div>