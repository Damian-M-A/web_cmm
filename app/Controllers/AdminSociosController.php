<?php
namespace App\Controllers;

use App\Models\PartnerModel;

class AdminSociosController extends BaseController
{
    protected $sociosModel;

    public function __construct()
    {
        $this->sociosModel = new PartnerModel();

    }

    public function index()
    {
        $socios = $this->sociosModel->findAll();
        $data = ['title' => 'Administrar socios', 'socios' => $socios];
        return view('cms_cmm/admin_socios', $data);
    }
    public function new()
    {
        $data = ['title' => 'Nuevo socio'];
        return view ('cms_cmm/nuevo_socio',$data);
    }
    public function save ()
    {
        helper('form');
        $reglas = [
            'nombre' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]'
        ];
        if(!$this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = $this->request->getPost('nombre');
        $imagen = $this->request->getFile('imagen');
        

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombre_imagen = $imagen->getRandomName();
            $imagen->move('img', $nombre_imagen);
        }
        $this->sociosModel->insert
        (
          [
            'nombre'=> $data,
            'imagen' => $nombre_imagen,
            'activo' =>true
          ]  
        );
        return redirect()->to('admin/socios');
    }
    public function delete($id = null)
    {
        if($id === null)
        {
            return redirect()->to('admin/socios');
        }
        if($this->sociosModel->delete($id))
        {
            return redirect()->to('admin/socios');
        }
    }
}