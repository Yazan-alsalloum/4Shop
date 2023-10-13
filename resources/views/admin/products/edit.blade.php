@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center flex-column my-5">

	<form action="{{ route('admin.products.update', $product) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

		<h4>Product aanpassen</h4>

		<div class="form-group">
			<label for="title">Titel</label>
			<input type="text" id="title" name="title" class="form-control" value="{{ old('title', $product->title) }}">
		</div>
    <div class="form-group">
            <label for="category_id">Categorie</label>
            <select id="category_id" name="category_id" class="form-control">
                <option value="" selected>Kies een categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id', $product->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
		<div class="form-group">
			<label for="price">Prijs</label>
			<div class="input-group mb-2">
		        <div class="input-group-prepend">
		        	<div class="input-group-text">&euro;</div>
		        </div>
				<input type="number" min="0" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}">
			</div>
		</div>
		<div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active1" value="1" @if(old('active', $product->active)) checked @endif>
				<label class="form-check-label" for="active1">Zichtbaar</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active0" value="0" @if(!old('active', $product->active)) checked @endif>
				<label class="form-check-label" for="active0">Onzichtbaar</label>
			</div>
		</div>
		<div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="leiding" id="leiding1" value="1" @if(old('leiding', $product->leiding)) checked @endif>
				<label class="form-check-label" for="leiding1">Leiding</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="leiding" id="leiding0" value="0" @if(!old('leiding', $product->leiding)) checked @endif>
				<label class="form-check-label" for="leiding0">Leden en leiding</label>
			</div>
		</div>
		<div class="form-group">
			<input type="file" id="image" name="image" accept="image/png, image/jpeg">
		</div>

		<div class="form-group">
			<label for="description">Beschrijving</label>
			<textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description', $product->description) }}</textarea>
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
	</form>
	<form action="{{ route('admin.products.destroy', $product) }}" method="POST">
		<button type="submit" class="form-control btn btn-outline-danger">Verwijderen</button>
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
</div>

@endsection
