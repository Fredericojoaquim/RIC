@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">


@section('title', 'RIC-Depósitos')
@section('location', 'Detalhes')


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
                          <h3 class="text-center text-primary">  <strong>Trabalho cientifico</strong> </h1>
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                     <!--   <h1 class="text-primary text-center"><span class="table-project-n">Utilizadores</span> </h1>-->
                                </div>
                            </div>
                            <div class="sparkline13-graph allwidth">

                                    <table class="mycenter" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">


                                        <tbody>
                                     @if (isset($t))





                                            <tr>
                                                <td class="metadataFieldLabel dc_title"> <b>Identificado único:</b> {{$t[0]->cod}} </td>
                                            </tr>
                                            <tr>
                                                <td> <b>Título:</b> {{$t[0]->titulo}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Autor(es): </b> {{$t[0]->autor}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Coleção: </b> {{$t[0]->colecao}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Categoria: </b> {{$t[0]->categoria}} </td>
                                            </tr>
                                            <tr>
                                                <td><b>Palavras-chaves: </b>{{$t[0]->palavra}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Data: </b>{{$t[0]->data_criacao}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Estado: </b> {{$t[0]->estado}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Resumo: </b> {{$t[0]->resumo}}</td>
                                            </tr>




                                    @endif






                                        </tbody>
                                    </table>





                                </div>

                                <div class="card">

                                    <div class="card-header">
                                       <p class="myp"> Ficheiro deste registo:</p>
                                    </div>

                                    <table class="table">
                                        <thead class="table-dark" >
                                          <th >TÍtulo</th>
                                          <th >Tamanho</th>
                                          <th>Formato</th>
                                          <th >Acção</th>
                                        </thead>
                                        <tbody class="tbody">
                                          <td>{{$t[0]->titulo}}</td>
                                          <td>{{$t[0]->tamanho}}MB</td>
                                          <td>{{$t[0]->formato}}</td>
                                          <td><button type="button" class="btn btn-custon-rounded-four btn-primary  btn-sm font-color mt-mine"> <a class="font-color" target="_blank" href="{{asset('trabalhos/'.$t[0]->caminho)}}">Abrir Arquivo</a> </button></td>
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
