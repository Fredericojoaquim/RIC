@extends('layout.template')
@section('title', 'Perfil')
@section('location', 'Meu Perfil')


@section('content')

<div class="myrow">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="profile-info-inner">
        <div class="profile-img">
            <img src="img/profile/1.jpg" alt="" />
        </div>
        <div class="profile-details-hr">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                        <p><b>Name</b><br /> Fly Zend</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                        <p><b>Designation</b><br /> Head of Dept.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                        <p><b>Email ID</b><br /> fly@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                        <p><b>Phone</b><br /> +01962067309</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="address-hr">
                        <p><b>Address</b><br /> E104, catn-2, Chandlodia Ahmedabad Gujarat, UK.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <h3>500</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <h3>900</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="address-hr">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <h3>600</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
