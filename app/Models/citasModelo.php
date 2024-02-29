<?php

namespace App\Models;

use CodeIgniter\Model;

class citasModelo extends Model
{
    public function select_citas()
    {
        $variable = $this->db->query('SELECT * FROM tbl_citas');
        return $variable->getResult();
    }

    public function insert_citas($datosInsert)
    {
        try {
            
            $tabla = $this->db->table('tbl_citas');
            $tabla->insert($datosInsert);
            $this->db->insertID();
            return true;
        } catch (\Throwable $th) {
            return false. $th;
        }
    }

    public function extraactualizacion($datosActualizar)
    {
        try {
            $tabla = $this->db->table('tbl_citas');
            $tabla->where($datosActualizar);
            return $tabla->get()->getResultArray();
        } catch (\Throwable $th) {
            return false. $th;
        }
    }

    public function actualizar_citas($id, $parametros)
    {
        try {
            $tabla = $this->db->table('tbl_citas');
            $tabla->set($parametros);
            $tabla->where('cit_id', $id)->update();
            return true;
        } catch (\Throwable $th) {
            return false. $th;
        }
    }

    public function eliminar_citas($id)
    {
        try {
            $tabla = $this->db->table('tbl_citas');
            $tabla->where('cit_id', $id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false . $th;
        }
    }
}
