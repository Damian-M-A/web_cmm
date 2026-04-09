<?php
namespace App\Controllers;

use App\Models\CategoriaModel;

class AdminCategoriasController extends BaseController
{
    protected $categoriasModel;
    public function __construct()
    {
        $this->categoriasModel = new CategoriaModel();
    }
    public function index()
    {
        $categorias = $this->categoriasModel->findAll();
        $data = ['title'=> 'Administrar categorias', 'categorias' => $categorias];
        return view('cms_cmm/admin_categorias', $data);
    }
    public function new()
    {
        $data = ['title'=> 'Añadiendo nueva categoria'];
        return view('cms_cmm/nueva_categoria', $data);
    }
    public function save()
    {
        helper('form');
        $reglas = [
            'nombre' => 'required|is_unique[categorias.nombre]'
        ];
        if(!$this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = $this->request->getPost('nombre');
        $this->categoriasModel->insert
        (
          [
            'nombre'=> $data
          ]  
        );
        return redirect()->to('admin/categorias');
    }
    public function edit($id = null)
    {
        if($id === null)
        {
            return redirect()->back();
        }
        $categoria = $this->categoriasModel->find($id);
        $data = ['title'=> 'Actualizando categoria', 'categorias'=> $categoria];
        return view('cms_cmm/actualizar_categoria', $data);


    }
    public function update($id = null)
    {
        helper('form');

        if($id === null)
        {
            return redirect()->to('admin/categorias');
        }
        $reglas = [
            'nombre' => 'required|is_unique[categorias.nombre]'
        ];
        if(!$this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $categoria = $this->request->getPost('nombre');

        $this->categoriasModel->update($id,['nombre'=> $categoria]);
        return redirect()->to('admin/categorias');
        

    }
}