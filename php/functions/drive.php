<?php 
$user = $_SESSION['username'];
$connection = mysqli_connect("localhost", "root", "", "substancesoft") or die('"connection"');

function getOpenAccounts()
    {
        global $user, $connection;
        $query = "select * from orden where ESTADO='ABIERTA' and mesa=0";
        if($_SESSION['tipo']!='administrador')
        {
            $query.= " and usuario = '$user'";
        }
        $result = mysqli_query($connection, $query) or die ('"query"');
        $output = "";
        if($result->num_rows!=0)
        {
            for($i=0; $i<$result->num_rows; $i++)
            {
                $row = mysqli_fetch_array($result);
                if($i%4 == 0)
                {
                    $output .= '<div class="card-deck">';
                }
                $output.='<div class="card text-center">';
                $output.='<div class="card-body">';
                $output.='<img class="card-img-top img-fluid" src="../../images/cuenta.png" alt="Cuenta">';
                $output.='<div class="card-block">';
                if($row['descripcion']!="")
                {
                    $output.='<h4 class="card-title">'.$row['descripcion'].'</h4>';
                }
                else
                {
                    $output.='<h4 class="card-title">Cuenta '.$row['clave'].'</h4>';
                }
                $output.='<p class="card-text">En la mesa '.$row['mesa'].'</p>';
                $output.='<p><a href="../functions/forms/detalles-cuenta.php?clave='.$row['clave'].'" class="btn btn-primary">Consultar</a></p>';
                $output.='</div></div></div>';
                if(($i+1)%4==0)
                {
                    $output.="</div>";
                }
            }
            $rest = 4- $result->num_rows%4;
            for($i=0; $i<$rest; $i++)
            {
                $output.='<div class="card text-center" style="visibility: hidden"> <div class="card-body"></div></div>';
            }
            if($rest>0)
            {
                $output.="</div>";
            }
        }
        return $output;   
    }
    

