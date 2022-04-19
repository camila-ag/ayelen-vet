<?php

namespace App\Http\Controllers;

use App\Models\Cirugia;
use App\Models\Consulta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hoy = Carbon::today();
        $consultas = Consulta::whereDate('fecha',$hoy)->orderBy('hora')->get();
        $cirugias = Cirugia::whereDate('fecha',$hoy)->get();

        return view('home',compact('consultas','cirugias'));
    }
}
