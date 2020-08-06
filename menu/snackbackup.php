<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["sna_nombre"]))
    {
        
        $sna_id=$_POST["sna_id"];
        $sna_nombre=$_POST["sna_nombre"];;
        $sna_precio=$_POST["sna_precio"];   
        $sna_disponible=$_POST["sna_disponible"];         

        $sql = "UPDATE snack SET sna_id=".$sna_id.
            ",sna_nombre='".$sna_nombre."'".
            ",sna_precio='".$sna_precio."'".
            ",sna_disponible=".$sna_disponible."".
            " WHERE sna_id=".$sna_id;              
        $conn->query($sql);
        $conn->close(); 
        header("Location: index.php");

    }
    $sna_id=$_GET["sna_id"];
    $sql = "SELECT sna_id,bar_id,sna_nombre,sna_precio,sna_disponible "
            ."FROM snack "
            ." WHERE sna_id=".$sna_id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row["sna_disponible"]==1) {
        $abierto="checked";
        $cerrado="";
    }else{
        $abierto="";
        $cerrado="checked";
    }  
    $sql = "SELECT * FROM snack ORDER BY sna_nombre"; 
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
                <h1 class="text-center">ACTUALIZAR CAMPUS</h1>
            </div>        
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col border">
                                
                <div class="form-group">
                <label for="cam_nombre">Bar</label>
            
                <input type="text" class="form-control " id="bar_id" name="bar_id"value="<?php echo $row["bar_id"]?>">
                </div>
                </div>
                <div class="col border">
                <div class="form-group">
                <label for="sna_nombre">Nombre</label>
                <input type="text" class="form-control " id="sna_nombre" name="sna_nombre"value="<?php echo $row["sna_nombre"]?>">
                </div>
                <div class="form-group">
                <label for="sna_precio">Precio</label>
                <input type="text" class="form-control " id="sna_precio" name="sna_precio"value="<?php echo $row["sna_precio"]?>">
                </div>
                <div class="form-group">
                <div class="form-group">
                <label for="bar_abierto">Abierto</label>
                <input type="radio" class="form-control" id="bar_abierto" name="sna_disponible" value="1"<?php echo $abierto?>>
                <label for="bar_cerrado">Cerrado</label>
                <input type="radio" class="form-control" id="bar_cerrado" name="sna_disponible" value="0"<?php echo $cerrado?>>
                
                </div>
            </div>   
            </div>       
        
        <div class="row">
            <div class="col">
            <input type="hidden"name="sna_id"value=<?php echo $row["sna_id"]?>> 
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