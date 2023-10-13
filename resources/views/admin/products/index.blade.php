@extends('layouts.admin')

@section('content')

	<div class="d-flex justify-content-between align-items-center my-4">
		<h4>Producten</h4>
		<div>
			<a href="{{ route('admin.products.create') }}">Nieuw product toevoegen</a>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<tr>
			<th>Titel</th>
			<th>Prijs</th>
            <th>Categorie</th>
			<th colspan="4">&nbsp;</th>
		</tr>
		@foreach($products as $product)
			<tr>
				<td>{{ $product->title }}</td>
				<td>&euro;{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
				<td>
					@if($product->active)
						<span class="badge badge-success">Zichtbaar</span>
					@else
						<span class="badge badge-light">Onzichtbaar</span>
					@endif
				</td>
				<td>
					@if($product->leiding)
						<span class="badge badge-info">Leiding</span>
					@else
						<span class="badge badge-primary">Leden</span>
					@endif
				</td>
				<td>
					<a href="{{ route('admin.products.edit', $product->id) }}">Aanpassen</a>
				</td>
				<td>
					<a href="{{ route('admin.products.types', $product->id) }}">Soorten en maten</a>
				</td>
			</tr>
		@endforeach
	</table>
@endsection
