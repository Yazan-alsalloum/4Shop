@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Nieuwe Categorie Toevoegen</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <!-- Voeg andere invoervelden voor de categorie toe zoals nodig -->

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
