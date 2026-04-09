<?php
namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\NoticiaModel;


class AdminNoticiasController extends BaseController
{
    protected $noticiasModel;
    protected $categoriasModel;

    public function __construct()
    {
        $this->noticiasModel = new NoticiaModel();
        $this->categoriasModel = new CategoriaModel();  
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
        $categorias = $this->categoriasModel->findAll();
        $data = ['title'=> 'Nueva Noticia', 'categorias' => $categorias];
        return view( 'cms_cmm/noticias_form', $data);

    }
    public function save()
    {
        helper(['form', 'date']); 

        
        $reglas = [
            'titulo'        => 'required|min_length[5]',
            'texto'         => 'required',
            'tipo_articulo' => 'required|is_not_unique[categorias.id]', 
            'imagen'        => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
            'archivo_pdf' => 'permit_empty|ext_in[archivo_pdf,pdf]|max_size[archivo_pdf,10240]',
        ];

        if (!$this->validate($reglas)) {
           
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagen = $this->request->getFile('imagen');
        $pdf    = $this->request->getFile('archivo_pdf');
        $postData = $this->request->getPost();
        
        $nombre_imagen = null;
        $nombre_pdf    = null;

        
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombre_imagen = $imagen->getRandomName();
            // Asegúrate de que la carpeta 'img' exista en /public/
            $imagen->move('img', $nombre_imagen);
        }

      
        if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {
            $nombre_pdf = $pdf->getRandomName();
            
            $pdf->move('files', $nombre_pdf);
        }

        
        $this->noticiasModel->insert([
            'titulo'       => $postData['titulo'],
            'contenido'    => $postData['texto'],
            'id_categoria' => $postData['tipo_articulo'], 
            'subido_por'   => auth()->id(),           
            'subido_el'    => date('Y-m-d H:i:s'),    
            'activo'       => true,                      
            'estado'       => 'otro', 
            'imagen'       => $nombre_imagen,
            'adjunto'      => $nombre_pdf
        ]);

        return redirect()->to('admin/noticias');
    }
    public function delete($id = null)
    {
        if($id === null){
            return redirect()->back();
        }
        if($this->noticiasModel->delete($id))
        {
            return redirect('admin/noticias');
        }
    }
    public function edit($id = null)
    {
        $id = (int)$id;
        if($id === null)
        {
            return redirect()->back();
        }
        $noticias = $this->noticiasModel->find($id);
        $categorias = $this->categoriasModel->findAll();
        $data = ['title'=> 'Editando noticia', 'noticias' =>$noticias, 'categorias'=>$categorias];
        return view('cms_cmm/editar_noticia', $data);
    }
 public function update($id = null)
    {
        helper(['form', 'url']);

        $id = (int)$id;
        $noticiaActual = $this->noticiasModel->find($id);

        if (!$noticiaActual) {
            return redirect()->to('admin/noticias')->with('error', 'Noticia no encontrada.');
        }

        
        $reglas = [
            'titulo'        => 'required|min_length[5]|max_length[100]',
            'texto'         => 'required',
            'tipo_articulo' => 'required|is_not_unique[categorias.id]',
            'imagen'        => 'permit_empty|is_image[imagen]|max_size[imagen,2048]',
            'archivo_pdf'   => 'permit_empty|ext_in[archivo_pdf,pdf]|max_size[archivo_pdf,10240]',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        
        $data = [
            'id_categoria' => $this->request->getPost('tipo_articulo'),
            'titulo'       => $this->request->getPost('titulo'),
            'contenido'    => $this->request->getPost('texto'),
            
        ];

        
        $fileImagen = $this->request->getFile('imagen');
        if ($fileImagen && $fileImagen->isValid() && !$fileImagen->hasMoved()) {
            
            if (!empty($noticiaActual['imagen']) && file_exists(FCPATH . 'img' . $noticiaActual['imagen'])) {
                unlink(FCPATH . 'img' . $noticiaActual['imagen']);
            }
            
            $nombre_imagen= $fileImagen->getRandomName();
            $fileImagen->move(FCPATH . 'img', $nombre_imagen);
            $data['imagen'] = $nombre_imagen;
        }

        
        $filePdf = $this->request->getFile('archivo_pdf');
        if ($filePdf && $filePdf->isValid() && !$filePdf->hasMoved()) {
            if (!empty($noticiaActual['adjunto']) && file_exists(FCPATH . 'files' . $noticiaActual['adjunto'])) {
                unlink(FCPATH . 'files' . $noticiaActual['adjunto']);
            }

            $nombre_pdf = $filePdf->getRandomName();
            $filePdf->move(FCPATH . 'files', $nombre_pdf);
            $data['adjunto'] = $nombre_pdf;
        }

       
        if ($this->noticiasModel->update($id, $data)) {
            return redirect()->to('admin/noticias');
        } else {
            return redirect()->back()->withInput()->with('error', 'No se pudo actualizar la noticia.');
        }
    }
}