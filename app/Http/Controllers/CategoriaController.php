<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaModel;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

     public function allCategory()
     {
         //
         $categorias=CategoriaModel::all();
         return  $categorias;
     }

    public function index()
    {
        //
       // dd($this->allCategory());
        return view('admin.categoria',['cat'=>$this->allCategory()]);
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
        $c=new CategoriaModel();
        $c->descricao=$request->descricao;
        $c->save();
        return view('admin.categoria',['cat'=>$this->allCategory(),'sms'=>'Categoria registada com sucesso']);
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
        $c=CategoriaModel::findOrFail($id);

        return view('admin.categoriaEdit',['cat'=>$this->allCategory(),'ca'=>$c]);

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
        //$c=['descricao'=>$request->descricao];
        $descricao=$this->clear($request->descricao);
        //CategoriaModel::findOrFail($request->id)->update($c);
        DB::update ('UPDATE categorias SET descricao= ? WHERE id = ?',[
            $descricao,
            $request->id
        ]);
        return view('admin.categoria',['cat'=>$this->allCategory(),'sms'=>'Categoria alterada com sucesso']);
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
