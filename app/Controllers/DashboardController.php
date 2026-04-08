<?php
namespace App\Controllers;



class DashboardController extends BaseController
{


    public function index()
    {
        helper('auth');
        $data = ['title' => 'Dashboard CMM'];
        return view('cms_cmm/home', $data);
    }
}