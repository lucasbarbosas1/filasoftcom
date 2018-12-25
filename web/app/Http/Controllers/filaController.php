<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filaController extends Controller
{
    //

    public function getStatus()
    {
        $model = \App\Models\configuracaoModel::find(1);
        return json_encode(["Status"=>$model->filaAtiva]);
    }

    public function setStatus(Request $request)
    {
        $status = $request->post("Form");
        $model = \App\Models\configuracaoModel::find(1);
        $model->filaAtiva = $status;
        $model->save();
        return "";
    }

    public function deletar($id)
    {
        \App\Models\filaModel::destroy($id);
        echo json_encode(array("Msg"=>"Alterado com sucesso"));
    }

    public function voltar($id)
    {
        $fila = new \App\Models\filaModel();
        $fila->voltar($id);
    }

    public function subir($id)
    {
        $fila = new \App\Models\filaModel();
        $fila->subir($id);
    }

    public function adiar($id)
    {
        $fila = new  \App\Models\filaModel();
        $fila->adiar($id);
    }
}
