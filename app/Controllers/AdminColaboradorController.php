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
    public function save()
    {
        helper('form');
        $reglas = 
        [
            'cargos' => 'required|is_not_unique[cargos.id]',
            'equipos'=> 'required|is_not_unique[equipos.id]',
            'nombre' => 'required|is_unique[colaboradores.nombre]',
            'profesion' => 'required',
            'descripcion' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]'

        ];
        if(!$this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $imagen = $this->request->getFile('imagen');
        $data = $this->request->getPost();

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombre_imagen = $imagen->getRandomName();
            $imagen->move('img', $nombre_imagen);
        }

        $this->colaboradorModel->insert(
            [
                'nombre' => $data['nombre'],
                'id_cargo' => $data['cargos'],
                'id_equipo' => $data['equipos'],
                'profesion' => $data['profesion'],
                'descripcion' => $data['descripcion'],
                'imagen' => $nombre_imagen,
                'activo' => true
            ]
        );
        return redirect()->to('admin/colaboradores');



    }

}