<?php
namespace App\Controllers;



class AdminNoticiasController extends BaseController
{


    public function index()
    {
        helper('auth');
        helper('text');
        $db = \Config\Database::connect();
        $query = $db->table('noticias');
        $query->select('noticias.*, categorias.nombre as categorias');
        $query->join('categorias', 'noticias.id_categoria = categorias.id');
        $query->orderBy('noticias.subido_el', 'DESC');
        $noticias = $query->get()->getResultArray();
        $data = ['title' => 'Administrar noticias', 'noticias' =>$noticias];
        return view('cms_cmm/admin_noticias', $data);
    }
    public function new()
    {
        helper(['auth', 'text']);
        $data = ['title'=> 'Nueva Noticia'];
        return view( 'cms_cmm/noticias_form', $data);

    }
}