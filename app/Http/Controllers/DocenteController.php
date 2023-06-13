<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ColecaoModel;
use App\Models\TrabalhoModel;
use App\Models\CategoriaModel;
use App\Models\MetadadoModel;
use App\Models\User;
use App\Models\AutorTrabalhoModel;
use Illuminate\Support\Facades\Auth;


class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function autoArquivamentoIndex(){

        //dd($this->meusDados());

        return view('docentes.autoarquivamentoIndex',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos(),'user'=>$this->meusDados()]);
    }

    public function allDocente(){

        $docentes=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->where('permissions.name','=','Docente/Pesquisador')
        ->select('users.name', 'users.id')
        ->orderBy('users.name','asc')
        ->get();

        return $docentes;


    }

    public function allStudent(){

        $docentes=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->where('permissions.name','=','Estudante')
        ->select('users.name', 'users.id')
        ->orderBy('users.name','asc')
        ->get();

        return $docentes;


    }

    public function allColection()
     {
         //
        // $co=TrabalhoModel::all();

        $p=ColecaoModel::all();
         return  $p;
     }

     public function allCategory()
     {
         //
         $categorias=CategoriaModel::all();

         return  $categorias;
     }

     public function allAutoArquivamentos()
     {
         //
         //$id=Auth::user()->id;
         $p=DB::table('metadados')
         ->join('trabalhos','trabalhos.id','=','metadados.trabalho_id')
         ->join('categorias','categorias.id','=','trabalhos.categoria_id')
         ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
         ->where('trabalhos.tipo','=','Auto-Arquivamento')
         ->where('trabalhos.user_id','=',Auth::user()->id)
         ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
         ->get();

         return  $p;
     }


     public function salvarAutoArq(Request $request){


        $total_autor=count($request->autor);
        $sizefile=(int)$request->arquivo->getSize();
        $t=new TrabalhoModel();

        $t->user_id=$request->user_id;
        $t->categoria_id=$request->categoria;
        $t->colecao_id=$request->colecao;
        $t->estado="Pendente";
        $t->tipo="Auto-Arquivamento";


        //upload do arquivo
       // dd($request->arquivo->getSize());


        if($request->file('arquivo')->isValid()){

            if($request->hasFile('arquivo')!=null){

                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $t->caminho = $nomearquivo;
            }else{

                return view('docentes.autoarquivamentoIndex',['trab'=>$thi->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos(),'user'=>$this->meusDados(Auth::user()->id)]);
            }
        }else{
                 return view('docentes.autoarquivamentoIndex',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos(),'user'=>$this->meusDados(Auth::user()->id)]);
        }

        $t->save();
        $m=new MetadadoModel();
        $m->titulo=$this->clear($request->titulo);
        $m->orientador_id=$request->orientador;
        $m->lingua=$this->clear($request->lingua);
        $m->data_criacao=$this->clear($request->data);
        $m->local=$this->clear($request->local);
        $m->palavra=$this->clear($request->palavra);
        $m->formato= $extensao;

        $m->resumo=$this->clear($request->resumo);
        $m->fontes=$this->clear($request->fontes);
        $m->trabalho_id=$t->id;

        $m->tamanho=ceil($sizefile/2048);
        $m->save();

        for($i=0;$i<$total_autor;$i++){
            $at=new AutorTrabalhoModel();
            $at->trabalho_id= $t->id;
            $at->user_id=$request->autor[$i];
            $at->save();
        }






        return view('docentes.autoarquivamentoIndex',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Registado com sucesso','docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos(),'user'=>$this->meusDados(Auth::user()->id)]);

    }

    public function clear($input){

        $texto=addslashes($input);
        $texto=htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
        return $texto;
    }

    public function autorTrabalhos()
    {
        //
        $at=DB::table('autor_trabalhos')
        ->join('users','users.id','=','autor_trabalhos.user_id')
        ->select('users.*', 'autor_trabalhos.*')
        ->get();
        return  $at;
    }


    public function meusDados(){
        $user=User::findOrFail(Auth::user()->id);
        return $user;
    }




}
