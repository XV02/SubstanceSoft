<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, inicial-scale=1">
        
        <title>
            Agregar nuevo platillo
        </title>

        <link href="../../css/bs/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/clean-install.css" rel="stylesheet">
    </head>
    <body>
        <section class="container">
            <h1 class="text-uppercase text-center">Agregar platillo</h2>
            <p class="lead text-center">Por favor, llene los campos con la información requerida. Los campos marcados con <font color="red">*</font> son obligatorios.</p>
            <div class="row">
                <div class="col-8">
                    <form id="formulario" novalidate>
                        <div class="form-group">
                            <label for="">Nombre del platillo:  </label> <font color="red">*</font>
                            <input name="name" type="text" placeholder="Escriba el nombre del platillo" class="form-control" required> 
                            <div class="invalid-feedback">
                                Ingresa datos
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Precio: </label> <font color="red">*</font>
                            <input type="number" step="0.01" name="price" placeholder="Escriba el precio del platillo" class="form-control" required> 
                            <div class="invalid-feedback">
                                Ingresa datos
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Cocina</label> <font color="red">*</font>
                            <?php
                                $connection = mysqli_connect("localhost", "root", "", "substancesoft") or die ("error en BD");

                                $query = "select * from cocina"; 
        
                                $sql = mysqli_query($connection, $query) or die("error en query");
                            ?>
                            <select class="form-control" name="kitchen">
                                <?php                                 
                                while($row = mysqli_fetch_array($sql))
                                {
                                ?>
                                <option><?php echo $row['nombre'];?></option>
                                <?php
                                }
                                    mysqli_close($connection);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input name="description"type="text" placeholder="Describa el platillo" class="form-control"> 
                        </div>                
                        <div class="form-group">
                            <label for="">Dificultad</label> <font color="red">*</font>
                            <select class="form-control" name="dif">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Continuar a enlistar ingredientes</button>
                        </div>
                    </form>
                </div>
            </div>    
        </section>
        <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                  'use strict';
                
                  window.addEventListener('load', function() {
                    var form = document.getElementById('formulario');
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  }, false);
                })();
                </script>    
    </body>
    <script src="../../js/forms/agregar-platillo.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>