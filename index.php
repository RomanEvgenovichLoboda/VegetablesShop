
<html>
<head>
    <title>TEST PHP</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<form method="post">
    <div class="main__div">
        <label>Conection to db:</label>
        <?php
        $conn = new mysqli("localhost","root","","mydb1");
        if($conn->connect_error){
            echo 'Error';
        }
        else{
            echo 'Ok';
        }
       //$sql_code = "INSERT INTO `product`(name,salary) VALUES ('Gun',100)";
    //    if($conn->query($sql_code)){
    //        echo '<p>Data added</p>';
    //    }
    //    else{
    //        echo '<p>Data not added</p>';
    //    }
        $sql_code = "SELECT * FROM vegetables";
        if($results = $conn->query($sql_code)) {
            echo '<table border="1">';
            echo '<tr>';
            echo '<td>';
            echo  'Vegetables';
            echo '</td>';
            echo '<td>';
            echo  'Price';
            echo '</td>';
            echo '<td>';
            echo  'DL';
            echo '</td>';
            echo '</tr>';
            foreach ($results as $res){
                echo '<tr>';
                echo '<td>';
                echo  $res["vegetable"];
                echo '</td>';
                echo '<td>';
                echo  $res["price"];
                echo '</td>';
                echo '<td>';
                echo '<input type="checkbox" name="cb'.$res["id"].'">';
                //echo  '<button onclick="Dellete($res["id"])"> X </button>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            $results->free();
        }
        else {
            echo '<p>Error!</p>';
        }

        echo '<p><button name="add">Add Vegetable</button>
              <button name="dell" >Dell Checked</button>
              </p>';
        if(isset($_POST['add'])){
            echo "<script> location.href='addVegetable.php'; </script>";
            exit;
        }
        if(isset($_POST['dell'])){
            foreach ($_POST as $k => $v){
                if (substr($k,0,2) == "cb"){
                    $idVeg = substr($k,2);
                    $del = "DELETE FROM vegetables WHERE id = $idVeg";
                   if($results=$conn->query($del)){
                       echo '<p>Delleted :'.$idVeg.'</p>';

                       echo "<script> location.href='index.php'; </script>";
                    }
                   else{
                       echo '<p>Error</p>';
                       exit;
                   }
                }
            }

            //$results->free();
        }
        $conn->close();
        ?>
    </div>
</form>

</body>
</html>
</body>
</html>