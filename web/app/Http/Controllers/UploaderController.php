<?php

namespace App\Http\Controllers;

use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use ZanySoft\Zip\Zip;

class UploaderController extends Controller
{
    //
    private $path;
    protected $title = "Atualizador";

    public function __construct()
    {
        $this->path = public_path()."/update/files/";
    }

    public function index()
    {
        $this->middleware("auth");
        $data["title"] = $this->title;
        return view("pages/atualizador",$data);
    }

    private function limparPasta()
    {

    }

    public function  teste()
    {
        /*
            TODO: - Trocar a rotina do Atualizador, para copiar o arquivo XML para o local correto e não zipar mais os arquivos.
                  - Deixar o nome do arquivo original.

        */
        //Variavel com o INFO dos arquivos
        $all = array();
        $file = Input::file('photo');

        $file->move($this->path,"update.zip");
        //Biblioteca para descompactar ZIP
        $zip = Zip::open($this->path."/update.zip");
        $zip->extract($this->path."/temp");
        $zip->close();
        //Ler todos os arquivos da pasta para ser gerado a INFO
        $dir = dir($this->path."/temp");
        while($arquivo = $dir->read())
        {

            if( $arquivo=="." || $arquivo=="..") continue;
            $aux = array();
            $aux["Hash"] = md5_file($this->path."/temp/".$arquivo);
            $aux["Path"] = $arquivo;
            $aux["Size"] = filesize($this->path."/temp/".$arquivo);

            $all[] = $aux;
            $destino = str_replace(" ","_",$arquivo);
            $zip = new Zipper();
            $zip->make($this->path."/".$destino.".zip","zip");
            $zip->add($this->path."/temp/".$arquivo)->close();
            unlink($this->path."/temp/".$arquivo);
        }
        $dir->close();

        $file = fopen(public_path()."/update/UpdaterHash.json","a");
        fwrite($file,json_encode($all));
        fclose($file);
        rmdir($this->path."/temp");
        unlink($this->path."/update.zip");


        return redirect("/atualizador")->with("Status","Atualizado com sucesso.");
    }
}