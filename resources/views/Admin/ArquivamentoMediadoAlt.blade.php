@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">

<link rel="stylesheet" href="{{url('css/bootstrap-multiselect.css')}}">






@section('title', 'RIC-Depósitos')
@section('location', 'Alterar Trabálho')


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
            <div class="alert alert-danger alert-mg-b" role="alert">

                <p class="text-center">{{$erro}}</p>
            </div>
            @endif
             <!-- Static Table Start -->



        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row largurarow">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="sparkline13-list">
                          <h3 class="text-center text-primary">  <strong>Alterar Trabalho cientifico</strong> </h1>
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                     <!--   <h1 class="text-primary text-center"><span class="table-project-n">Utilizadores</span> </h1>-->
                                </div>
                            </div>
                            <div class="sparkline13-graph allwidth">

                                <div class="row">
                                    @if (isset($trab))

                                    <div class="alert alert-danger alert-mg-b" role="alert" id="erro-registar" hidden> </div>
                                    <form action = "{{url('/trabalho/update')}}"   method="Post" enctype="multipart/form-data" id="form-registar-trabalho">
                                        @csrf
                                        {{ method_field('PUT') }}

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
                                                    <input name="titulo" type="text" class="form-control" placeholder="título"  value="{{$trab[0]->titulo}}" id="titulo">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 ">

                                                    <div mbsc-page class="demo-multiple-select">
                                                        <div style="">
                                                                <label>
                                                        Autor(es)
                                                        <input mbsc-input id="demo-multiple-select-input" placeholder="Please select..."  value="teste" data-dropdown="true" data-input-style="outline" data-label-style="stacked" data-tags="true" />
                                                    </label>
                                                    <select id="demo-multiple-select" name="autor[]" multiple>

                                                        @if (isset($estudantes))

                                                            @foreach ( $estudantes as $e )

                                                                 <option value="{{$e->id}}">{{$e->name}}</option>

                                                            @endforeach

                                                        @endif


                                                    </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 ">
                                                    <select name="orientador" class="form-control" id="orientador">
                                                        <option value="none" selected="" disabled="">Orientador</option>
                                                        @if (isset($colecoes))
                                                            @foreach ($docentes as $d )
                                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 ">
                                                    <input name="lingua" type="text" class="form-control" value="{{$trab[0]->lingua}}" placeholder="Língua" id="lingua">
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 ">
                                                    <input name="data" type="Date" class="form-control" value="{{$trab[0]->data_criacao}}" placeholder="Data de publicação"  id="data">
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12 ">
                                                    <input name="local" type="text" value="{{$trab[0]->local}}" class="form-control" placeholder="Local" id="local">
                                                    <input name="trabalho_id" type="hidden" value="{{$trab[0]->cod}}">
                                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 ">
                                                    <input name="palavra" type="text" value="{{$trab[0]->palavra}}" class="form-control" placeholder="Palavras-Chaves" id="palavra">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 ">
                                                    <label for="resumo" class="black-text">Resumo</label>
                                                    <textarea name="resumo" class="form-control" id="resumo" placeholder="Resumo" rows="3" >{{$trab[0]->resumo}}</textarea>
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 ">
                                                    <label for="fontes" class="blak-text text-left">Fontes Bibliográficas</label>
                                                    <textarea name="fontes" class="form-control" id="fontes" placeholder="Fontes" rows="3">{{$trab[0]->fontes}}</textarea>
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12 ">
                                                    <input name="arquivo" type ="file" class="form-control"  id="arquivo">
                                                </div>








                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-custon-rounded-four btn-primary" id="btn_registar">Alterar</button>
                                                <a data-dismiss="modal" href="#" class="btn btn-custon-rounded-four btn-danger mb-4">Cancelar</a>
                                            </div>

                                        </div>




                                    </form>
                                    @endif


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








<script src="{{ url('js/mobiscroll.javascript.min.js')}}"></script>
<script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>



<script>

  function retornaid(id){
     $('#user_id').val(id);
    }
$(document).ready(function(){
        //codigo para inicializar a data table




        mobiscroll.select('#demo-multiple-select', {
            inputElement: document.getElementById('demo-multiple-select-input')
        });



        mobiscroll.setOptions({
        theme: 'ios',
         themeVariant: 'dark'
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
                formregistar.submit();


            }

        });
        /*Inicio js updates*/


});


</script>

@endsection
