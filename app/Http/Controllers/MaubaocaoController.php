<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;


class MaubaocaoController extends Controller
{
    
    public $documents ;

    public function __construct()
    {
        $this->documents = new Documents;
        $this->middleware('login');
    }

    public function index(){
        $data = $this->documents->paginate(8);
        return view('maubaocao.index',['baocao'=>$data]);
    }

    public function file_view($name){
        $name =substr($name,0,strpos($name,'.docx'));
        return view('maubaocao.viewpdf',['name'=>$name]);
    }

    public function word_export($id){
        $template = new TemplateProcessor('word/'.$id);
        $template->saveAs('maubaocao'.'.docx');
        return response()->download('maubaocao'.'.docx')->deleteFileAfterSend(true);
    }   

    

    public function store(Request $request ){
        // đọc ghi file pdf
        // $domPdfPath = base_path( 'vendor/dompdf/dompdf');
        //     \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        //     \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $file = $request->file_temp;
        $pdf = $request->file_pdf;
        // $phpWord =IOFactory::createReader('Word2007')->load($request->file('file_temp')->path());
        // $objWriter = IOFactory::createWriter($phpWord,'PDF');
        // $objWriter->save('PDF/'.substr($file->getClientOriginalName(),0,strpos($file->getClientOriginalName(),'.docx')).'.pdf');
        $document = new Documents;
        $document->tieude=$request->tieude;
        $document->noidung = $request->noidung;
        $document->name_file = $file->getClientOriginalName();
        $document->save();
        $file->move('word',$file->getClientOriginalName());
        $pdf->move('PDF',$pdf->getClientOriginalName());
        return redirect('/maubaocao');
      
    }

    public function search(Request $request){
        if($request->ajax()){
            $baocao = $this->documents->paginate(8);
            if($request->text !=''){
                $text = $request->text;
                $baocao = $this->documents->where(function($res) use($text){
                    $res->where('tieude','like','%'.$text.'%')
                        ->orwhere('noidung','like','%'.$text.'%');
                })->paginate(8);
            }
            return view('maubaocao.list_maubaocao',compact('baocao'))->render();
        }
    }
}
