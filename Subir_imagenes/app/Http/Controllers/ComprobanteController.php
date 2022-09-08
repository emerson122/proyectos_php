<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comproban = Comprobante::paginate(5);
        return view('comprobante.index',compact('comproban'));
        // return view('comprobante.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comprobante.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       $comprobandor=$request->all();
       if($imagen = $request->file('comprobante')){
        $rutaGuardarImg = 'imagen/';
        $imagenProducto = date('YmdHis').".".$imagen->getClientOriginalExtension();
        $imagen->move($rutaGuardarImg,$imagenProducto);
        $comprobandor['comprobante'] = "$imagenProducto";
       }

       Comprobante::create($comprobandor);
       return redirect()->route('origen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
