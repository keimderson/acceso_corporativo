<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\visitantes;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class VisitantesController extends Controller
{
    public function visitantesregistrados()
    {
    $resultado = visitantes::all();
    return view('paginas.visistantesregistrados', compact('resultado'));
    }
    public function validavisitante(Request $request)

    {
        $request->validate([
            'cedula_v' => ['required', 'numeric', 'digits_between:1,8'],
        ]);

        $request->input('cedula_v');
        $resultado = $request->all('cedula_v');
        $cedula = $resultado['cedula_v'];
        session()->put('visitante', $cedula); 

        $consultae = DB::table('equipos')->select()->where('cedula', '=', $cedula)->where('estatus', '=', 'EN SEDE')->get();

         $consultav = DB::table('visitantes')->select()->where('fecha_reg', '=', Carbon::now()
            ->format('Y-m-d'))->where('cedula', '=', $resultado)->take(1)->get()->count();

         $consultavr = DB::table('visitantes')->select()->where('fecha_reg', '=', Carbon::now()
            ->format('Y-m-d'))->whereNotNull('hora_s')
            ->where('cedula', '=', $resultado)->take(1)->get()->count();

         $consultavrn = DB::table('visitantes')->select()->where('fecha_reg', '=', Carbon::now()
            ->format('Y-m-d'))->whereNull('hora_s')
            ->where('cedula', '=', $resultado)->take(1)->get()->count();
           
        if ($consultavrn == 1)
        {
            return view('paginas.visitantes_salida', compact('consultae'));
        }
        elseif ($consultavr == 1) 
        {
            return Redirect::to('visitantes');
        }
        else
        {
            switch ($consultav) 
            {
                case '1':
                     return Redirect::to('salida');
                break;
                default:
                    return Redirect::to('visitantes');
                break;
            }
        }

    }
    public function registravisita(Request $request)
    {
        $request->validate([
           // 'cedula'        => ['required', 'numeric', 'digits_between:1,8'],
            'nombre'        => ['required', 'string'],
            'razon_v'       => ['required', 'string'],
            'anunciar'      => ['required', 'string'],
            'sitio_r'       => ['required', 'string'],
            'observacion'   => ['required', 'string']
        ]);

       //$registro = visitantes::create($request->all());
        DB::table('visitantes')->insert([
            'cedula'        => session()->get('visitante'),
            'nombres'       => $request['nombre'],
            'razon_v'       => $request['razon_v'],
            'anunciar'      => $request['anunciar'],
            'sitio_r'       => $request['sitio_r'],
            'observacion'   => $request['observacion'],
            'estatus'       => 'EN SEDE',
            'created_at'    => Carbon::now()
        ]);

       return Redirect::to('inicio')->with('status', 'visitante '.session()->get('visitante').' registrado');
    }

    public function salidavisintante(Request $request)
    {
        $request->validate([
           // 'cedula'        => ['required', 'numeric', 'digits_between:1,8'],
            'sitio_r'       => ['required', 'string']
        ]);

       $cedula = session()->get('visitante');
       //$registro = visitantes::create($request->all());
        DB::table('visitantes')->where('cedula', '=', $cedula)->whereNull('hora_s')->update([
            'sitio_s'       => $request['sitio_r'],
            'estatus'       => 'AUSENTE',
            'updated_at'    => Carbon::now(),
            'hora_s'        => Carbon::now()
        ]);

       return Redirect::to('inicio')->with('status', 'salida ' . session()->get('visitante') . ' registrada');
    }
}