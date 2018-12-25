<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class filaModel extends Model
{
    protected $table = "fila";

    protected $fillable = ["sequencia"];

    public function getFila()
    {
        self::Organizar();
        return DB::table("fila_dia")->get();
    }

    public function voltar($id)
    {
        $this->Organizar();
        $principal = filaModel::where('id',$id)->first();
        $secundario = filaModel::where('sequencia',$principal->sequencia+1)->first();
        filaModel::where("id",$principal->id)->update(['sequencia' => $secundario->sequencia]);
        filaModel::where("id",$secundario->id)->update(['sequencia' => $principal->sequencia]);
    }

    public function subir($id)
    {
        $this->Organizar();
        $principal = filaModel::where('id',$id)->first();
        $secundario = filaModel::where('sequencia',$principal->sequencia-1)->first();
        filaModel::where("id",$principal->id)->update(['sequencia' => $secundario->sequencia]);
        filaModel::where("id",$secundario->id)->update(['sequencia' => $principal->sequencia]);
    }

    public function adiar($id)
    {
        filaModel::where("id",$id)->update(['sequencia'=>1]);
        $this->Organizar();
    }

    private function Organizar()
    {
        $result = DB::table("fila_dia")->get();
        if(count($result) == 0)
            return;
        $novo = array();
        foreach ($result as $item)
        {
            $aux = array();
            $aux["id"] = $item->id;
            $aux["sequencia"] = $item->sequencia;
            $novo[] = $aux;
        }
        $result = $novo;
        $result[0]["sequencia"] = $result[0]["sequencia"] > 1 ? 1:$result[0]["sequencia"];
        for($i = 0;$i<count($result);$i++)
        {
            for($b = 0;$b<count($result)-1;$b++)
            {
                if(($result[$b]["sequencia"]+1) != $result[$b+1]["sequencia"])
                {
                    if(($result[$b]["sequencia"]+1) == $result[$b+1]["sequencia"])
                        $result[$b]["sequencia"] = $this->MaxFila();
                    $result[$b+1]["sequencia"] = $result[$b]["sequencia"]+1;
                }
            }
        }
        $this->AtualizarFila($result);
    }

    private function AtualizarFila($sequencia)
    {
        foreach($sequencia as $item)
        {
            filaModel::where('id',$item['id'])->update(['sequencia'=> $item['sequencia']]);
        }
    }

    private function MaxFila()
    {
        return filaModel::max('sequencia');
    }
}
