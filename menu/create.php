<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["men_nombre"]))
    {
        $bar_id=$_POST["bar_id"];
        $men_nombre=$_POST["men_nombre"];
        $men_precio=$_POST["men_precio"];
        $men_disponible=$_POST["men_disponible"];
        $men_descripcion=$_POST["men_descripcion"];
        $sql = "INSERT INTO menu  (men_id,bar_id,men_nombre,men_precio,men_disponible,men_descripcion) VALUES(0,".$bar_id.",'".$men_nombre."','".$men_precio."',".$men_disponible.",'".$men_descripcion."')";
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");

    }
   
    $sql = "SELECT * FROM bar ORDER BY bar_nombre"; 
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
                <h1 class="text-center">CREAR SNACK</h1>
            </div>
        
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col border">
                <div class="form-group">
                <label for="bar_id">Bar</label>
                <select name="bar_id" id="bar_id" class="custom-select" >
                    <?php  while($row= $result_campus->fetch_assoc()){?>
                    <option value="<?php echo $row["bar_id"] ?>"><?php echo $row["bar_nombre"] ?></option>
                    <?php } ?>

                </select>
                
                </div>
                <div class="form-group">
                <label for="men_nombre">Nombre</label>
                <input type="text" class="form-control" id="men_nombre" name="men_nombre">
                </div>
                <div class="form-group">
                <label for="men_precio">Precio</label>
                <input type="text" class="form-control" id="men_precio" name="men_precio">
                </div>
                <div class="form-group">
                <label for="men_abierto">Abierto</label>
                <input type="radio" class="form-control" id="men_abierto" name="men_disponible" value="0">
                <label for="men_cerrado">Cerrado</label>
                <input type="radio" class="form-control" id="men_cerrado" name="men_disponible" value="1">
                </div>
                <div class="form-group">
                <label for="men_precio">Descripcion</label>
                <input type="text" class="form-control" id="men_descripcion" name="men_descripcion">
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