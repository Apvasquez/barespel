<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["bar_nombre"]))
    {
        $cam_id=$_POST["cam_id"];
        $bar_nombre=$_POST["bar_nombre"];
        $bar_abierto=$_POST["bar_abierto"];
        

        $sql = "INSERT INTO bar  (bar_id,cam_id,bar_nombre,bar_abierto) VALUES(0,".$cam_id.",'".$bar_nombre."',".$bar_abierto.")";
        $conn->query($sql);
        $conn->close();
        header("Location: index.php");

    }
   
    $sql = "SELECT * FROM campus ORDER BY cam_id"; 
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
                <label for="cam_id">Campus</label>
                <select name="cam_id" id="cam_id" class="custom-select" >
                    <?php  while($row= $result_campus->fetch_assoc()){?>
                    <option value="<?php echo $row["cam_id"] ?>"><?php echo $row["cam_nombre"] ?></option>
                    <?php } ?>

                </select>
                
                </div>
                <div class="form-group">
                <label for="bar_nombre">Nombre</label>
                <input type="text" class="form-control" id="bar_nombre" name="bar_nombre">
                </div>
                <div class="form-group">
                <label for="bar_abierto">Abierto</label>
                <input type="radio" class="form-control" id="bar_abierto" name="bar_abierto" value="0">
                <label for="bar_cerrado">Cerrado</label>
                <input type="radio" class="form-control" id="bar_cerrado" name="bar_abierto" value="1">
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