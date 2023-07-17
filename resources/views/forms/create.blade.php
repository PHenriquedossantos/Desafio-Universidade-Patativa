@extends('layouts.main')

@section('Patativa', 'Dashboard')

@section('content')
<div class="preenchimento-container">
    <h1>Preenchimento</h1>
    <form method="post" action="{{route('forms.store')}}">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="subject">Assunto:</label>
            <input type="text" name="subject" id="subject" required>
        </div>

        <div class="form-group">
            <label for="message">Mensagem:</label>
            <textarea name="message" id="message" required></textarea>
        </div>

        <div class="form-group">
            <label for="emails_list">Lista de emails:</label>
            <textarea name="emails_list" id="emails-list" required></textarea>
        </div>
        
        <button type="submit">Salvar</button>
    </form>

    <form action="/logout" method="POST">
        @csrf
        <a href="logout"
            class="nav-link" 
            onclick="event.preventDefault();
            this.closest('form').submit();"
        >
            Sair
        </a>
    </form>
</div>
@endsection
