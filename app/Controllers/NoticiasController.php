<?php
namespace App\Controllers;

use App\Models\NoticiaModel;

class NoticiasController extends BaseController
{
    protected $noticiasModel;

    public function __construct()
    {
        $this->noticiasModel = new NoticiaModel();  
    }

    public function index()
    {
        helper('text');
        $noticias = $this->noticiasModel->where('id_categoria',1)->orderBy('id', 'DESC')->paginate(12, 'group1');
        $data = ['title'=>'Ultimas Noticias', 'noticias' => $noticias, 'pager'=>$this->noticiasModel->pager];
        return view('noticias', $data);
   
    }
    public function view($id)
    {
        $noticia = $this->noticiasModel->where('id_categoria',1)->find($id);
        if (!$noticia) 
        {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("La noticia que busca no existe.");
        }
        $data = ['title'=> $noticia['titulo'], 'noticia'=>$noticia];
        return view('noticias_view', $data);
    }
}