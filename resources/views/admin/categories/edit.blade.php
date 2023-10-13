@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-left">Categorie aanpassen</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row justify-content-center"> <!-- Plaats de hele rij in het midden -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" style="width: 50%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="products"style="font-weight: bold;">Producten</label>
                    <ul >
                        @foreach ($products as $product)
                            <li>{{ $product->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row justify-content-left"> <!-- Plaats de knop in het midden -->
            <div class="col-md-6">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block">Opslaan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
