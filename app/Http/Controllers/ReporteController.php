<?php
/**
* 
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Reporte_venta;


class ReporteController extends Controller
{
	
	public function home(){

		$reporte=DB::table('reportes_ventas')->get();
		// $reporte=[];
		//dd($reporte);
		//dd($reporte);
		
		return view('Reporte.VentasporMes',["reportes"=>$reporte]);		

	}
	public function generar(Request $request){
		$fecha_ini=$request->fecha_ini;
		$fecha_fin=$request->fecha_fin;

		$fechas = collect(["f1"=>$fecha_ini,"f2"=> $fecha_fin]);
		
		
		//dd($fechas);

		$reporte=DB::table('reportes_ventas')->select('producto', DB::raw('count(producto) as cantidad'))->where('fecha','>=',$fecha_ini)->where('fecha','<=',$fecha_fin)->groupBy('producto')->get();
		
		// dd($reporte);
		
		
			
		//return redirect("/Reporte");
		return view('Reporte.VentasporMes',["reportes"=>$reporte])->with('fecha1', $fecha_ini)->with('fecha2', $fecha_fin);	
	

	}
}