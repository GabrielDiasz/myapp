@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content_header')
    <h1>Cadastro de Usuários</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Usuários</h3>
        </div>
        <form class="form-horizontal mt-2" action="{{ route('users.store') }}" method="POST">
            @include('users.form')
        </form>
    </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2030 <a href="#">Gestão de Instrutores</a>.</strong> Todos os direitos
    reservado.
@endsection

@section('css')
@stop

@section('js')
@stop

