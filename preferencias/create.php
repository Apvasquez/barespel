<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["pre_nombre"]))
    {
        $men_id=$_POST["men_id"];
        $pre_fecha=$_POST["pre_fecha"];
        $pre_observacion=$_POST["pre_observacion"];
        
        $sql = "INSERT INTO preferencias  (pre_id,men_id,pre_fecha,pre_observacion) VALUES(0,".$men_id.",'".$pre_fecha."','".$pre_observacion."')";
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
                <h1 class="text-center">CREAR PREFERENCIA</h1>
            </div>
        
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col border">
                <div class="form-group">
                <label for="men_id">Bar</label>
                <select name="men_id" id="men_id" class="custom-select" >
                    <?php  while($row= $result_campus->fetch_assoc()){?>
                    <option value="<?php echo $row["men_id"] ?>"><?php echo $row["men_nombre"] ?></option>
                    <?php } ?>

                </select>
                
                </div>
                <div class="form-group">
                <label for="men_nombre">Fecha</label>
                <input type="text" class="form-control" id="men_nombre" name="pre_fecha">
                </div>
                <div class="form-group">
                <label for="men_precio">Observación</label>
                <input type="text" class="form-control" id="men_precio" name="pre_observacion">
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