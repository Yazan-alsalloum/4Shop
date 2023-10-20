@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">Price: &euro;{{ $product->price }}</p>
                        @if ($product->discount > 0)
                            <p class="card-text">Discount: {{ $product->discount }}%</p>
                        @endif
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
