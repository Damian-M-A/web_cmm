<?php
namespace App\Controllers;
use App\Models\InfoCmmModel;

class QSController extends BaseController
{
    protected $info_cmm;
    public function __construct()
    {
        $this->info_cmm = new InfoCmmModel();
    }

    public function index()
    {
        helper('text');
        $quienes_somos = $this->info_cmm->find(1);
        $mision = $this->info_cmm->find(2);
        $vision = $this->info_cmm->find(3);
        $data = ['title'=> 'Quienes Somos', 'Quienes'=>$quienes_somos,'mision'=>$mision,'vision'=>$vision];
        return view('quienes-somos.php', $data);
    }
}