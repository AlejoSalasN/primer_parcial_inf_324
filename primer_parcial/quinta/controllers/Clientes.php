<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Clientes_model');
    }

    public function index() {
        $data['clientes'] = $this->Clientes_model->obtener_clientes();
        $this->load->view('clientes/index', $data);
    }

    public function eliminar_cuenta($id_cuenta) {
        $this->Clientes_model->eliminar_cuenta($id_cuenta);
        redirect('clientes');
    }

}
?>
