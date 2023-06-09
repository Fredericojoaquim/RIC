@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">

@section('title', 'RIC-Depósitos')
@section('location', 'Depósitos')


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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                          <h3 class="text-center text-primary">  <strong>Trabalhos cientifico</strong> </h1>
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
                                                <th data-field="autor">Autor</th>
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

                                                    <button type="button" class="btn btn-custon-rounded-four btn-info  btn-sm"> <a class="font-color"  href="{{url("/trabalho/detalhes/$t->cod")}}">detalhes</a> </button>

                                                   @if ($t->estado=='Pendente')
                                                   <button type="button" class="btn btn-custon-rounded-four btn-success  btn-sm font-color mt-mine" data-toggle="modal" data-target="#DangerModalftblack"  onclick="retornaid({{$t->cod}})"> Aprovar </button>
                                                   <button  type="button" class="btn btn-custon-rounded-four btn-danger btn-sm font-color mt-mine" data-toggle="modal" data-target="#DangerModalRejeitar" onclick="retornaidRejeitar({{$t->cod}})">Rejeitar</button>
                                                    @else

                                                    <button disabled type="button" class="btn btn-custon-rounded-four btn-success  btn-sm font-color mt-mine" data-toggle="modal" data-target="#PrimaryModalftblack"> Aprovar</button>
                                                    <button disabled type="button" class="btn btn-custon-rounded-four btn-danger btn-sm font-color mt-mine" data-toggle="modal" data-target="#DangerModalRejeitar">Rejeitar</button>

                                                   @endif

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





<!-- Dangereux modal aprovar trabalho -->
<div id="DangerModalftblack" class="modal modal-edu-general FullColor-popup-DangerModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2>ATENÇÃO!</h2>
                <p>Tem certeza que deseja aprovar este trabalho?</p>
            </div>

            <form action="{{url('/trabalhos/aprovar')}}" method="post">

                @csrf


                <div class="text-center">
                    <input type="hidden" name="trabalho_id" id="trabalho_id"  > <br>
                    <button type="submit" class="btn btn-custon-rounded-four btn-success  btn-md"> Sim </button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- Dangereux modal rejeira trabalho -->
<div id="DangerModalRejeitar" class="modal modal-edu-general FullColor-popup-DangerModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2>ATENÇÃO!</h2>
                <p>Tem certeza que deseja Rejeitar este trabalho?</p>
            </div>

            <form action="{{url('/trabalhos/rejeitar')}}" method="post">

                @csrf


                <div class="text-center">
                    <input type="hidden" name="trabalho_id" id="trabalho_id_rejeitar"  > <br>
                    <button type="submit" class="btn btn-custon-rounded-four btn-success  btn-md"> Sim </button>
                </div>

            </form>

        </div>
    </div>
</div>





<script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>

<script>

  function retornaid(id){
     $('#trabalho_id').val(id);
    }


    function retornaidRejeitar(id){
     $('#trabalho_id_rejeitar').val(id);
    }

$(document).ready(function(){
        //codigo para inicializar a data table
        $('#ModalUpdate').modal('show');
});
</script>

@endsection
