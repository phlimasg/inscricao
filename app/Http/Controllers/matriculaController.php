<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\candidato;
use App\Model\inscricao;
use App\Model\matricula;

class matriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.matricular');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $m = new matricula();
        $m->inscricao_id = $id;
        $m->user = auth()->user()->email;   
        $m->save();
        return redirect()->back()->with('message','Matriculado com sucesso!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'search' => 'required',
            ]);
        $r = candidato::select('candidatos.NOME','inscricaos.id')
        ->where('NOME','like',$request->search.'%')
        ->join('inscricaos','candidatos.id', 'CANDIDATO_ID')     
        ->whereNotIn('inscricaos.id',matricula::select('inscricao_id')->get())
        ->where('PAGAMENTO',1)
        ->get();
        //dd($r);
        return view('admin.matricular', compact('r'));
        
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
