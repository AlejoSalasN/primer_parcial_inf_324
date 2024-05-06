<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    public function obtener_clientes() {
        $this->db->select('personas.nombre, personas.paterno, personas.materno, personas.departamento, cuentas_bancarias.tipo_cuenta, cuentas_bancarias.saldo, cuentas_bancarias.id_cuenta');
        $this->db->from('personas');
        $this->db->join('cuentas_bancarias', 'personas.id_persona = cuentas_bancarias.id_persona');
        $this->db->where('personas.rol', 'cliente');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function eliminar_cuenta($id_cuenta) {
        $this->db->where('id_cuenta', $id_cuenta);
        $this->db->delete('cuentas_bancarias');
    }

}
?>
