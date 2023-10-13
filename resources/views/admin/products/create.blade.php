@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5">

	<form action="{{ route('admin.products.store') }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

		<h4>Nieuw product</h4>

		<div class="form-group">
			<label for="title">Titel</label>
			<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
		</div>
        <div class="form-group">
			<label for="category_id">Categorie</label>
			<select id="category_id" name="category_id" class="form-control">
				<option value="" selected>Kies een categorie</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="price">Prijs</label>
			<div class="input-group mb-2">
		        <div class="input-group-prepend">
		        	<div class="input-group-text">&euro;</div>
		        </div>
				<input type="number" min="0" id="price" name="price" class="form-control" value="{{ old('price') }}">
			</div>
		</div>
		<div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active1" value="1">
				<label class="form-check-label" for="active1">Zichtbaar</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active0" value="0">
				<label class="form-check-label" for="active0">Onzichtbaar</label>
			</div>
		</div>
		<div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="leiding" id="leiding1" value="1">
				<label class="form-check-label" for="leiding1">Leiding</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="leiding" id="leiding0" value="0">
				<label class="form-check-label" for="leiding0">Leden en leiding</label>
			</div>
		</div>
		<div class="form-group">
			<input type="file" id="image" name="image" accept="image/png, image/jpeg">
		</div>

		<div class="form-group">
			<label for="description">Beschrijving</label>
			<textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
	</form>
</div>

@endsection
