<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dia;

class DiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = Dia::paginate(5);
        return view('dia_list', compact('dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // indica inclusão
        $acao = 1;
     
        return view('dia_form', compact('acao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        // insere os dados na tabela
        $dia = Dia::create($dados);
        if ($dia) {
            return redirect()->route('dias.index')
                            ->with('status', $request->nome . ' Incluído!');
        }
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
        // obtém os dados do registro a ser editado 
        $reg = Dia::find($id);
        
        // indica ao form que será alteração
        $acao = 2;
        return view('dia_form', compact('reg', 'acao'));
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
        $reg = Dia::find($id);
        $dados = $request->all();
        $alt = $reg->update($dados);
        if ($alt) {
            return redirect()->route('dias.index')
                            ->with('status', $request->nome . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dia = Dia::find($id);
        if ($dia->delete()) {
            return redirect()->route('dias.index')
                            ->with('status', $dia->nome . ' Excluído!');
        }
    }
    public function pesq() {
        
        $dias = Dia::paginate(5);
        return view('dia_pesq', compact('dias'));
    }
    public function filtro(Request $request) {
        // obtém dados do form de pesquisa
        $nome = $request->nome;
        $data = $request->data;
        $cond = array();
        if (!empty($nome)) {
            array_push($cond, array('nome', 'like', '%' . $nome . '%'));
        }
        if (!empty($data)) {
            array_push($cond, array('data', '<=', $data));
        }
        $dias = Dia::where($cond)
                        ->orderBy('nome')->paginate(5);
        return view('dia_pesq', compact('dias'));
    }
}
