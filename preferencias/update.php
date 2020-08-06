<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "barespel";
     $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if(isset($_POST["pre_fecha"]))
    {        
        $pre_id=$_POST["pre_id"];
        $men_id=$_POST["men_id"];
        $pre_fecha=$_POST["pre_fecha"];;
        $pre_observacion=$_POST["pre_obserevacion"];   
           

        $sql = "UPDATE preferencias SET men_id=".$men_id.
            ",pre_fecha='".$pre_fecha."'".
            ",pre_observacion='".$pre_observacion."'".
            " WHERE pre_id=".$pre_id;              
        $conn->query($sql);
        $conn->close(); 
        header("Location: index.php");
    }
    $sna_id=$_GET["sna_id"];
    $sql = "SELECT b.men_id,menu_nombre,pre_fecha,pre_observacion "
            ."FROM preferencias b,menu c "
            ." WHERE pre_id=".$pre_id." AND b.men_id=c.men_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $sql = "SELECT * FROM menu ORDER BY menu_nombre"; 
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
                <label for="men_id">Campus</label>
                <select name="men_id" id="men_id" class="custom-select">
                    <?php  while($row_campus= $result_campus->fetch_assoc()){?>
                    <option value="<?php echo $row_campus["men_id"] ?>"<?php if ($row["men_id"]==$row_campus["men_id"]) echo "selected"?>>
                        <?php echo $row_campus["men_nombre"] ?></option>
                    <?php } ?>
                </select>
                
                </div>
                <div class="col border">
                <div class="form-group">
                <label for="sna_nombre">Fecha</label>
                <input type="text" class="form-control " id="sna_nombre" name="pre_fecha"value="<?php echo $row["pre_fecha"]?>">
                </div>
                <div class="form-group">
                <label for="sna_precio">Precio</label>
                <input type="text" class="form-control " id="sna_precio" name="pre_observacion"value="<?php echo $row["pre_observacion"]?>">
                </div>
                
            </div>   
            </div>       
        
        <div class="row">
            <div class="col">
            <input type="hidden"name="pre_id"value=<?php echo $row["pre_id"]?>> 
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
