<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barespel";
    
    // Create connection
   
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT cam_nombre,bar_id,bar_nombre,bar_abierto "
        ."FROM bar b,campus c "
        ."WHERE b.cam_id=c.cam_id ";//todos los datos * de la tabla bar
    $result = $conn->query($sql);
    $conn->close();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
 <h1> GESTIÓN DE BAR</h1>

            </div>
            </div>
        <div class="row">
            <div class="col">
               
               <a href="create.php" class="btn btn-success">Nuevo</a><br>
                <table class="table"> 
                    
                    <tr>
                        <th class="text-center" >Ord </th>
                        <th>Campus </th>
                        <th>Nombre </th>
                        <th class="text-center">Abierto </th>  
                        <th class="text-center" >Operaciones </th>                     
                    </tr>
                <?php
                $ord=1; 
                while($row = $result->fetch_assoc()) {
                ?> 
                        <tr>
                            <td class="text-center"> <?php echo $ord++;?></td>
                            <td> <?php echo $row["cam_nombre"]?></td>
                            <td> <?php echo $row["bar_nombre"]?></td>
                            <td class="text-center"> <?php if($row["bar_abierto"]==1)
                                echo"SI";
                                else echo "NO";?>
                               </td>
                            <td class="text-center"> <a href="view.php?bar_id=<?php echo $row["bar_id"]?>" class="btn btn-info">Ver</a> 
                            <a href="update.php?bar_id=<?php echo $row["bar_id"]?>" class="btn btn-warning">Editar</a> 
                            <a href="delete.php?bar_id=<?php echo $row["bar_id"]?>" class="btn btn-danger">Eliminar</a> 
                            </td>
                        </tr>
                <?php
                }
                ?>
                </table>
                </div>
             
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>