@extends('layouts.dashboard')
@section('title','Gestión de Usuario')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/users">Roles</a></li>      
              <li class="breadcrumb-item active">Mostrar Rol</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-head">
            <h3>nombre : {{$role->name}} </h3>
            <h4>Slug : {{ $role->guard_name }} </h4>
            <h4></h4>
        </div>
        <div class="card-body"> 
            <h5 class="card-title">Role</h5>
            <p class="card-text">
                ------
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
                ------
            </p>           
        </div>
        <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Atras</a>
        </div>
    </div>
</div>

@endsection