function getOpenOrders()
    {
        global $user, $connection;
        $query = "select * from orden where ESTADO='ABIERTA' and mesa=0";
        if($_SESSION['tipo']!='administrador')
        {
            $query.= " and usuario = '$user'";
        }
        $result = mysqli_query($connection, $query) or die ('"query"');
        $output = "";
        if($result->num_rows!=0)
        {
            for($i=0; $i<$result->num_rows; $i++)
            {
                $row = mysqli_fetch_array($result);
                if($i%4 == 0)
                {
                    $output .= '<div class="card-deck">';
                }
                $output.='<div class="card text-center">';
                $output.='<div class="card-body">';
                $output.='<img class="card-img-top img-fluid" src="../../images/orden.png" alt="Orden">';
                $output.='<div class="card-block">';
                if($row['descripcion']!="")
                {
                    $output.='<h4 class="card-title">'.$row['descripcion'].'</h4>';
                }
                else
                {
                    $output.='<h4 class="card-title">Mesa'.$row['mesa'].'</h4>';
                }
                $output.='<p class="card-text">En la mesa '.$row['mesa'].'</p>';
                $output.='<p><a href="../functions/forms/nueva-comanda.php?clave='.$row['clave'].'" class="btn btn-primary">Agregar</a></p>';
                $output.='<p><a href="../functions/forms/cancelacion.php?clave='.$row['clave'].'" class="btn btn-danger">Cancelar</a></p>';
                $output.='<p><a href="../functions/forms/cerrar.php?clave='.$row['clave'].'" class="btn btn-success">Cerrar</a></p>';
                $output.='</div></div></div>';
                if(($i+1)%4==0)
                {
                    $output.="</div>";
                }
            }
            $rest = 4- $result->num_rows%4;
            for($i=0; $i<$rest; $i++)
            {
                $output.='<div class="card text-center" style="visibility: hidden"> <div class="card-body"></div></div>';
            }
            if($rest>0)
            {
                $output.="</div>";
            }
        }
        return $output;   
    }
    function getOrdersForCancel()
        {
            global $user, $connection;
            $query = "select * from orden where ESTADO='ABIERTA' and mesa=0";
            if($_SESSION['tipo']!='administrador')
            {
                $query.= " and usuario = '$user'";
            }
            $result = mysqli_query($connection, $query) or die ('"query"');
            $output = "";
            if($result->num_rows!=0)
            {
                for($i=0; $i<$result->num_rows; $i++)
                {
                    $row = mysqli_fetch_array($result);
                    if($i%4 == 0)
                    {
                        $output .= '<div class="card-deck">';
                    }
                    $output.='<div class="card text-center">';
                    $output.='<div class="card-body">';
                    $output.='<img class="card-img-top img-fluid" src="../../images/orden.png" alt="Orden">';
                    $output.='<div class="card-block">';
                    if($row['descripcion']!="")
                    {
                        $output.='<h4 class="card-title">'.$row['descripcion'].'</h4>';
                    }
                    else
                    {
                        $output.='<h4 class="card-title">Mesa '.$row['mesa'].'</h4>';
                    }
                    $output.='<p class="card-text">En la mesa '.$row['mesa'].'</p>';
                    $output.='<p><a href="../functions/forms/cancelacion.php?clave='.$row['clave'].'" class="btn btn-danger">Cancelar</a></p>';
                    $output.='</div></div></div>';
                    if(($i+1)%4==0)
                    {
                        $output.="</div>";
                    }
                }
                $rest = 4- $result->num_rows%4;
                for($i=0; $i<$rest; $i++)
                {
                    $output.='<div class="card text-center" style="visibility: hidden"> <div class="card-body"></div></div>';
                }
                if($rest>0)
                {
                    $output.="</div>";
                }
            }
            return $output;   
        }

        function getUnimpressedAcounts()
    {
            global $user, $connection;
            $query = "select * from orden where ESTADO='cerrada' and mesa=0";
            if($_SESSION['tipo']!='administrador')
            {
                $query.= " and usuario = '$user'";
            }
            $result = mysqli_query($connection, $query) or die ('"query"');
            $output = "";
            if($result->num_rows!=0)
            {
                for($i=0; $i<$result->num_rows; $i++)
                {
                    $row = mysqli_fetch_array($result);
                    if($i%4 == 0)
                    {
                        $output .= '<div class="card-deck">';
                    }
                    $output.='<div class="card text-center">';
                    $output.='<div class="card-body">';
                    $output.='<img class="card-img-top img-fluid" src="../../images/cuenta.png" alt="Cuenta">';
                    $output.='<div class="card-block">';
                    if($row['descripcion']!="")
                    {
                        $output.='<h4 class="card-title">'.$row['descripcion'].'</h4>';
                    }
                    else
                    {
                        $output.='<h4 class="card-title">Cuenta '.$row['clave'].'</h4>';
                    }
                    $output.='<p class="card-text">En la mesa '.$row['mesa'].'</p>';
                    $output.='<p><a href="../functions/forms/ticket.php?clave='.$row['clave'].'" class="btn btn-success">Imprimir ticket</a></p>';
                    $output.='</div></div></div>';
                    if(($i+1)%4==0)
                    {
                        $output.="</div>";
                    }
                }
                $rest = 4- $result->num_rows%4;
                for($i=0; $i<$rest; $i++)
                {
                    $output.='<div class="card text-center" style="visibility: hidden"> <div class="card-body"></div></div>';
                }
                if($rest>0)
                {
                    $output.="</div>";
                }
            }
            return $output; 
    }

    function getUnpaidAccounts()
    {
        global $user, $connection;
        $query = "select * from orden where ESTADO='cerrada' and mesa=0";
        if($_SESSION['tipo']!='administrador')
        {
            $query.= " and usuario = '$user'";
        }
        $result = mysqli_query($connection, $query) or die ('"query"');
        $output = "";
        if($result->num_rows!=0)
        {
            for($i=0; $i<$result->num_rows; $i++)
            {
                $row = mysqli_fetch_array($result);
                if($i%4 == 0)
                {
                    $output .= '<div class="card-deck">';
                }
                $output.='<div class="card text-center">';
                $output.='<div class="card-body">';
                $output.='<img class="card-img-top img-fluid" src="../../images/cuenta.png" alt="Cuenta">';
                $output.='<div class="card-block">';
                if($row['descripcion']!="")
                {
                    $output.='<h4 class="card-title">'.$row['descripcion'].'</h4>';
                }
                else
                {
                    $output.='<h4 class="card-title">Cuenta '.$row['clave'].'</h4>';
                }
                $output.='<p class="card-text">En la mesa '.$row['mesa'].'</p>';
                $output.='<p><a href="../functions/forms/pagar.php?clave='.$row['clave'].'" class="btn btn-success">Pagar</a></p>';
                $output.='</div></div></div>';
                if(($i+1)%4==0)
                {
                    $output.="</div>";
                }
            }
            $rest = 4- $result->num_rows%4;
            for($i=0; $i<$rest; $i++)
            {
                $output.='<div class="card text-center" style="visibility: hidden"> <div class="card-body"></div></div>';
            }
            if($rest>0)
            {
                $output.="</div>";
            }
        }
        return $output;   
    }
?>