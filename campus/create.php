<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["cam_nombre"]))
    {
        $cam_id=$_POST["cam_id"];
        $cam_nombre=$_POST["cam_nombre"];
        $cam_direccion=$_POST["cam_direccion"];
        

        $sql = "INSERT INTO campus  (cam_id,cam_nombre,cam_direccion) VALUES(0,'".$cam_nombre."','".$cam_direccion."')";
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");

    }
   
    $sql = "SELECT * FROM campus ORDER BY cam_nombre"; 
    $result_campus = $conn->query($sql);
    $conn->close();
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">CREAR BAR</h1>
            </div>
        
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col border">
                <div class="form-group">
                              
                </div>
                <div class="form-group">
                <label for="cam_nombre">Nombre</label>
                <input type="text" class="form-control" id="cam_nombre" name="cam_nombre">
                </div>
                <div class="form-group">
                <label for="cam_direccion">Direccion</label>
                <input type="text" class="form-control" id="cam_direccion" name="cam_direccion">
                </div>
                </div>
            </div>       
        
        <div class="row">
            <div class="col">
            <input type="submit"class="btn btn-primary" value="Grabar">
            <a href="index.php" class="btn btn-info">Salir</a>
            
            </div>
        </div>
        </form>
    </div>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>