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
                                                <td>{{$t->autor}}</td>
                                                <td>{{$t->estado}}</td>
@php

@endphp



                                                <td class="d-flex justify-content-center">

                                                    <button type="button" class="btn btn-custon-rounded-four btn-info  btn-sm"> <a class="font-color"  href="{{url("/trabalho/detalhes/$t->cod")}}">detalhes</a> </button>

                                                   @if ($t->estado=='Pendente')
                                                   <button type="button" class="btn btn-custon-rounded-four btn-success  btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t->caminho)}}">Aprovar</a> </button>
                                                   <button type="button" class="btn btn-custon-rounded-four btn-danger btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t->caminho)}}">Rejeitar</a> </button>
                                                    @else

                                                    <button disabled type="button" class="btn btn-custon-rounded-four btn-success  btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t->caminho)}}">Aprovar</a> </button>
                                                    <button disabled type="button" class="btn btn-custon-rounded-four btn-danger btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t->caminho)}}">Rejeitar</a> </button>

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













<script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
  function retornaid(id){
     $('#user_id').val(id);
    }
$(document).ready(function(){
        //codigo para inicializar a data table
        $('#ModalUpdate').modal('show');
});
</script>

@endsection
