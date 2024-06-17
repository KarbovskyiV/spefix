<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    public function createProduct(array $data, string $imagePath): Product
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->preview_text = $data['preview_text'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->photo = $imagePath;
        $product->save();

        return $product;
    }

    public function upload(Request $request, string $inputName = 'photo', string $uploadPath = 'images'): string
    {
        if ($request->hasFile($inputName)) {
            $imageName = time() . '.' . $request->file($inputName)->extension();
            $request->file($inputName)->move(public_path($uploadPath), $imageName);
            return $uploadPath . '/' . $imageName;
        }

        return false;
    }
}
