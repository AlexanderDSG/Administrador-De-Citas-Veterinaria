<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador de Pacientes</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/styles.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <?php
        $alerta = session('mensajeFallido');
        if ($alerta) {
            echo '<script>Swal.fire({
                    icon: "error",
                    text: "' . $alerta . '",
                });</script>';
        }
    ?>
    <?php
        $alerta = session('mensajeExito');
        if ($alerta) {
                echo '<script>Swal.fire({
                icon: "success",
                text: "' . $alerta . '",
            });</script>';
        }
    ?>
    <?php
        $alerta = session('mensajeUpdate');
        if ($alerta) {
                echo '<script>Swal.fire({
                icon: "success",
                text: "' . $alerta . '",
            });</script>';
        }
    ?>
    <?php
        $alerta = session('mensajeDelete');
        if ($alerta) {
                echo '<script>Swal.fire({
                icon: "success",
                text: "' . $alerta . '",
            });</script>';
        }
    ?>
    <h2 class="text-center my-5 titulo">Administrador de Pacientes de Veterinaria</h2>
    
    <div class="container mt-5 p-5">
        <div id="contenido" class="row">
            <div class="col-md-6 agregar-cita">
                <form id="nueva-cita" method="POST" action="<?php echo base_url('Insertar'); ?>">
                    <legend class="mb-4">Datos del Paciente</legend>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Nombre Mascota:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="text" id="mascota" name="mascota" class="form-control" placeholder="Nombre Mascota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Propietario:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="text" id="propietario" name="propietario" class="form-control" placeholder="Nombre Dueño de la Mascota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Teléfono:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="tel" id="telefono" maxlength="15" name="telefono" class="form-control" placeholder="Número de Teléfono">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Fecha:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="date" id="fecha" name="fecha" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Hora:</label>
                        <div class="col-sm-8 col-lg-8">
                            <input type="time" id="hora" name="hora" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Sintomas:</label>
                        <div class="col-sm-8 col-lg-8">
                            <textarea id="sintomas" name="sintomas" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success w-100 d-block">Crear Cita</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h2 id="administra" class="mb-4">Administra tus Citas</h2>
                <ul id="citas" name="citas" class="list-group lista-citas">

                    <?php foreach ($resultadoSelect as $key) : ?>
                        <li class="list-group-item">
                            <strong>Nombre Mascota:</strong> <?php echo $key->cit_nombremascotas ?><br>
                            <strong>Propietario:</strong> <?php echo $key->cit_propietario ?><br>
                            <strong>Telefono:</strong> <?php echo $key->cit_telefono ?><br>
                            <strong>Fecha:</strong> <?php echo $key->cit_fecha ?><br>
                            <strong>Hora:</strong> <?php echo $key->cit_hora ?><br>
                            <strong>Síntomas:</strong> <?php echo $key->cit_sintomas ?><br>
                            <button type="submit" class="btn btn-warning"><a class="nav-link" href="<?php echo base_url('Actualizar/' . $key->cit_id) ?>">Editar</a></button>
                            <button type="submit" class="btn btn-danger"><a class="nav-link" href="<?php echo base_url('Eliminar/' . $key->cit_id) ?>">Eliminar</a></button>

                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div> <!--.row-->
    </div><!--.container-->

</body>

</html>