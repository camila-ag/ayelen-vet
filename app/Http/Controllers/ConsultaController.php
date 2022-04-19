<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hoy = Carbon::today();
        $consultas = Consulta::whereDate('fecha','>=',$hoy)->orderBy('fecha')->orderBy('hora')->get();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        return view('consultas.agendar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => ['required','min:5','max:5'],
            'motivo' => 'required',
            'paciente' => 'required',
            'propietario' => 'required',
            'telefono' => ['required','numeric','min:8','max:8'],
        ]);

        $fecha = $request['fecha'];
        
        $hora = $request['hora'];

        $consultas = Consulta::where('fecha',$fecha)->get();

        $isthere = 0;
        foreach ($consultas as $c) {
            if($c->hora == $hora){
                $isthere = 1;
                print($c->hora.' | '.$hora.' | '.$isthere.'<br>');
            }
        }
        
        if ($isthere == 1) {
            return redirect()->route('consultas.create')
            ->with('error', 'La cita del dia '.date("d/m/Y", strtotime($fecha)).' a las '.$hora.' hrs no se encuentra disponible.');
        } else {
            Consulta::create($request->all());
            return redirect()->route('consultas.index')->with('success', 'Consulta ingresada correctamente.');
        }
    }

    public function filtrar(Request $request)
    {   
        $fecha = $request['fecha'];
        $filtro = Consulta::whereDate('fecha',$fecha)->orderBy('fecha')->orderBy('hora')->get();

        $a = count($filtro);

        if ($a > 0) {
            return redirect()->route('consultas.index')->with('filtro',$filtro);
        }else{
            return redirect()->route('consultas.index')
            ->with('error', 'No se encontraron resultados en la búsqueda.');
        }

    }

    public function edit(Consulta $consulta)
    {
        return view('consultas.editar', compact('consulta'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => ['required','min:5','max:5'],
            'motivo' => 'required',
            'paciente' => 'required',
            'propietario' => 'required',
            'telefono' => 'required',
        ]);

        $fecha = $request['fecha'];
        
        $hora = $request['hora'];

        $consultas = Consulta::where('fecha',$fecha)->get();

        $isthere = 0;
        foreach ($consultas as $c) {
            if($c->hora == $hora){
                $isthere = 1;
                print($c->hora.' | '.$hora.' | '.$isthere.'<br>');
            }
        }

        if ($isthere == 1) {
            return redirect()->route('consultas.edit',compact('consulta'))
            ->with('error', 'La cita del dia '.date("d/m/Y", strtotime($fecha)).' a las '.$hora.' hrs no se encuentra disponible.');
        } else {
            $consulta->update($request->all());
            return redirect()->route('consultas.index')->with('success', 'Consulta actualizada correctamente.');
        }
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta cancelada correctamente.');
    }

}
