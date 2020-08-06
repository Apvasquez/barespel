<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["buz_fecha"]))
    {
        $bar_id=$_POST["bar_id"];
        $buz_fecha=$_POST["buz_fecha"];
        $buz_descripcion=$_POST["buz_descripcion"];
        
        $sql = "INSERT INTO buzon  (buz_id,bar_id,buz_fecha,buz_descripcion) VALUES(0,".$bar_id.",'".$buz_fecha."','".$buz_descripcion."')";
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
                <h1 class="text-center">CREAR BUZON</h1>
            </div>
        
        </div>
        <form action="" method="POST" class="was-validated">
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
                <label for="buz_fecha">FECHA</label>
        
            <input type="text" class="form-control" id="buz_fecha" placeholder="Ingrese Fecha" name="buz_fecha" required pattern="[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">2020-12-02</div>

                </div>
                <div class="form-group">
                <label for="buz_descripcion">Precio</label>
                <input type="text" class="form-control" id="buz_descripcion" name="buz_descripcion">
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