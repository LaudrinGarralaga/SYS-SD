<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permanente;

class PermanenteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $permanentes = Permanente::paginate(5);
        return view('permanente_list', compact('permanentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // indica inclusão
        $acao = 1;

        return view('permanente_form', compact('acao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $dados = $request->all();
        // insere os dados na tabela
        $permanente = Permanente::create($dados);
        if ($permanente) {
            return redirect()->route('permanentes.index')
                            ->with('status', $request->nome . ' Incluído!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // obtém os dados do registro a ser editado 
        $reg = Permanente::find($id);

        // indica ao form que será alteração
        $acao = 2;
        return view('permenente_form', compact('reg', 'acao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $reg = Permanente::find($id);
        $dados = $request->all();
        $alt = $reg->update($dados);
        if ($alt) {
            return redirect()->route('permanentes.index')
                            ->with('status', $request->nome . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $permanente = Permanente::find($id);
        if ($permanente->delete()) {
            return redirect()->route('permanentes.index')
                            ->with('status', $permanente->nome . ' Excluído!');
        }
    }

    public function pesq() {

        $permanentes = Permanente::paginate(5);
        return view('permanente_pesq', compact('permanentes'));
    }

    public function filtro(Request $request) {
        // obtém dados do form de pesquisa
        $nome = $request->nome;
        $dataInicial = $request->dataInicial;
        $cond = array();
        if (!empty($nome)) {
            array_push($cond, array('nome', 'like', '%' . $nome . '%'));
        }
        if (!empty($dataInicial)) {
            array_push($cond, array('dataInicial', '<=', $dataInicial));
        }
        $permanentes = Permanente::where($cond)
                        ->orderBy('nome')->paginate(5);
        return view('permanente_pesq', compact('permanentes'));
    }

}
