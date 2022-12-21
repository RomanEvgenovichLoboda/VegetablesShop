<html>
<head>
    <title>Vegetables Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-black">
<form method="post" action="#">

    <div class="card text-bg-dark p-3" style="max-width: 18rem;">
        <div class="card-header"><h4>Add Vegetable:</h4></div>
        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control log" name="name" placeholder="Vegetable" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control pass" name="price" placeholder="Price" aria-label="Password" aria-describedby="basic-addon1">
            </div>
            <div class="mt-4">
                <button type="submit" name="addVegetable"" class="btn btn-outline-primary">Add</button>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['addVegetable'])){
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
</form>
<div id="myDiv">

</div>

</body>
</html>
</body>
</html>