<?php
namespace App\Controllers;

use App\Models\CargoModel;
use App\Models\ColaboradorModel;
use App\Models\EquipoModel;


class AdminColaboradorController extends BaseController
{
    protected $colaboradorModel;
    protected $equipoModel;
    protected $cargoModel;
    
    public function __construct()
    {
        $this->colaboradorModel = new ColaboradorModel();
        $this->equipoModel = new EquipoModel();
        $this->cargoModel = new CargoModel();


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
    public function new()
    {
        $cargos = $this->cargoModel->findAll();
        $equipo = $this->equipoModel->findAll();

        $data = ['title' => 'Añadir nuevo colaborador', 'cargos' => $cargos, 'equipos' => $equipo];
        return view('cms_cmm/nuevo_colaborador', $data);
    }

}