<?php
namespace App\Models;

use CodeIgniter\Model;

class Clientes_model extends Model {

    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $allowedFields = ['id_persona', 'nombre', 'paterno', 'materno', 'departamento', 'rol'];

    public function obtener_clientes_con_cuentas() {
        return $this->db->table($this->table)
                        ->select('personas.*, cuentas_bancarias.tipo_cuenta, cuentas_bancarias.saldo')
                        ->join('cuentas_bancarias', 'personas.id_persona = cuentas_bancarias.id_persona', 'left')
                        ->where('personas.rol', 'cliente')
                        ->get()
                        ->getResultArray();
    }

    public function eliminar_cliente_y_cuenta($id_persona) {
        $this->where('id_persona', $id_persona)->delete();
        $this->db->table('cuentas_bancarias')->where('id_persona', $id_persona)->delete();
    }

}
