<?php

namespace App\Http\Controllers;

use App\CategoriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function ConsultaCategorias()
    {
        $categorias = CategoriaModel::all();
        return view('categoria.categoria-consulta', compact('categorias'));
    }


    public function ConsultaPorCategoria(Request $request)
    {
        $categorias = CategoriaModel::where('categoria', 'like', '%' . $request->txtCategoria . '%')->get();
        return view('categoria.categoria-consulta', compact('categorias'));
    }

    public function InserirCategoria(Request $request)
    {
        DB::table('tbcategoria')->insert([
            ['categoria' => $request->categoriaTxt],
        ]);
        return redirect()->action('CategoriaController@ConsultaCategorias');
    }

    public function ExcluirCategoria($id)
    {
        $categorias = CategoriaModel::where('idCat',$id)->delete();
        return redirect()->action('CategoriaController@ConsultaCategorias');
    }

    public function ConsultaUpdate(Request $request, $id)
    {
        $categorias = CategoriaModel::where('idCat', 'like', '%' . $request->id . '%')->get();
        return view('categoria.categoria-update', compact('categorias'));
    }
    
    public function EditarCategoria(Request $request)
    {
        $categoria = DB::table('tbcategoria')
              ->where('idCat', $request->id)
              ->update(['categoria' => $request->categoriaTxt],);
              return redirect()->action('CategoriaController@ConsultaCategorias');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
