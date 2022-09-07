<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposController extends Controller
{
    public function validaequipo(Request $request)
    {
    	$request->validate([
    		'cedula'	=> ['required', 'numeric', 'digits_between:1,8']
    	]);
    	$cedula = $request['cedula'];
    	session()->put('cedula_e', $cedula);

    	$consultae = DB::table('visitantes')->select()->where('cedula', '=', $cedula)->whereNull('hora_s')->take(1)->get()->count();
        $consultav = DB::table('visitantes')->select()->where('cedula', '=', $cedula)->get();

            foreach ($consultav as $consulta) {
                $nomape = $consulta->nombres;
                session()->put('nom', $nomape);
            }


    	switch ($consultae)
    	{
    		case '1':
    			//return view('paginas.registraequipo', compact('consultav'));
                return Redirect::to('registraequipo');
    		break;
    		default:
    			return Redirect::to('visitantes')->with('status', 'El visitante: '. session()->get('cedula_e') . '  no posee una entrada registrada');
    	}
    }

    public function registraequipo(Request $request)
    {
    	$request->validate([
    		'tipo'			=> ['required'],
    		'marca'			=> ['required'],
    		'modelo'		=> ['required'],
            'razon'         => ['required'],
    		'sitio_r'		=> ['required'],
    		'observacion'	=> ['required']
    	]);

    	DB::table('equipos')->insert([
    		'cedula'		=> session()->get('cedula_e'),
            'nombres'       => session()->get('nom'),
    		'equipo_des'	=> $request['tipo'],
    		'marca'			=> $request['marca'],
    		'modelo'		=> $request['modelo'],
            'razon'         => $request['razon'],
    		'sitio_r'		=> $request['sitio_r'],
    		'observacion'	=> $request['observacion'],
            'estatus'       => 'EN SEDE'
    	]);

    	return Redirect::to('equipo')->with('status', 'Equipo registrado con la cedula: '.session()->get('cedula_e'));
    }

    public function consultatable()
    {
    	$consultae = DB::table('equipos')->select()->where('estatus', '=', 'EN SEDE')->get();
 		

 		return view('paginas.dashboard', compact('consultae'));
    }

    public function equiposalida(Request $request)
    {
        $idequipo = $request['id'];
        $cedula = $request['cedula'];
        //return $idequipo;

        $salidaequipo = DB::table('equipos')->where('equipos_id', '=', $idequipo)->update([
            'estatus' => 'AUSENTE',
            'fecha_salida' => Carbon::now(),
            'hora_salida' => Carbon::now()
            ]);
                
        $consultae = DB::table('equipos')->select()->where('cedula', '=', $cedula)->where('estatus', '=', 'EN SEDE')->get();
        
        return view('paginas.visitantes_salida', compact('consultae'));
    }

        public function equiposalidadash(Request $request)
    {
        $idequipo = $request['id'];
        $cedula = $request['cedula'];
        //return $idequipo;

        $salidaequipo = DB::table('equipos')->where('equipos_id', '=', $idequipo)->update([
            'estatus' => 'AUSENTE',
            'fecha_salida' => Carbon::now(),
            'hora_salida' => Carbon::now()
            ]);
                
        $consultae = DB::table('equipos')->select()->where('estatus', '=', 'EN SEDE')->get();
        
        return view('paginas.dashboard', compact('consultae'));
        //return $consultae;
    }
}
