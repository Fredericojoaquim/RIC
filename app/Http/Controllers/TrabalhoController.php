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
        $t->user_id=$request->user_id;
        $t->categoria_id=$request->categoria;
        $t->colecao_id=$request->colecao;
        if($this->userPermission(Auth::user()->id)=='Bibliotecário'){
            $t->estado="aprovado";
        }else{
            $t->estado="aguarda por aprovação";
        }

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
        $m->tamanho=$request->arquivo->getSize();
        $m->resumo=$request->resumo;
        $m->fontes=$request->fontes;
        $m->trabalho_id=$t->id;
        $m->save();

        return view('admin.trabalhos',['trab'=>$this->allwork(),'colecoes'=>$this->allColection(),'categorias'=>$this->allCategory(),'sms'=>'Registado com sucesso']);
    }


    public function userPermission($id){
        $user=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->where('users.id','=',$id)
        ->select('users.*', 'permissions.name as permicao')
        ->get();
        return $user[0]->permicao;
    }


    public function detalhes($id){

        $p=DB::table('metadados')
        ->join('trabalhos','trabalhos.id','=','metadados.trabalho_id')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->where('trabalhos.id','=',$id)
        ->select('metadados.*','categorias.descricao as categoria', 'colecoes.descricao as colecao','trabalhos.*','trabalhos.id as cod')
        ->get();

        return view('admin.detalhes',['t'=>$p]);



    }
}
