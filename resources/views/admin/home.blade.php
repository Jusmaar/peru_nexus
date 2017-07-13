@extends('layouts.master')

@section('content')
<style>
    .panel-body .btn:not(.btn-block) { width:100%;margin-bottom:10px; height:4em; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-home"></span> Menu Administrador</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="{{url('/products')}}" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-phone"></span> <br/>Productos</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <a href="{{url('/users')}}" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Usuarios</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="{{url('/Reporte')}}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-list"></span> <br/>Reportes</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-credit-card"></span> <br/>Pagos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop