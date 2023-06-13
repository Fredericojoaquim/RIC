@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">

@section('title', 'RIC-Auto-Arquivamento')
@section('location', 'Docente/Auto-Arquivamento')


@section('content')

 <!-- Static Table Start -->

 <div class="data-table-area mg-b-15">
    <div class="container-fluid">



        <div class="row">
            @if (isset($sms))
            <div class="alert alert-success" role="alert">

                <p class="text-center">{{$sms}}</p>
            </div>
            @endif

            @if (isset($erro))
            <div class="alert alert-danger" role="alert">

                <p class="text-center">{{$erro}}</p>
            </div>
            @endif
             <!-- Static Table Start -->



        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-custon-rounded-four btn-primary m-right btn-lg " data-toggle="modal" data-target="#PrimaryModalftblack">Registar</button>
                        <div class="sparkline13-list">
                          <h3 class="text-center text-primary">  <strong>Meus Depósitos</strong> </h1>
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                     <!--   <h1 class="text-primary text-center"><span class="table-project-n">Utilizadores</span> </h1>-->
                                </div>
                            </div>
                            <div class="sparkline13-graph allwidth">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table class="mycenter" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>

                                                <th data-field="id">ID</th>
                                                <th data-field="titulo">Título</th>
                                                <th data-field="categoria">Categoria</th>
                                                <th data-field="colecao">Coleção</th>
                                                <th data-field="autor">Autor (es)</th>
                                                <th data-field="estado">Estado</th>
                                                <th data-field="acoes">Acções</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                     @if (isset($trab))




                                            @foreach ($trab as $t)
                                            <tr>
                                                <td>{{$t->cod}}</td>
                                                <td>{{$t->titulo}}</td>
                                                <td>{{$t->categoria}}</td>
                                                <td>{{$t->colecao}}</td>
                                                @php
                                                    if(isset($autortrabalho)){
                                                        $autor="";
                                                        foreach($autortrabalho as $at){

                                                            if($at->trabalho_id==$t->cod){
                                                                $autor=$autor." ; ".$at->name;
                                                            }


                                                        }
                                                        $autor=ltrim($autor,' ;');

                                                    }

                                                    echo "<td>$autor</td>";


                                                @endphp

                                             @switch($t->estado)
                                                    @case('Pendente')
                                                        <td> <span class="yellowcolor">{{$t->estado}} </span></td>
                                                        @break
                                                    @case('Rejeitado')
                                                        <td> <span class="redcolor">{{$t->estado}}</span> </td>
                                                        @break
                                                    @case('aprovado')
                                                        <td> <span class="greencolor">{{$t->estado}}</span> </td>
                                                        @break
                                             @endswitch




                                                <td class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-custon-rounded-four btn-default  btn-sm"> <a href="{{url("/categoria/edit/$t->cod")}}">Alterar</a> </button>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-info  btn-sm"> <a class="font-color"  href="{{url("/trabalho/detalhes/$t->cod")}}">detalhes</a> </button>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-primary  btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t->caminho)}}">Abrir</a> </button>

                                                </td>

                                            </tr>
                                            @endforeach

                                    @endif






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        </div>
    </div>
</div>
<!-- Static Table End -->


<!-- Modal register Categoria-->

<div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2>Registo de Trabalho cientifico</h2>

                <div class="row">
                    <div class="alert alert-danger alert-mg-b" role="alert" id="erro-registar" hidden> </div>


                    <form action = "{{url('/docente/autoarquivamento/Salvar')}}"   method="Post" enctype="multipart/form-data" id="form-registar-trabalho">
                        @csrf

                        <div class=" row">
                            <div class="form-group col-lg-6 col-md-12 ">
                                <select name="colecao" class="form-control" id="colecao">
                                    <option value="none" selected="" disabled="">Coleção</option>
                                    @if (isset($colecoes))
                                        @foreach ($colecoes as $col )
                                    <option value="{{$col->id}}">{{$col->descricao}}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-12 ">
                                <select name="categoria" class="form-control" id="categoria">
                                    <option value="none" selected="" disabled="">Categoria</option>
                                    @if (isset($categorias))
                                        @foreach ($categorias as $cat )
                                    <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                                <div class="form-group col-lg-12 col-md-12 ">
                                    <input name="titulo" type="text" class="form-control" placeholder="Título" id="titulo">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 ">
                                    <select name="orientador" class="form-control" id="orientador">
                                        <option value="none" selected="" disabled="">Autor</option>
                                        @if (isset($user))

                                        <option value="{{$user->id}}">{{$user->name}}</option>

                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 ">
                                    <select name="orientador" class="form-control" id="orientador">
                                        <option value="none" selected="" disabled="">Orientador</option>
                                        @if (isset($user))

                                        <option value="{{$user->id}}">{{$user->name}}</option>

                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 ">
                                    <input name="lingua" type="text" class="form-control" placeholder="Língua" id="lingua">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 ">
                                    <input name="data" type="Date" class="form-control" placeholder="Data de publicação"  id="data">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 ">
                                    <input name="local" type="text" class="form-control" placeholder="Local" id="local">
                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 ">
                                    <input name="palavra" type="text" class="form-control" placeholder="Palavras-Chaves" id="palavra">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 ">
                                    <label for="resumo" class="white-text">Resumo</label>
                                    <textarea name="resumo" class="form-control" id="resumo" placeholder="Resumo" rows="3" ></textarea>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 ">
                                    <label for="fontes" class="white-text text-left">Fontes Bibliográficas</label>
                                    <textarea name="fontes" class="form-control" id="fontes" placeholder="Fontes" rows="3"></textarea>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 ">
                                    <input name="arquivo" type ="file" class="form-control"  id="arquivo">
                                </div>

                                <div class="checkbox login-checkbox text-left margin-left col-lg-12">
                                    <label class="white-text">
                                      <input name="checkbox" type="checkbox" class="i-checks" id="checkbox">Concordo com os termos de direitos autorais
                                    </label>

                                </div>






                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-custon-rounded-four btn-primary" id="btn_registar">Registar</button>
                                <a data-dismiss="modal" href="#" class="btn btn-custon-rounded-four btn-danger mb-4">Cancelar</a>
                            </div>

                        </div>




                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal register Coleção -->










