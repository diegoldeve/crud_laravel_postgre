<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function getProducts()
  {
    $products = ProductModel::all();
    return view('welcome', ['products' => $products]);
  }

  public function addProduct(Request $request)
  {
    $product = new ProductModel();
    $product->name = $request->name;
    $product->price = $request->price;
    $unique = $request->is_unique == '1' ? true : false;
    $product->is_unique = $unique;
    $product->stock = $request->stock;
    // Mover la imagen a la carpeta public->images
    $imageName = $request->image->getClientOriginalName();
    $request->image->move(public_path('images'), $imageName);
    $product->image = $imageName;

    $product->save();
    return redirect('/');
  }

  public function deleteProduct($id)
  {
    $product = ProductModel::find($id);
    $product->delete();
    return redirect('/');
  }

  public function editProduct($id)
  {
    $product = ProductModel::find($id);
    return view('edit_product', ['product' => $product]);
  }

  public function updateProduct(Request $request, $id)
  {
    $product = ProductModel::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $unique = $request->is_unique == '1' ? true : false;
    $product->is_unique = $unique;
    $product->stock = $request->stock;

    if ($request->hasFile('image')) {
      $imageName = $request->image->getClientOriginalName();
      $request->image->move(public_path('images'), $imageName);
      $product->image = $imageName;
    }

    $product->save();

    return redirect('/');
  }
}
