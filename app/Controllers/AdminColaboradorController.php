<?php
namespace App\Controllers;

use App\Models\ColaboradorModel;

class AdminColaboradorController extends BaseController
{
    protected $colaboradorModel;
    
    public function __construct()
    {
        $this->colaboradorModel = new ColaboradorModel();
    }

    public function index()
    {
        helper('text');
        $db = \Config\Database::connect();
        $query = $db->table('colaboradores');
        $query->select('colaboradores.*, cargos.nombre as cargo');
        $query->select('colaboradores.*, equipos.nombre as equipo');
        $query->join('cargos', 'colaboradores.id_cargo = cargos.id');
        $query->join('equipos','colaboradores.id_equipo = equipos.id');
        $funcionarios = $query->get()->getResultArray();
        $data = ['title'=> 'Administrar colaboradores', 'colaboradores'=>$funcionarios];
        return view('cms_cmm/admin_colaboradores', $data);
    }

}