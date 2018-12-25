<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    protected $title = "Usuários";

    public function index()
    {
        $data["title"] = $this->title;
        $data["lista"] = User::all();
        return view("pages/users",$data);
    }

    public function store(Request $request)
    {
        $campos = $request->all();
        //dd($campos);
        $user = new User();
        $user->login = $campos['login'];
        $user->password = Hash::make($campos['password']);
        $user->senha_desk = md5($campos['password']);
        $user->tipo = $campos['tipo'];
        $user->remember_token = str_random("10");
        $user->save();
        return redirect("/users");
    }

    public function desativar(Request $request)
    {
        $user = User::find($request->get("Codigo"));
        $user->ativo = $request->get("Desativado") == 1 ? 0:1;
        $user->save();
        return json_encode(array("msg"=>$request->get("Desativado")));
    }

}
