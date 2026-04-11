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
    public function edit($id = null)
    {
        if($id === null)
        {
            return redirect()->to('admin/socios');

        }
        $socio = $this->sociosModel->find($id);
        
        if(!$socio)
        {
            return redirect()->to('admin/socios');

        }
        $data = ['title'=> 'Editando socio', 'socio' => $socio];
        return view('cms_cmm/editar_socio', $data);
    }
    public function update($id = null)
    {
        if($id === null)
        {
            return redirect()->to('admin/socios');
        }
        $socio = $this->sociosModel->find($id);
        if(!$socio)
        {
            return redirect()->to('admin/socios');

        } 
        
        $reglas = [
            'nombre' => "is_unique[partner.nombre, id,{$id}]",
            'imagen'      => 'permit_empty|is_image[imagen]|max_size[imagen,2048]',
        ];

        if (!$this->validate($reglas)) 
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data =
        [
            'nombre' => $this->request->getPost('nombre')
        ];
        $fileImagen = $this->request->getFile('imagen');
        if ($fileImagen && $fileImagen->isValid() && !$fileImagen->hasMoved()) {
            
            
            if (!empty($socio['imagen']) && file_exists(FCPATH . 'img' . $socio['imagen'])) {
                unlink(FCPATH . 'img' . $socio['imagen']);
            }
            
            $nombre_imagen = $fileImagen->getRandomName();
            $fileImagen->move(FCPATH . 'img', $nombre_imagen);
            
    
            $data['imagen'] = $nombre_imagen;
        }

    
        if ($this->sociosModel->update($id, $data)) {
            return redirect()->to('admin/socios');
        } else {
            return redirect()->back()->withInput()->with('error', 'Ocurrió un error al actualizar');
        }
 
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