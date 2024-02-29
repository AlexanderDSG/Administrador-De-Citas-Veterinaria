<?php

namespace App\Controllers;

use App\Models\citasModelo;

class crud extends BaseController
{

    //conexion a la bdd se va a config y se llamada a la carpetea database 
    //para conectar a la bdd
    public function conect()
    {
        //cargar o conectar a la configuracion de la bdd
        $db = \Config\Database::connect();
        //comprobar la conexion bdd
        if ($db->connect()) {
            echo "conexion a bdd exitosa";
        } else {
            echo "No se conecto aa la bdd";
        }
    }
    
    public function selectCitas()
    {
        $instancia = new citasModelo();
        $datos = $instancia->select_citas();
        $datosvista = [
            'resultadoSelect' => $datos
        ];

        return view('AdministradorCitas', $datosvista);
    }

    

    public function insertCitas()
    {

        $datos = [
            "cit_nombremascotas" => $_POST['mascota'],
            "cit_propietario" => $_POST['propietario'],
            "cit_telefono" => $_POST['telefono'],
            "cit_fecha" => $_POST['fecha'],
            "cit_hora" => $_POST['hora'],
            "cit_sintomas" => $_POST['sintomas']
        ];
        
        foreach ($datos as $campos => $valor) {
            if (empty($valor)) {
                return redirect()->to(base_url('/'))->with('mensajeFallido','Debe llenar la información');
            }
        };
        $instancia = new citasModelo();
        print_r($instancia->insert_citas($datos));
        return redirect()->to(base_url('/'))->with('mensajeExito', '¡Cita agregada con éxito!');
    }

    public function extratablaCitas($cit_id)
    {
        
        
        $datos = [
            "cit_id" => $cit_id

        ];
        $instancia = new citasModelo();

        $respuesta = $instancia->extraactualizacion($datos);

        $datos = [
            "respuesta" => $respuesta
        ];
        return view('ActualizarCitas', $datos);
    }

    public function actualizarCitas()
    {
        $datos = [
            "cit_nombremascotas" => $_POST['mascota'],
            "cit_propietario" => $_POST['propietario'],
            "cit_telefono" => $_POST['telefono'],
            "cit_fecha" => $_POST['fecha'],
            "cit_hora" => $_POST['hora'],
            "cit_sintomas" => $_POST['sintomas']
        ];

        $idactualizar = $_POST['id'];

        foreach ($datos as $campo => $valor) {
            if (empty($valor)) {
                return redirect()->to(base_url('/Actualizar/' . $idactualizar))->with('mensajeUpdateError', 'Todos los campos deben estar llenos.');

            }
        }
        $instancia = new citasModelo();
        print_r($instancia->actualizar_citas($idactualizar, $datos));
        return redirect()->to(base_url('/'))->with('mensajeUpdate', '¡Actualización exitosa!');


    }

    public function eliminarCitas($cit_id)
    {

        $instancia = new citasModelo();

        $respuesta = $instancia->eliminar_citas($cit_id);

        print_r($respuesta);
        return redirect()->to(base_url('/'))->with('mensajeDelete','Cita Eliminada');
    }
}
