<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Models\ModelPermission;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUser()
    {
        //
        $users=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->select('users.*', 'permissions.name as permicao')
        ->get();
        return $users;
    }

    public function index()
    {
        //
        $users=$this->allUser();
        return view('admin.user',['users'=>$users]);
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
        $u=new User();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->status='ativo';
        $u->password=Hash::make($request->password);
       // $u->imagem=$request->imagem;//adicionar o caminho da imagem aqui
        $u->givePermissionTo($request->permission);
     //  var_dump($u);
     // event(new Registered($u));
        if($request->hasFile('imagem')){

            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $request->imagem->move(public_path('imagens'),$nomeImagem);
            $u->img = $nomeImagem;
        }else{

            $u->img = null;
        }
        //dd($u);
        $u->save();
       return view('admin.usuario',['users'=>$users=$this->allUser(),'sms'=>'Utilizador registado com sucesso']);
        //Auth::login($u);

        //return redirect(RouteServiceProvider::HOME);
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
