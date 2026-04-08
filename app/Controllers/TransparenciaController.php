<?php
namespace App\Controllers;

use App\Models\NoticiaModel;

class TransparenciaController extends BaseController
{
    protected $transparenciaModel;

    public function __construct()
    {
        $this->transparenciaModel = new NoticiaModel();  
    }

    public function index()
    {
        helper('text');
        $transparencia = $this->transparenciaModel->where('id_categoria',3)->orderBy('id', 'DESC')->findAll();
        $data = ['title'=>'Transparencia CMM', 'transparencia' => $transparencia];
        return view('transparencia', $data);
   
    }
    public function view($id)
    {
        $transparencia = $this->transparenciaModel->where('id_categoria',3)->find($id);
        if (!$transparencia) 
        {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("La información que busca no existe.");
        }
        $data = ['title'=> $transparencia['titulo'], 'transparencia'=>$transparencia];
        return view('transparencia_view', $data);
    }
}