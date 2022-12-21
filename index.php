
<html>
<head>
    <title>Vegetables Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-black">
<form action="index.php" method="post">
    <div class="card text-bg-dark p-3">
        <label>Conection to db:</label>
        <?php

        $conn = new mysqli("localhost","root","","mydb1");
        $searcV = "";
        if(isset($_POST['serchbut'])){
            $searcV = trim(htmlspecialchars($_POST['search']));
        }
        if(isset($_POST['delbut'])){
            $delid = intval($_POST['delbut']);
            //echo '<p>Delleted :'.$delid.'</p>';
            $delsql = "DELETE FROM vegetables WHERE id = $delid ";//.(int)$_POST['delbut'];
            if(!$conn->query($delsql)){
                echo '<p>Error</p>';
                exit;
            }
        }
        if(isset($_POST['add'])){
            echo "<script> location.href='addVegetable.php'; </script>";
            exit;
        }
        if(isset($_POST['dell'])){
            foreach ($_POST as $k => $v){
                if (substr($k,0,2) == "cb"){
                    $idVeg = substr($k,2);
                    $del = "DELETE FROM vegetables WHERE id = $idVeg";
                    if(!$conn->query($del)){
                        echo '<p>Error</p>';
                        exit;
                    }
                }
            }
        }
        if($conn->connect_error){
            echo 'Error';
        }
        else{
            echo 'Ok';
            $sql_code = "SELECT * FROM vegetables";
            if($results = $conn->query($sql_code)) {
                echo'<div class="input-group mb-3 w-25" style="min-width: 18rem;">
                        <input type="text" class="form-control" placeholder="Vegetable" name="search">
                        <button class="btn btn-primary" type="submit" id="button-addon2" name="serchbut">Search</button>
                    </div>';
                echo '<table class="table table-warning">';
                echo '<tr>';
                echo '<td>';
                echo  'Delete' ;
                echo '</td>';
                echo '<td>';
                echo  'Vegetables';
                echo '</td>';
                echo '<td>';
                echo  'Price';
                echo '</td>';
                echo '<td>';
                echo  'Check';
                echo '</td>';
                echo '</tr>';
                foreach ($results as $res){
                    if($res["vegetable"] == $searcV){
                        echo '<tr class="table-info" >';
                    }
                    else{
                        echo '<tr class="table table-light">';
                    }
                    echo '<td>';
                    echo  "<button  type='submit' class='btn btn-danger' name='delbut' value='{$res["id"]}'>X</button>";
                    echo '</td>';

                    echo '<td>';
                    echo  $res["vegetable"];
                    echo '</td>';
                    echo '<td>';
                    echo  $res["price"];
                    echo '</td>';
                    echo '<td>';
                    echo '<input type="checkbox" class="form-check-input" name="cb'.$res["id"].'">';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                $results->free();
            }
            else {
                echo '<p>Error!</p>';
            }
            echo '<p><button class="btn btn-outline-info mt-3" name="add">Add Vegetable</button>
              <button type="submit" class="btn btn-outline-danger mt-3" name="dell" >Dell Checked</button></p>';
        }
        $conn->close();
        ?>
    </div>
</form>
</body>
</html>