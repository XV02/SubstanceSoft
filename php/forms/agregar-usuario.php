<?php
    $connection = mysqli_connect("localhost", "root", "", "substancesoft") or die;

    $nom = $_POST['nom'];
    $pas = $_POST['pas'];
    $usu = $_POST['usu'];
    $pat = $_POST['pat'];
    $mat = $_POST['mat'];
    $dir = $_POST['dir'];
    $tel = $_POST['tel'];
    $tip = $_POST['tip'];

    if($tel=="")
    {
        $tel=0;
    }
    if($tip == 'administrador'|| $tip == 'admin')
    {
        $query = "SELECT COUNT(*) as conteo FROM usuario WHERE tipo = 'administrador' OR tipo = 'admin'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        {
            if($row['conteo']>=5)
            {
                echo json_encode( "'Error, solo pueden haber 5 administradores'");
                mysqli_close($connection);
                die();
            }
        }
    }

    $query = "INSERT INTO usuario (username, password , nombre, apellido_p, apellido_m,
    telefono, direccion, tipo) VALUES ('$usu', AES_ENCRYPT('$pas','Sub5t4nc3S0Ft') , '$nom', '$pat', '$mat', $tel, '$dir', '$tip')";

    $result = mysqli_query($connection, $query) or die("'Error al ingresar, datos inválidos'");

    echo json_encode("Exito!");

    mysqli_close($connection);
?>
