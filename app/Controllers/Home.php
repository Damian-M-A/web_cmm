<?php

namespace App\Controllers;
use App\Models\NoticiaModel;
use App\Models\PartnerModel;

class Home extends BaseController
{
    protected $noticiasModel;
    protected $partnerModel;
    public function __construct()
    {
        $this->noticiasModel = new NoticiaModel();
        $this->partnerModel = new PartnerModel();
    }
    public function index()
    {
        helper('text');
        $noticias = $this->noticiasModel->where('id_categoria',1)->orderBy('id','DESC')->findAll(3);
        $partners = $this->partnerModel->findAll();
        $data = ['title'=> 'Centro Mario Molina - Investigación & Desarrollo', 'noticias' => $noticias, 'partners' => $partners];
        return view('main',$data);
    }
}
