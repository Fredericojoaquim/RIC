<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColecaoModel;
use App\Models\TrabalhoModel;
use App\Models\CategoriaModel;
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

        return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory()]);
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


    public function arquivamentoMediado(Request $request){


        $t=new TrabalhoModel();
        $t->user_id=$this->clear($request->user_id);
        $t->categoria_id=$this->clear($request->categoria);
        $t->colecao_id=$this->clear($request->colecao);
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

                $t->caminho = null;
            }
        }else{
            return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'Ficheiro inválido']);
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
        $m->tamanho=$request->arquivo->getSize();
        $m->resumo=$this->clear($request->resumo);
        $m->fontes=$this->clear($request->fontes);
        $m->trabalho_id=$t->id;

        $m->tamanho=ceil($request->arquivo->getSize()/2048);
        $m->save();

        return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Registado com sucesso']);
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
        ->where('trabalhos.id', '=', DB::raw('?'))
        ->select('metadados.*', 'categorias.descricao as categoria', 'colecoes.descricao as colecao', 'trabalhos.*', 'trabalhos.id as cod')
        ->setBindings([$input])
        ->get();

        return view('admin.detalhes',['t'=>$p]);



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
        $t->tipo="Auto-Arquivameto";

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
        ->where('trabalhos.tipo','=','Auto-Arquivameto')
        ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
        ->get();

        return  $p;
    }




    public function autoArquivamentos(){

        return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamentos()]);

    }


    public function aprovar(Request $request){
        if(!$this->interValidation('trabalho_id')){

            return view('admin.AutoArquivamentos',['trab'=>$this->allAutoArquivamento(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'erro'=>'O código deve ser um inteiro']);

        }
        $input=$this->clear($request->trabalho_id);
       //DB::select('select * from trabalhos where id = ?', [$request->trabalho_id];);
       //atualizando dados na BD prevenindo os ataques conhecidos
        DB::update ('UPDATE trabalhos SET estado= ? WHERE id = ?',[
            'aprovado',
            $inpu
        ]);

       // TrabalhoModel::findOrFail($request->trabalho_id)->update($c);
       return view('admin.autoarquivamento',['trab'=>$this->allAutoArquivamento(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Trabalho aprovado com sucesso']);

    }


    public function interValidation($inputname){
        if( filter_input(INPUT_POST, $inputname,FILTER_VALIDATE_INT)){
            return true;
        }
        return false;
    }


    public function clear($input){

        $texto=addslashes($input);
        $texto=htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
        return $texto;
    }
}
