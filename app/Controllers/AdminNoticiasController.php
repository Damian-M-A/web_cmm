<?php
namespace App\Controllers;

use App\Models\NoticiaModel;


class AdminNoticiasController extends BaseController
{
    protected $noticiasModel;

    public function __construct()
    {
        $this->noticiasModel = new NoticiaModel();  
    }

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
        if(!auth()->user()->can('noticias.create'))
        {
            return redirect()->back();
        }

        helper(['auth', 'text']);
        $data = ['title'=> 'Nueva Noticia'];
        return view( 'cms_cmm/noticias_form', $data);

    }
    public function save()
    {
        helper(['form', 'date']); 

        
        $reglas = [
            'titulo'    => 'required|min_length[5]',
            'texto'     => 'required',
            'categoria' => 'required|is_not_unique[categorias.id]', 
            'imagen'    => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
            'archivo_pdf' => 'ext_in[archivo_pdf,pdf]|max_size[archivo_pdf,5120]',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Captura de archivos y datos
        $imagen = $this->request->getFile('imagen');
        $pdf    = $this->request->getFile('archivo_pdf');
        
        // Simplificamos la captura del POST
        $postData = $this->request->getPost();
        
       
        $nombre_imagen = null;
        $nombre_pdf    = null;

        
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombre_imagen = $imagen->getRandomName();
            $imagen->move(FCPATH . 'img', $nombre_imagen);
        }

        // 4. Procesar PDF (Opcional)
        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            $nombre_pdf = $pdf->getRandomName();
            $pdf->move(FCPATH . 'files', $nombre_pdf);
        }

        // 5. Inserción en la base de datos
        $this->noticiasModel->insert([
            'titulo'       => $postData['titulo'],
            'contenido'    => $postData['texto'],
            'id_categoria' => $postData['categoria'], 
            'subido_por'   => auth()->id(),           
            'subido_el'    => date('Y-m-d H:i:s'),    
            'activo'       => true,                      
            'estado'       => 'otro',
            'imagen'       => $nombre_imagen,
            'adjunto'      => $nombre_pdf
        ]);

        return redirect()->to('admin/noticias');
    }
}