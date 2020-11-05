@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('usuarios') }}">Voltar</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Formulário do Usuario!</h1>

                    @if(Request::is('*/edit'))
                    <form action="{{ url('usuarios/update') }}/{{ $usuario->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNome1">Nome:</label>
                            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" id="exampleInputNome1" aria-describedby="emailHelp" placeholder="Enter nome">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>

                    @else

                    <form action="{{ url('usuarios/add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputNome1">Nome:</label>
                            <input type="text" name="name" class="form-control" id="exampleInputNome1" aria-describedby="emailHelp" placeholder="Enter nome">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
