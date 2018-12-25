<?php

namespace App\Http\Controllers;

use App\Models\filaModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $title = "Home";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fila = new filaModel();
        $data["title"] = $this->title;
        $data["atual"] = filaModel::where("sequencia",0)->first();
        $data["fila"] = $fila->getFila();
        return view('pages/home',$data);
    }
}
