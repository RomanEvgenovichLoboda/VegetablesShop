<html>
<head>
    <title>DZ_Z1</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<form method="post" action="#">
    <h3>Add Vegetable:</h3>
    <p><input type="text" name="name" placeholder="Add Name" /></p>

    <p><input type="number" name="price" placeholder="Add Prise" /></p>

    <p><button type="submit" name="addVegetable"> Add </button></p>
</form>
<div id="myDiv">
    <?php
    if(isset($_POST['addVegetable'])){
        //echo '<p>Thank you for subscribing</p>';
        $vegetable = trim(htmlspecialchars($_POST['name']));
        $price = intval($_POST['price']);
        if($vegetable==""||$price=="") exit();
        $conn = new mysqli("localhost","root","","mydb1");
        //$sql_code = "INSERT INTO `Vegetables`(vegetable,price) VALUES ('".$_POST['name']."',".$_POST['price'].")";
        $sql_code = "INSERT INTO `Vegetables`(vegetable,price) VALUES ('".$vegetable."',".$price.")";
//        $res=$conn->query($sql_code);
//        $err = mysqli_errno();
//        if($err){
//            echo 'Error code:'.$err.'<br>';
//        }


        if($results=$conn->query($sql_code)){
            echo '<p>Data added</p>';
            echo "<script> location.href='index.php'; </script>";
        }
        else{
//            $err = mysqli_errno();
//            echo 'Error code:'.$err.'<br>';
            echo '<p>Data not added</p>';
        }
        //mysql_free_result()
        $results->free();
        $conn->close();

    }

    ?>
</div>

</body>
</html>
</body>
</html>