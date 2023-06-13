<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColecaoModel;
use Illuminate\Support\Facades\DB;

class ColecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allColection()
    {
        //
        $co=ColecaoModel::all();
        return  $co;
    }

    public function index()
    {
        return view('admin.colecoe',['colecoes'=>$this->allColection()]);
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
        $c=new ColecaoModel();
        $c->descricao=$this->clear($request->descricao);
        $c->save();
        return view('admin.colecoe',['colecoes'=>$this->allColection(),'sms'=>'Coleção registada com sucesso']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c=ColecaoModel::findOrFail($id);

        return view('admin.colecoesEdit',['colecoes'=>$this->allColection(),'col'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $descricao=$this->clear($request->descricao);
        //CategoriaModel::findOrFail($request->id)->update($c);
        DB::update ('UPDATE colecoes SET descricao= ? WHERE id = ?',[
            $descricao,
            $request->id
        ]);
       // $c=['descricao'=>$this->clear($request->descricao)];
        //ColecaoModel::findOrFail($request->id)->update($c);
        return view('admin.colecoe',['colecoes'=>$this->allColection(),'sms'=>'Coleção alterada com sucesso']);


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
    public function clear($input){

        $texto=addslashes($input);
        $texto=htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
        return $texto;
    }
}
