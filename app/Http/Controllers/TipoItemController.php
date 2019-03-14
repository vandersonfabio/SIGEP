<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoItem;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TipoItemFormRequest;
use DB;

class TipoItemController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $tiposEncontrados = DB::table('tipo_item')
                ->where('descricao', 'LIKE', $query.'%')
                ->where('isActive', 1)
                ->orderBy('id', 'asc')
                ->paginate(7);
            
            return view('armamento.tipo.index', [
                "listaTipos" => $tiposEncontrados, 
                "searchText" => $query
            ]);
        }

    }

    public function create(){
        return view("armamento.tipo.create");
    }

    public function store(TipoItemFormRequest $request){
        $tipo = new TipoItem;
        $tipo->descricao = $request->get('descricao');
        $tipo->save();

        return Redirect::to('armamento/tipo');
    }

    public function show($id){
        return view("armamento.tipo.show", 
            ["tipo" => TipoItem::findOrFail($id)]);
    }

    public function edit($id){
        return view("armamento.tipo.edit", 
            ["tipo" => TipoItem::findOrFail($id)]);
    }

    public function update(TipoItemFormRequest $request, $id){
        $tipo = TipoItem::findOrFail($id);
        $tipo->descricao = $request->get('descricao');
        $tipo->update();
        return Redirect::to('armamento/tipo');
    }

    public function destroy($id){
        $tipo = TipoItem::findOrFail($id);
        $tipo->isActive = 0;
        $tipo->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$tipo->delete();
        return Redirect::to('armamento/tipo');
    }
}