/**
 *! ELIMINAR CUANDO SE IMPLEMENTE LA BASE DE DATOS
*/
<?php 
session_start();
if(isset($_POST['btn-encargo'])){
    //llenado de datos para lista de pedidos
    $solicitante=$_POST['txtSolicitante'];
    $Tipo=$_POST['txtTipo'];
    $Fecha=$_POST['txtfecha'];
    $Telefono=$_POST['txtTel'];
    $Descripcion=$_POST['txtDescripcion'];
    $MontoTotal=$_POST['txtMonto'];
    $id_empleado=$_SESSION['id_empleado'];
    //llenar datos en una lista con las variable, estos datos serian persistentes y acumulables a varias inserciones
    $lista_pedidos[]=array(
        "solicitante"=>$solicitante,
        "Tipo"=>$Tipo,
        "Fecha"=>$Fecha,
        "Telefono"=>$Telefono,
        "Descripcion"=>$Descripcion,
        "MontoTotal"=>$MontoTotal,
        "id_empleado"=>$id_empleado,
    );
    //guardar la lista en una sesion para trasladarlo
    $_SESSION['lista_pedidos']=$lista_pedidos;
    echo("<script> alert('Se logro la insercion de pedido') </script>" );
    
    
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Solicitante</th>";
    echo "<th>Tipo</th>";
    echo "<th>Fecha</th>";
    echo "<th>Telefono</th>";
    echo "<th>Descripcion</th>";
    echo "<th>MontoTotal</th>";
    echo "<th>id_empleado</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    foreach($lista_pedidos as $pedidos){
        echo "<tr>";
        echo "<td>".$pedidos['solicitante']."</td>";
        echo "<td>".$pedidos['Tipo']."</td>";
        echo "<td>".$pedidos['Fecha']."</td>";
        echo "<td>".$pedidos['Telefono']."</td>";
        echo "<td>".$pedidos['Descripcion']."</td>";
        echo "<td>".$pedidos['MontoTotal']."</td>";
        echo "<td>".$pedidos['id_empleado']."</td>";
        echo "<td>".$pedidos['id_empleado']."</td>";
        echo "<td>".$pedidos['id_empleado']."</td>";
        echo "</tr>";
    }
    echo "</table>";  
    
}

?>