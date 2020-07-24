<?php

namespace App\Http\Controllers;

use App\FilmesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function ConsultaFilme(Request $request)
    {
        $filmes = DB::table('tbfilmes')
            ->join('tbcategoria', 'tbfilmes.idcategoria', 'tbcategoria.idcat')
            ->get();
        return view('filme.filme-consulta', compact('filmes'));
    }

    public function ConsultaPorFilme(Request $request)
    {
        $filmes = DB::table('tbfilmes')
            ->join('tbcategoria', 'tbfilmes.idcategoria', 'tbcategoria.idcat')
            ->where('filme', 'like', '%' . $request->txtFilme . '%')
            ->get();
        return view('filme.filme-consulta', compact('filmes'));
    }

    public function InserirFilme(Request $request)
    {
        DB::table('tbfilmes')->insert([
            ['filme' => $request->txtFilme, 'idCategoria' => $request->txtCategoria, 'anoLancamento' => $request->txtAno]
        ]);
        return redirect()->action('FilmesController@ConsultaFilme');
    }

    public function ExcluirFilme($id)
    {
        $filme = FilmesModel::where('idFilme', $id)->delete();
        return redirect()->action('FilmesController@ConsultaFilme');
    }

    public function ConsultaUpdate(Request $request, $id)
    {
        $filmes = DB::table('tbfilmes')
            ->join('tbcategoria', 'tbfilmes.idcategoria', 'tbcategoria.idcat')
            ->where('idFilme', 'like', '%' . $id . '%')
            ->get();
        return view('/filme.filme-update', compact('filmes'));
    }


    public function EditarFilme(Request $request)
    {
        $filme = DB::table('tbfilmes')
            ->where('idFilme', $request->id)
            ->update(['filme' => $request->txtFilme, 'idCategoria' => $request->txtCategoria, 'anoLancamento' => $request->txtAno]);
        return redirect()->action('FilmesController@ConsultaFilme');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
