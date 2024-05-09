<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Clientes_model;

class Clientes extends Controller {

    public function index () {
        $clientes_model = new Clientes_model();
        $datos['personas'] = $clientes_model->obtener_clientes_con_cuentas();
        
        return view('clientes/code', $datos);
    }

    public function borrar($id_persona=null) {
        $clientes_model = new Clientes_model();
        $clientes_model->eliminar_cliente_y_cuenta($id_persona);
        
        return redirect()->to(base_url('lista'));
    }

}
?>
