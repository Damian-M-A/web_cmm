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
    public function edit($id = null)
    {
        if($id === null)
        {
            return redirect()->to('admin/colaboradores');

        }

        $colaborador = $this->colaboradorModel->find($id);
        if (!$colaborador) 
        {
        return redirect()->to('admin/colaboradores');
        }
        $cargos = $this->cargoModel->findAll();
        $equipo = $this->equipoModel->findAll();
        
        $data = ['title' => 'Editando colaborador', 'colaborador'=> $colaborador, 'cargos'=>$cargos, 'equipos'=> $equipo];
        return view('cms_cmm/editar_colaborador', $data);
    }
    public function update($id = null)
    {
        helper(['form', 'url']);

        if ($id === null) {
            return redirect()->to('admin/colaboradores');
        }

        $colaborador = $this->colaboradorModel->find($id);
        if (!$colaborador) {
            return redirect()->to('admin/colaboradores');
        }

        $reglas = [
            'equipos'     => 'required|is_not_unique[equipos.id]',
            'nombre'      => "required|is_unique[colaboradores.nombre,id,{$id}]", 
            'profesion'   => 'required',
            'descripcion' => 'required',
            'imagen'      => 'permit_empty|is_image[imagen]|max_size[imagen,2048]',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'id_equipo'   => $this->request->getPost('equipos'),
            'id_cargo'    => $this->request->getPost('cargos'),
            'profesion'   => $this->request->getPost('profesion'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        $fileImagen = $this->request->getFile('imagen');
        if ($fileImagen && $fileImagen->isValid() && !$fileImagen->hasMoved()) {
            
            
            if (!empty($colaborador['imagen']) && file_exists(FCPATH . 'img' . $colaborador['imagen'])) {
                unlink(FCPATH . 'img' . $colaborador['imagen']);
            }
            
            $nombre_imagen = $fileImagen->getRandomName();
            $fileImagen->move(FCPATH . 'img', $nombre_imagen);
            
    
            $updateData['imagen'] = $nombre_imagen;
        }

    
        if ($this->colaboradorModel->update($id, $data)) {
            return redirect()->to('admin/colaboradores');
        } else {
            return redirect()->back()->withInput()->with('error', 'Ocurrió un error al actualizar');
        }
    }
    public function delete($id = null)
    {
        if($id === null)
        {
            return redirect()->to('admin/colaboradores');
        }
        $colaborador = $this->colaboradorModel->find($id);
        if(!$colaborador)
        {
            return redirect()->to('admin/colaboradores');

        }
        if($this->colaboradorModel->delete($id))
        {
            return redirect()->to('admin/colaboradores');
        }
    }

}