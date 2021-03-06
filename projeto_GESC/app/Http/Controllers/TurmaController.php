<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;

class TurmaController extends Controller
{
    public function listaTurma(){

    //  $cras = DB::select('select * from cras');
        //$turma = turma::where('statusTuma', '=', 1)->firstOrFail();
      //  $turma = DB::select('select * from turma where statusTurma = 1');
        $profTurma = DB::select('select Nome from usuario join turma on usuario.id = turma.idUsuario;');



   $turma = DB::select('select idturma, grupoconvivencia, statusturma, turno, idusuario, usuario.nome from usuario, turma
    where usuario.id = turma.idusuario');

        // $turnoTurma = DB::select('');
        $educador = DB::select('select * from usuario where tipoUsuario = 2');

        $teste = DB::select('select * from usuario where tipoUsuario = 2');

       // echo($teste->idUsuario);

        return view('turma.listagemTurma')->with('turma', $turma)->with('educador', $educador);
    }

    public function adiciona(Request $request){
    /*$nome = Request::input('nome');
    $telefone = Request::input('telefone');

    DB::insert('insert into cras(nomeCras, telefone) values(?, ?)',
    array($nome, $telefone));*/

    /*  $grupoConvi = Request::input('GrupoConvivencia');
    $turno = Request::input('turno');
    $status = Request::input('statusTurma');
    $educ = Request::input('educador');
*/
    /* DB::insert('insert into Turma(GrupoConvivencia, Turno, statusTurma, idUsuario,) values(?, ?, ?, ?)',
    array($grupoConvi, $turno, $status, $educ));*/
        $turma = new Turma($request->all());
        $turma->statusturma = 1;
        $turma->save();
        // Turma::create($request->all());

        //dd($request->all());
        toastr()->success('Turma '.$request->grupoconvivencia.' adicionada com sucesso!');
        return redirect()->action('TurmaController@listaTurma');
    }

    public function remover(Request $request){
        $turmaid = Turma::find($request->idturma);
        $turmaid->delete();

        return back();
    }

    public function editar(Request $request){
        $turma = Turma::find($request->idturma);
      
        $turma->update($request->all());
        
        toastr()->success('Turma '.$request->grupoconvivencia.' atualizada com sucesso!');
        return redirect()->action('TurmaController@listaTurma');
    }

    public function inativar(Request $request){
        $turma = Turma::find($request->idturma);
        $turma->statusturma ='0';
        $turma->update($request->all());
      //  return  $turma = Turma::find($request->idturma);
        //return $turma = Turma::find($turma);




        toastr()->success('Turma inativada com sucesso!');
         return redirect()->action('TurmaController@listaTurma');
    }

    public function ativar(Request $request){
         $turma = Turma::find($request->idturma);
       // return $turma = Turma::find($turma);
        $turma->statusturma ='1';
      //  return Turma::find($turma);

        $turma->update($request->all());
    /*  $cras = Cras::find($request->idcras);
      $cras->statuscras='1';
      $cras->update($request->all());
      return redirect()->action('CrasController@listaCras');*/
      toastr()->success('Turma ativada com sucesso!');
        return redirect()->action('TurmaController@listaTurma');
    }

       
}
