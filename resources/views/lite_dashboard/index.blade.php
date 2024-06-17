<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<div class="navbar-nav mx-auto">
    <a href="/" class="mt-3 d-flex justify-content-center">Home</a>
</div>

<form class="w-25 mt-3" style="margin-left: 30%" action="{{ route('products.store') }}" method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-2">
        <label for="name">Product name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
               aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="preview_text">Product preview text</label>
        <input type="text" class="form-control @error('preview_text') is-invalid @enderror" id="preview_text"
               name="preview_text" aria-describedby="emailHelp" placeholder="Enter preview text"
               value="{{ old('preview_text') }}">
        @error('preview_text')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="description">Product description</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
               name="description" aria-describedby="emailHelp" placeholder="Enter description"
               value="{{ old('description') }}">
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="price">Product price</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
               aria-describedby="emailHelp" placeholder="Enter price" value="{{ old('price') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="photo">Photo</label>
        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo"
               aria-describedby="emailHelp">
        @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
<hr>
<ul class="list-group w-25 mt-3" style="margin-left: 10%">
    @foreach($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $product->name }}
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

</body>

</html>
