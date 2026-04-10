<?php
namespace App\Controllers;

use App\Models\InfoCmmModel;

class AdminInfoController extends BaseController
{
    protected $infoModel;

    public function __construct()
    {
        $this->infoModel = new InfoCmmModel();
    }

    public function index()
    {
        helper('text');
        $db = \Config\Database::connect();
        $query = $db->table('info_cmm');
        $query->select('info_cmm.*, tipo_info.nombre as tipo');
        $query->join('tipo_info', 'info_cmm.id_tipo = tipo_info.id');
        $info_cmm = $query->get()->getResultArray();
        $data = ['title' => 'Administrar noticias', 'informacion' =>$info_cmm];
        return view('cms_cmm/admin_info', $data);
    }
}