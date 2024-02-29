
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador de Pacientes</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/edit.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>  
    
    <?php
        $alerta = session('mensajeUpdateError');
        if ($alerta) {
            echo '<script>Swal.fire({
                    icon: "error",
                    text: "' . $alerta . '",
                });</script>';
        }
    ?>
    
    <h2 class="text-center my-5 titulo">Administrador de Pacientes de Veterinaria</h2>
    <div class="container mt-5 p-5" >
        <div id="contenido" class="row">
            <div class="col-md-6 agregar-cita">
            <form id="nueva-cita" method="POST" action="<?php echo base_url('ActualizarCita'); ?>">
                    <legend class="mb-4 titulo_header">Datos del Paciente</legend>
                    <div class="form-group row" style="display: none;">
                        <label class="col-sm-4 col-lg-4 col-form-label">Id:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="hidden" id="id" name="id" value="<?= $respuesta[0]['cit_id'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Nombre Mascota:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="text" id="mascota" name="mascota" value="<?= $respuesta[0]['cit_nombremascotas'] ?>" class="form-control" placeholder="Nombre Mascota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Propietario:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="text" id="propietario" name="propietario" value="<?= $respuesta[0]['cit_propietario'] ?>" class="form-control" placeholder="Nombre Dueño de la Mascota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Teléfono:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="tel" id="telefono" maxlength="15" name="telefono" value="<?= $respuesta[0]['cit_telefono'] ?>" class="form-control" placeholder="Número de Teléfono">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Fecha:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="date" id="fecha" name="fecha" value="<?= $respuesta[0]['cit_fecha'] ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Hora:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="time" id="hora" name="hora" value="<?= $respuesta[0]['cit_hora'] ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Sintomas:</label>
                        <div class="col-sm-8 col-lg-8">
                            <textarea id="sintomas" name="sintomas"  class="form-control"><?= $respuesta[0]['cit_sintomas'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success w-100 d-block">Actualizar Citas</button>
                    </div>
                </form>
                
            </div>
            
        </div> <!--.row-->
    </div><!--.container-->

</body>

</html>