<script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
  function retornaid(id){
     $('#user_id').val(id);
    }
$(document).ready(function(){
        //codigo para inicializar a data table
        mobiscroll.select('#demo-multiple-select', {
            inputElement: document.getElementById('demo-multiple-select-input')
        });

        btn_registar=document.getElementById("btn_registar");
        btn_registar.addEventListener('click', (event)=>{
            event.preventDefault();
            var formregistar=document.getElementById("form-registar-trabalho");
            var colecao=document.getElementById("colecao");
            var categoria=document.getElementById("categoria");
            var titulo=document.getElementById("titulo");
            var autor=document.getElementById("demo-multiple-select");
            var orientador=document.getElementById("orientador");
            var lingua=document.getElementById("lingua");
            var data=document.getElementById("data");
            var local=document.getElementById("local");
            var palavra=document.getElementById("palavra");
            var resumo=document.getElementById("resumo");
            var fonte=document.getElementById("fontes");
            var arquivo=document.getElementById("arquivo");
            var checkbox=document.getElementById("checkbox");
            var erro=document.getElementById("erro-registar");


            if(colecao.value =='none'){

                erro.innerHTML="O campo <strong> Coleção </strong> é obrigatório";
                erro.removeAttribute('hidden');
                colecao.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
            }
            if(categoria.value =='none'){

                erro.innerHTML="O campo <strong> Categoria </strong> é obrigatório";
                erro.removeAttribute('hidden');
                categoria.focus();
                return false;
            }else{
            erro.setAttribute('hidden', true);

            }
            if(titulo.value ==''){

            erro.innerHTML="O campo <strong> Título </strong> é obrigatório";
            erro.removeAttribute('hidden');
            titulo.focus();
            return false;
            }else{
            erro.setAttribute('hidden', true);

            }

            if(autor.value ==''){

                erro.innerHTML="O campo <strong> Autor </strong> é obrigatório";
                erro.removeAttribute('hidden');
                autor.focus();
                return false;
             }else{
                erro.setAttribute('hidden', true);

            }

            if(orientador.value =='none'){

                erro.innerHTML="O campo <strong> Orientador </strong> é obrigatório";
                erro.removeAttribute('hidden');
                orientador.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);

            }

            if(lingua.value ==''){

                erro.innerHTML="O campo <strong> Língua </strong> é obrigatório";
                erro.removeAttribute('hidden');
                lingua.focus();
                return false;
                }else{
                erro.setAttribute('hidden', true);

            }

            if(data.value ==''){

            erro.innerHTML="O campo <strong> Data </strong> é obrigatório";
            erro.removeAttribute('hidden');
            data.focus();
            return false;
            }else{
            erro.setAttribute('hidden', true);

            }

            if(local.value ==''){

                erro.innerHTML="O campo <strong> Local </strong> é obrigatório";
                erro.removeAttribute('hidden');
                local.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);

            }

            if(palavra.value ==''){

            erro.innerHTML="O campo <strong> Palavra </strong> é obrigatório";
            erro.removeAttribute('hidden');
            palavra.focus();
            return false;
            }else{
            erro.setAttribute('hidden', true);

            }

            if(resumo.value ==''){

            erro.innerHTML="O campo <strong> Resumo </strong> é obrigatório";
            erro.removeAttribute('hidden');
            resumo.focus();
            return false;
            }else{
            erro.setAttribute('hidden', true);

            }
            if(fonte.value ==''){

                erro.innerHTML="O campo <strong> Fontes </strong> é obrigatório";
                erro.removeAttribute('hidden');
                fonte.focus();
                 return false;
            }else{
                erro.setAttribute('hidden', true);

            }

            if(arquivo.value == ''){

                erro.innerHTML="O campo <strong> arquivo </strong> é obrigatório";
                erro.removeAttribute('hidden');
                arquivo.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);

            }



            if(!checkbox.checked){
                erro.innerHTML="<strong> Por favor concorde com os termos de submissão</strong> é obrigatório";
                erro.removeAttribute('hidden');
                checkbox.focus();
                return false;
            }else{
            erro.setAttribute('hidden', true);
            formregistar.submit();

            }










        });


});
</script>

@endsection
