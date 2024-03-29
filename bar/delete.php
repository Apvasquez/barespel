<?php 
    $bar_id = $_GET["bar_id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST["btn_eliminar"])){
        $bar_id=$_POST["bar_id"];
        $sql="DELETE FROM bar WHERE bar_id=".$bar_id;
        $result = $conn->query($sql);
        if($result==TRUE)
            $mesaje="";
            else
            $mesaje="No se pudo ingresar el registro";    

        $conn->close(); 
        header("Location:index.php?mensaje=.$mesaje");
    }
    $sql = "SELECT cam_nombre,bar_id,bar_nombre,bar_abierto "
            ."FROM bar b,campus c "
            ."WHERE bar_id=".$bar_id." AND b.cam_id=c.cam_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class=" p-3 mb-2 bg-success  ">
    
    <img src=" logo-espe-blanco.png" class="rounded mx-auto d-block" alt="logo-espe" >

</div>
<div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">ELIMINAR BAR</h1>
            </div>
        </div>
        <div class="row border">
            <div class="col">
            <div class="form-group">
                <label for="cam_id" class="font-weight-bold">Campus</label><br>
                <span id="cam_id"><?php echo $row["cam_nombre"]?></span>
            </div>    
            <div class="form-group">
                <label for="bar_nombre" class="font-weight-bold">Nombre</label><br>
                <span id="bar_nombre"><?php echo $row["bar_nombre"]?></span>
            </div>    
            <div class="form-group">
                <label for="bar_abierto" class="font-weight-bold">Abierto</label><br>
                <span id="bar_abierto">
                    <?php if($row["bar_abierto"]==1) echo "SI"; 
                          else echo "NO";
                    ?>
                </span>
            </div>    
            </div>
        </div>
        <div class="row">
            <div class="col">
                <br>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="bar_id" value=<?php echo $row["bar_id"]?>>
                    <input type="submit" class="btn btn-danger" value="Eliminar" name="btn_eliminar">
                    <a href="index.php" class="btn btn-info">Salir</a>   
                </form>
                
            </div>
        </div>
    </div>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
</body>
</html>