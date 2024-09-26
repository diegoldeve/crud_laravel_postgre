<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
          body{
            font-family: 'Figtree', sans-serif;
          }
          img{
            width: 100px;
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
        <h2 class="title">Tienda Axel</h2>
        <a href="agregar_producto" ><button class="btn btn-add">Agregar producto</button></a>
        {{-- tabla con id, name, price, is_unique, stock, image --}}
        <table>
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Es único</th>
                  <th>Stock</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($products as $product)
                  <tr>
                      <td>{{ $product->id }}</td>
                      <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" /></td>                      <td>{{ $product->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->is_unique=='1'? 'Sí': 'No' }}</td>
                      <td>{{ $product->stock }}</td>
                      <td>
                        <form action="{{route('edit_product',['id'=>$product->id])}}" method="get">
                          @csrf
                          <button class="btn btn-editar">Editar</button>
                        </form>
                        <form action="{{route('delete_product', ['id'=>$product->id])}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-eliminar">Eliminar</button>
                        </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
    </body>
</html>
