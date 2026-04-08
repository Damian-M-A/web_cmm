<?php
namespace App\Controllers;

use App\Models\NoticiaModel;

class ProyectosController extends BaseController
{
    protected $proyectosModel;

    public function __construct()
    {
        $this->proyectosModel = new NoticiaModel();  
    }

    public function index()
    {
        helper('text');
        
        
        $proyectos = $this->proyectosModel->where('id_categoria',2)->orderBy('id', 'DESC')->paginate(12,'group1');
        $data = ['title'=>'Nuestros Proyectos', 'proyectos' => $proyectos, 'pager'=> $this->proyectosModel->pager];
        return view('proyectos', $data);
   
    }
    public function view($id)
    {
        $proyecto = $this->proyectosModel->where('id_categoria',2)->find($id);
        if (!$proyecto) 
        {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("El proyecto que busca no existe.");
        }
        $data = ['title'=> $proyecto['titulo'], 'proyecto'=>$proyecto];
        return view('proyectos_view', $data);
    }
}