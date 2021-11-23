<?php 

$con=include('conexion_bd.php');
if($con){
    $sql="SELECT * FROM carga_profesor";
    $resultado=mysqli_query($Conexion,$sql);
    if ($resultado) {
        while($row = $resultado->fetch_array()){
            $id=$row['ID'];
            $nombre=$row['Nombre'];
            $correo=$row['Correo'];
            $grupo=$row['Grupo'];
            $materia=$row['Materia'];
            $estatus=$row['Estatus'];
            $p1=$row['P1'];
            $p2=$row['P2'];
            $p3=$row['P3'];
            ?>
            <div>
            <ul>
            <h4><?php echo $id;?></h4>
            <li><?php echo $nombre;?></li>
            <li><?php echo $correo;?></li>
            <li><?php echo $grupo;?></li>
            <li><?php echo $materia;?></li>
            <li><?php echo $estatus;?></li>
            <li><?php echo $p1;?></li>
            <li><?php echo $p2;?></li>
            <li><?php echo $p3;?></li>
            </ul>
            </div>
            <?php

        }
    }
}


?>