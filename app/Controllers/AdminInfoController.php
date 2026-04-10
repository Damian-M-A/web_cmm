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
    public function view($id = null)
    {
        if ($id === null)
        {
            return redirect()->to('admin/info_cmm');

        }
        $informacion = $this->infoModel->find($id);
        if (!$informacion)
        {
            return redirect()->to('admin/info_cmm');
        }
        $data = ['title' => 'Editando Informacion CMM', 'informacion' => $informacion];
        return view('cms_cmm/editar_info_cmm', $data);
    }
    public function edit($id = null)
    {
        helper('form');

        if ($id === null)
        {
            return redirect()->to('admin/info_cmm');

        }
        $reglas =
        [
            'texto' => 'required'
        ];
        if ($this->validate($reglas))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        
        }
        $data = $this->request->getPost();
        $this->infoModel->update($id,
            [
                'texto' => $data
            ]
        );
        return redirect()->to('admin/info-cmm');
        
    }
}