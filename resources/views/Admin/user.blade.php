@extends('layout.template')
<link rel="stylesheet" href="{{url('css/modals.css')}}">

@section('title', 'User')
@section('location', 'User')


@section('content')

 <!-- Static Table Start -->

 <div class="data-table-area mg-b-15">
    <div class="container-fluid">



        <div class="row">
             <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-custon-rounded-four btn-primary m-right btn-lg " data-toggle="modal" data-target="#PrimaryModalftblack">Registar</button>
                        <div class="sparkline13-list">
                          <h3 class="text-center text-primary">  <strong>Utilizadores</strong> </h1>
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
                                                <th data-field="name" data-editable="true">Nome</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                                <th data-field="phone" data-editable="true">Perfil</th>
                                                <th data-field="complete">Estado</th>

                                                <th data-field="action">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>

                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                                <td>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-default  btn-sm">Alterar</button>
                                                    <button type="button" class="btn btn-custon-rounded-four btn-danger  btn-sm">Excluir</button>
                                                </td>

                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>
                                            <tr>

                                                <td>1</td>
                                                <td>Fred Joaquim</td>
                                                <td>admin@uttara.com</td>
                                                <td>Estudante</td>
                                                <td>activo</td>
                                            </tr>



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


<!-- Modal register User -->

<div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
              <!--  <i class="educate-icon educate-checked modal-check-pro"></i>-->
                <h2>Registo de Utilizador</h2>
                <div class="row">
                    <form action="">

                        <div class="form-group">
                            <input name="firstname" type="text" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input name="firstname" type="email" class="form-control" placeholder="Seu Email">
                        </div>

                        <div class="form-group">
                            <select name="country" class="form-control">
                                    <option value="none" selected="" disabled="">Perfil</option>
                                    <option value="Bibliotecário">Bibliotecário</option>
                                    <option value="Docente">Docente</option>
                                    <option value="Estudante">Estudante</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <input name="firstname" type="password" class="form-control" placeholder="senha">
                        </div>

                        <div class="form-group">
                            <input name="firstname" type="password" class="form-control" placeholder="confirmar sua senha">
                        </div>

                        <div class="form-group">
                            <input name="firstname" type="file" class="form-control" placeholder="carrega sua foto">
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
<!-- End Modal register User -->



<script>

$(document).ready(function(){
        //codigo para inicializar a data table
     var table=$('#datatable').DataTable();
});
</script>

@endsection
