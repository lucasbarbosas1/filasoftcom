<?php

namespace App\Http\Controllers;

use App\Models\configuracaoModel;
use Illuminate\Http\Request;

class configController extends Controller
{
    protected $title = "Configuração";

    public function index()
    {
        $this->middleware("auth");
        $data["title"] = $this->title;
        $data["config"] = configuracaoModel::find(1);
        return view("pages/configuracao",$data);
    }

    public function store(Request $request)
    {
        $this->middleware("auth");
        $reqdados = $request->all();
        $config = configuracaoModel::find(1);
        $config->dbHost = $reqdados["host"];
        $config->dbUser = $reqdados["username"];
        $config->dbPass = $reqdados["password"];
        $config->dbPort = $reqdados["port"];
        $config->dbDatabase = $reqdados["database"];
        $config->save();
        return redirect(url("/"));
    }

    public function testeconexao(Request $request)
    {
        $data['host'] = $request->get("host");
        $data['username'] = $request->get("username");
        $data['port'] = $request->get("port");
        $data['password'] = $request->get("password");
        $data['database'] = $request->get("database");
        $data['retorno'] = "Não foi";
        try{
            $link = mysqli_connect($data['host'],$data['username'],$data['password'],$data['database'],$data['port']);
            $data['retorno'] = "Conexão Ok.";
            mysqli_close($link);
        }
        catch (Exception $ex)
        {
            $data['retorno'] = "Não foi possivel conectar";
        }
        echo json_encode($data);
    }

    public function getConfig()
    {
        $config = configuracaoModel::find(1);
        echo json_encode($config);
    }
}
