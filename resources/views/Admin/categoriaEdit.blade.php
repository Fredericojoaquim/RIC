@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">

@section('title', 'RIC-Categoria')
@section('location', 'Categoria')


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
                        <button type="button" class="btn btn-custon-rounded-four btn-primary m-right btn-lg " data-toggle="modal" data-target="#PrimaryModalftblack">Registar</button>
                        <div class="sparkline13-list">
                          <h3 class="text-center text-primary">  <strong>Categorias</strong> </h1>
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
                                                <th data-field="name" data-editable="true">Descrição</th>
                                                <th data-field="action">Acção</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                     @if (isset($cat))




                                            @foreach ($cat as $c)
                                            <tr>

                                                <td>{{$c->id}}</td>
                                                <td>{{$c->descricao}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-default  btn-sm"> <a href="{{url("/categoria/edit/$c->id")}}">Alterar</a> </button>

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
                <h2>Registo de Categoria</h2>
                <div class="row">
                    <form action = "{{url('/categoria/registar')}}"  method="Post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input name="descricao" type="text" class="form-control" placeholder="Nome da Categoria">
                        </div>


                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-custon-rounded-four btn-primary">Registar</button>
                            <a data-dismiss="modal" href="#" class="btn btn-custon-rounded-four btn-danger mb-4">Cancelar</a>
                        </div>




                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal register Coleção -->


<!-- Modal Update Categoria-->
<div id="ModalUpdate" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2>Alterar de Categoria</h2>
                <div class="row">
                    <form action = "{{url('/categoria/update')}}"  method="Post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <input name="descricao" type="text" value="{{$ca->descricao}}" id="descricao_alt" class="form-control" placeholder="Nome da Categoria">
                            <input name="id" type="hidden" value="{{$ca->id}}" >
                        </div>


                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-custon-rounded-four btn-primary">Alterar</button>
                            <a data-dismiss="modal" href="#" class="btn btn-custon-rounded-four btn-danger mb-4">Cancelar</a>
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
        $('#ModalUpdate').modal('show');

        var desc_alt=document.getElementById("descricao_alt");
        desc_alt.focus();
});
</script>

@endsection
