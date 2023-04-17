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



<!-- Modal Update Coleção-->

<div id="ModalUpdate" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2>Registo de Coleção</h2>
                <div class="row">
                    <form action = "{{url('/colecoes/alterar')}}"  method="Post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input name="descricao" type="text" class="form-control" placeholder="Nome da Coleção">
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









<!-- End Modal information delete -->
<div id="informationModal" class="modal modal-edu-general FullColor-popup-DangerModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <p>Tem certeza que deseja Bloquear este utilizador?</p>
                    <form action="{{url('/user/bloquear')}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <input name="id_user" id="user_id" type="hidden" >
                        <div class="mt-4">
                            <button type="submit" class="btn btn-custon-rounded-four btn-danger ">Sim</button>

                       </div>
                    </form>

                </div>

        </div>
    </div>
</div>
<!-- End Modal information delete -->

<script src="{{url('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
  function retornaid(id){
     $('#user_id').val(id);
    }
$(document).ready(function(){
        //codigo para inicializar a data table
     var table=$('#datatable').DataTable();
});
</script>

@endsection
