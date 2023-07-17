@extends('layouts.main')

@section('title', 'Algum título')

@section('content')
    <div class="button-container">
        <button onclick="window.location.href='/login'">Login</button>
        <button onclick="window.location.href='/register'">Cadastro</button>
    </div>
@endsection
