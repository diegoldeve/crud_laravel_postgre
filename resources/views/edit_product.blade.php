<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda | Editar producto</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
          body{
            font-family: 'Figtree', sans-serif;
          }
          input{
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid #ccc;
          }
          form{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 2rem;
            gap:10px;
          }
          .unico{
            display: flex;
            gap: 10px;
          }
          .btn{
            font-family: 'Figtree', sans-serif;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
          }
          .btn-editar{
            background-color: #daff20;
          }
          .btn-eliminar{
            background-color: #de3933;
          }
          .btn-add{
            background-color: #20a9ff;
            color: white;
            margin: 1rem;
          }
        .title{
            font-family: 'Figtree', sans-serif;
            font-size: 2rem;
            color: #FF2D20;
            text-align: center;
            margin-top: 2rem;
        }
        table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #ddd;
    }
        </style>
    </head>
    <body>
              <h2 class="title">Editar producto {{$product->name}}</h2>
        <a href="/" ><button class="btn btn-add">Regresar</button></a>
        <form action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Esto es importante para indicar que es una actualización -->
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>

            <div class="unico">
                <label for="is_unique_yes">¿Es único?</label>
                <input type="radio" name="is_unique" id="is_unique_yes" value="1" {{ $product->is_unique ? 'checked' : '' }} required>
                <label for="is_unique_yes">Sí</label>
                <input type="radio" name="is_unique" id="is_unique_no" value="0" {{ !$product->is_unique ? 'checked' : '' }} required>
                <label for="is_unique_no">No</label>
            </div>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>

            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">

            <button class="btn btn-add" type="submit">Actualizar</button>
        </form>
    </body>
</html>
