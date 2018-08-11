<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\SetTimezone;
use App\Http\Controllers\Controller;

use App\Vaga;

class VagasController extends Controller {

    public function listaVagas(){
        $vaga = vaga::all();
        $idadeMin=[];
        $idadeMax=[];
        $anoLista=[];
        $i=0;
        $ano = date('Y');
        foreach($vaga as $c){
            $idadeMin[$i]=$c->idademin;
            $i++;
        }
        $i=0;
        foreach($vaga as $b){
            $idadeMax[$i]=$b->idademax;
            $i++;
        }
        $i=0;
        foreach($vaga as $a){
            $anoLista[$i]=$a->anovaga;
            $i++;
        }
        $listaIdadeMin = implode('|', $idadeMin);
        $listaIdadeMax = implode('|', $idadeMax);
        $listaAno = implode('|', $anoLista);
        return view('vaga.vagas')->with('vaga', $vaga)->with('ano', $ano)->with('listaAno', $listaAno)->with('listaIdadeMax', $listaIdadeMax)->with('listaIdadeMin', $listaIdadeMin);
    }

    public function adiciona(Request $request){
        $vaga = new Vaga(
        $request->all());
        $vaga->save();
        return redirect()->action('VagasController@listaVagas');
    }

    public function edita(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->update($request->all());
        return redirect()->action('VagasController@listaVagas');
    }

    public function exclui(Request $request){
        $vaga = Vaga::find($request->idvaga);
        $vaga->delete();
        return redirect()->action('VagasController@listaVagas');
    }

    public function consulta($ano){
        $teste = 'oi';
        return $teste;
    } 


}