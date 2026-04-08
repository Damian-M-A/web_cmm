<?php
namespace App\Controllers;

use App\Models\ColaboradorModel;

class EquipoController extends BaseController
{


    public function index()
    {
        helper('text');
        $db = \Config\Database::connect();
        $query = $db->table('colaboradores');
        $query->select('colaboradores.*, cargos.nombre as cargo');
        $query->join('cargos', 'colaboradores.id_cargo = cargos.id');
        $funcionarios = $query->get()->getResultArray();
        $data = ['title'=> 'Nuestro Equipo', 'colaboradores'=>$funcionarios];
        return view('equipo',$data);
    }
}