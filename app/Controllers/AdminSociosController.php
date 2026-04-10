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
}