@extends('layout')

@section('content')
<div class="container">
    <h1>Contactez-nous</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/contact') }}" method="POST">
        @csrf {{-- Protection CSRF --}}

        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Ajoutez ici les autres champs nécessaires --}}

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
