@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">Categorieën</h1>
    <ul class="list-group mt-3">
        @foreach ($categories as $category)
            <li class="list-group-item">
                <a href="{{ route('products.category', $category->id) }}" class="text-decoration-none">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>


	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
                            <?php
                            $korting = $product->discount;

                            if ($korting > 0) {
                                echo '<p class="korting-text">Nu is er <span class="korting-value">' . $korting . '%</span> korting!</p>';
                            }
                            ?>
						@endunless
					</div>


					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection
