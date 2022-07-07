<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminProductRequest;

class DashboardProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['galleries','category'])
                            ->where('users_id',Auth::user()->id)
                            ->get();

        return view('pages.dashboard-products',[
            'products' => $products
        ]);
    }

    //detail product
    public function details(Request $request, $id)
    {
        $product = Product::with((['galleries','user','category']))->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    //upload foto galery
    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product','public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-detail', $request->products_id);
    }

    //delete foto gallery
    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);

        $item->delete();

        return redirect()->route('dashboard-product-detail', $item->products_id);
    }

    //tambah
    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard-products-create', [
            'categories' => $categories
        ]);
    }

    //store
    public function store(AdminProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    //update data
    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-product');
    }
}
