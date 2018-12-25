<?php

namespace App\Http\Controllers;

use App\Models\funcionarioModel;
use Illuminate\Http\Request;

class colaboradorController extends Controller
{
    protected $title = "Colaboradores";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data["title"] = $this->title;
        $func = new funcionarioModel();
        $data["lista"] = $func->get();
        return view("pages/colaborador",$data);
    }

}
