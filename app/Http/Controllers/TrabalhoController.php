<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColecaoModel;
use App\Models\TrabalhoModel;
use App\Models\CategoriaModel;
use App\Models\AutorTrabalhoModel;
use App\Models\MetadadoModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TrabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function abrirPdf($caminho){

        PDF::setOption(['isRemoteEnabled' => true]);
        $pdf=new PDF ();
       return $pdf->setPaper('a4')->stream( public_path($caminho),["Attachment"=> false] );
     }

     public function allwork()
     {
         //
         $p=DB::table('metadados')
         ->join('trabalhos','trabalhos.id','=','metadados.trabalho_id')
         ->join('categorias','categorias.id','=','trabalhos.categoria_id')
         ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
         ->where('trabalhos.tipo','!=','Auto-Arquivamento')
         ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
         ->get();


         return  $p;
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


    public function index()

    {

       // dd($this->autorTrabalhos());

        return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
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
        $t=new TrabalhoModel();
        $t->user_id=$request->user_id;
        $t->categoria_id=$request->categoria;
        $t->colecao_id=$request->colecao;
        $t->estado="aprovado";

        //upload do arquivo
        //dd($request->arquivo);

        if($request->file('arquivo')->isValid()){

            if($request->hasFile('arquivo')!=null){

                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $t->caminho = $nomearquivo;
            }else{
                dd('entrou');
                $t->caminho = null;
            }
        }else{
            return "ficheiro inválido";
        }

        $t->save();
        $m=new MetadadoModel();
        $m->titulo=$request->titulo;
        $m->autor=$request->autor;
        $m->orientador=$request->orientador;
        $m->lingua=$request->lingua;
        $m->data_criacao=$request->data;
        $m->local=$request->local;
        $m->palavra=$request->palavra;
        $m->formato= $extensao;
        $m->resumo=$request->resumo;
        $m->fontes=$request->fontes;
        $m->trabalho_id=$t->id;



        $m->save();
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

        $p=DB::table('metadados')
        ->join('trabalhos','trabalhos.id','=','metadados.trabalho_id')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->where('trabalhos.tipo','!=',DB::raw('?'))
        ->where('trabalhos.id','=',DB::raw('?'))
        ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
        ->setBindings(['Auto-Arquivamento',$id])
        ->get();


        if($p->count()==0){
            return view('admin.arquivamentoMediadoAlt', ['erro'=>'Registro não encontrado']);


        }


        return view('admin.arquivamentoMediadoAlt', ['trab'=>$p,'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(), 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);



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


    public function arquivamentoMediado(Request $request){


        $total_autor=count($request->autor);
        $sizefile=(int)$request->arquivo->getSize();
        $t=new TrabalhoModel();

        $t->user_id=$request->user_id;
        $t->categoria_id=$request->categoria;
        $t->colecao_id=$request->colecao;
        $t->tipo="Arquivamento Mediado";
        $t->estado="aprovado";


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

                return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
            }
        }else{
                 return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
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






        return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Registado com sucesso','docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
    }


    public function userPermission($id){
        $input=$this->clear($id);

        $user=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->where('users.id','=','?')
        ->select('users.*', 'permissions.name as permicao')
        ->get([$input]);
        return $user[0]->permicao;
    }


    public function detalhes($id){
        $input=$this->clear($id);
      //  dd($input);
        $p = DB::table('metadados')
        ->join('trabalhos', 'trabalhos.id', '=', 'metadados.trabalho_id')
        ->join('categorias', 'categorias.id', '=', 'trabalhos.categoria_id')
        ->join('colecoes', 'colecoes.id', '=', 'trabalhos.colecao_id')
        ->join('users', 'metadados.orientador_id', '=', 'users.id')
        ->where('trabalhos.id', '=', DB::raw('?'))
        ->select('metadados.*', 'categorias.descricao as categoria', 'colecoes.descricao as colecao', 'trabalhos.*', 'trabalhos.id as cod','users.name as orientador')
        ->setBindings([$input])
        ->get();


        return view('admin.detalhes',['t'=>$p,'autortrabalho'=>$this->autorTrabalhos()]);



    }

    public function autoArquivamento(){


        return  view('admin.autoarquivamento',['trab'=>$this->allAutoArquivamento(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory()]);

    }

    public function autoArquivamento_Store(Request $request){

        $size=($request->arquivo->getSize()/2048);
        //dd();
        $t=new TrabalhoModel();

        $t->user_id=$this->clear($request->user_id);
        $t->categoria_id=$this->clear($request->categoria);
        $t->colecao_id=$this->clear($request->colecao);
        $t->estado="Pendente";
        $t->tipo="Auto-Arquivamento";

        //upload do arquivo
        if($request->file('arquivo')->isValid()){

            if($request->hasFile('arquivo')!=null){

                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $t->caminho = $this->clear($nomearquivo);
            }else{
                //dd('entrou');
                $t->caminho = null;
            }
        }else{
            return view('admin.autoarquivamento',['trab'=>$this->allAutoArquivamento(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido']);
        }

        $t->save();
        $m=new MetadadoModel();
        $m->titulo=$this->clear($request->titulo);
        $m->autor=$this->clear($request->autor);
        $m->orientador=$this->clear($request->orientador);
        $m->lingua=$this->clear($request->lingua);
        $m->data_criacao=$this->clear($request->data);
        $m->local=$this->clear($request->local);
        $m->palavra=$this->clear($request->palavra);
        $m->formato= $extensao;
        $m->resumo=$this->clear($request->resumo);
        $m->fontes=$this->clear($request->fontes);
        $m->trabalho_id=$this->clear($t->id);
        $m->tamanho=ceil($size);

        $m->save();

        return view('admin.autoarquivamento',['trab'=>$this->allAutoArquivamento(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Registado com sucesso']);


    }


    public function allAutoArquivamento()
    {
        //
        //$id=Auth::user()->id;
        $p=DB::table('metadados')
        ->join('trabalhos','trabalhos.id','=','metadados.trabalho_id')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->where('trabalhos.user_id','=',Auth::user()->id)
        ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
        ->get();

        return  $p;
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
        ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
        ->get();

        return  $p;
    }




    public function autoArquivamentos(){

        return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamentos(),'autortrabalho'=>$this->autorTrabalhos()]);

    }


    public function aprovar(Request $request){
        if(!$this->interValidation('trabalho_id')){

            return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'O código deve ser um inteiro','autortrabalho'=>$this->autorTrabalhos()]);

        }
        $input=$this->clear($request->trabalho_id);
       //DB::select('select * from trabalhos where id = ?', [$request->trabalho_id];);
       //atualizando dados na BD prevenindo os ataques conhecidos
        DB::update ('UPDATE trabalhos SET estado= ? WHERE id = ?',[
            'aprovado',
            $input
        ]);

       // TrabalhoModel::findOrFail($request->trabalho_id)->update($c);
       return view('admin.autoarquivamento',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Trabalho aprovado com sucesso','autortrabalho'=>$this->autorTrabalhos()]);

    }


    public function Rejeitar(Request $request){
        if(!$this->interValidation('trabalho_id')){

            return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'O código deve ser um inteiro','autortrabalho'=>$this->autorTrabalhos()]);

        }
        $input=$this->clear($request->trabalho_id);
       //DB::select('select * from trabalhos where id = ?', [$request->trabalho_id];);
       //atualizando dados na BD prevenindo os ataques conhecidos
        DB::update ('UPDATE trabalhos SET estado= ? WHERE id = ?',[
            'Rejeitado',
            $input
        ]);

       // TrabalhoModel::findOrFail($request->trabalho_id)->update($c);
       return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamentos(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Trabalho Rejeitado com sucesso','autortrabalho'=>$this->autorTrabalhos()]);

    }


    public function interValidation($inputname){
        if( filter_input(INPUT_POST, $inputname,FILTER_VALIDATE_INT)){
            return true;
        }
        return false;
    }

    public function interValidationGet($inputname){
        if( filter_input(INPUT_GET, $inputname,FILTER_VALIDATE_INT)){
            return true;
        }
        return false;
    }


    public function clear($input){

        $texto=addslashes($input);
        $texto=htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
        return $texto;
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


    public function autorTrabalhos()
    {
        //
        $at=DB::table('autor_trabalhos')
        ->join('users','users.id','=','autor_trabalhos.user_id')
        ->select('users.*', 'autor_trabalhos.*')
        ->get();
        return  $at;
    }

    public function updateArqMediado(Request $request){

        //
        //dd($request->orientador);
        $total_autor=count($request->autor);
        $sizefile=(int)$request->arquivo->getSize();
        $t=new TrabalhoModel();

        $t->user_id=$request->user_id;
        $t->categoria_id=$request->categoria;
        $t->colecao_id=$request->colecao;
        $t->tipo="Arquivamento Mediado";
        $t->estado="aprovado";




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

                return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
            }
        }else{
                 return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido', 'docentes'=>$this->allDocente(),'estudantes'=>$this->allStudent(),'autortrabalho'=>$this->autorTrabalhos()]);
        }
        //update trabalho
        DB::update ('UPDATE trabalhos SET user_id=?, categoria_id=?, colecao_id=? , caminho=? WHERE id = ?',[
            $t->user_id,
            $t->categoria_id,
            $t->colecao_id,
            $t->caminho,
            $request->trabalho_id
        ]);

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
        $m->trabalho_id=$request->trabalho_id;
        $m->tamanho=ceil($sizefile/2048);
        //update metadados

        $teste= DB::update ('UPDATE METADADOS SET titulo=?, orientador_id=?, lingua=? , data_criacao=?,local=?, resumo=?, fontes=?, palavra=? , formato=?, tamanho=? WHERE trabalho_id = ?',[
            $m->titulo,
            $m->orientador_id,
            $m->lingua,
            $m->data_criacao,
            $m->local,
            $m->resumo,
            $m->fontes,
            $m->palavra,
            $m->formato,
            $m->tamanho,
            $request->trabalho_id
        ]);


        for($i=0;$i<$total_autor;$i++){
            $at=new AutorTrabalhoModel();
            $at->trabalho_id= $request->trabalho_id;
            $at->user_id=$request->autor[$i];
            //update tratabalho autor
            //$at->save();

           DB::update ('UPDATE autor_trabalhos SET user_id= ? WHERE trabalho_id = ?',[
                $at->user_id,
                $at->trabalho_id

            ]);
           // dd($teste);
            return view('admin.arquivamentoMediadoAlt', ['sms'=>'Trabalho alterado com sucesso']);
        }


        //




    }
}
