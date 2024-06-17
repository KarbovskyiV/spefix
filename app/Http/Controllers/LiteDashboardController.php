<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Services\ProductService;
use App\Models\Product;

class LiteDashboardController extends Controller
{
    public function __construct(
        protected ProductService $imageUploadService,
        protected ProductService $productService
    ) {
    }

    public function index()
    {
        $products = Product::all();

        return view('lite_dashboard.index', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $imagePath = $this->imageUploadService->upload($request);

        try {
            $this->productService->createProduct($validated, $imagePath);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }

        return redirect()->route('dashboard.home')->with('success', 'Product created successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.home')->with('success', 'Product deleted successfully.');
    }
}
