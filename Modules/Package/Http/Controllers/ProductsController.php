<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Upload\Entities\Upload;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Modules\Package\Entities\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Package\DataTables\ProductsDataTable;

class ProductsController extends Controller
{

    public function index(ProductsDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('package::products.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('package::products.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_customers'), 403);

        $request->validate([
            // 'product_name'        => 'required|max:255',
            // 'product_cost'        => 'required',
            // 'product_price1'      => 'required',
            // 'product_price2'      => 'required',
            // 'product_price3'      => 'required',
            // 'product_price4'      => 'required',
            // 'product_category'    => 'required',
            // 'product_active'      => 'required',
        ]);

        $product = Product::create([
            'product_name'        => $request->product_name,
            'product_cost'        => $request->product_cost,
            'product_price1'      => $request->product_price1,
            'product_price2'      => $request->product_price2,
            'product_price3'      => $request->product_price3,
            'product_category'    => $request->product_category,
            'product_active'      => $request->product_active
        ]);

        if ($request->has('document')) {
            foreach ($request->input('document') as $file) {
                $product->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('products');
            }
        }

        toast('Data Layanan Created!', 'success');

        return redirect()->route('products.index');
    }


    public function show(Product $product) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('package::products.show', compact('product'));
    }


    public function edit(Product $product) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('package::products.edit', compact('product'));
    }


    public function update(Request $request, Product $product) {
        abort_if(Gate::denies('edit_customers'), 403);

        $request->validate([
            // 'product_name'        => 'required|max:255',
            // 'product_cost'        => 'required',
            // 'product_price1'      => 'required',
            // 'product_price2'      => 'required',
            // 'product_price3'      => 'required',
            // 'product_price4'      => 'required',
            // 'product_category'    => 'required',
            // 'product_active'      => 'required',
        ]);

        $product->update([
            'product_name'        => $request->product_name,
            'product_cost'        => $request->product_cost,
            'product_price1'      => $request->product_price1,
            'product_price2'      => $request->product_price2,
            'product_price3'      => $request->product_price3,
            'product_category'    => $request->product_category,
            'product_active'      => $request->product_active
        ]);

        if ($request->has('document')) {
            if (count($product->getMedia('products')) > 0) {
                foreach ($product->getMedia('products') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $product->getMedia('products')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $product->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('products');
                }
            }
        }

        toast('Data Layanan Updated!', 'info');

        return redirect()->route('products.index');
    }


    public function destroy(Product $product) {
        abort_if(Gate::denies('delete_customers'), 403);

        $product->delete();

        toast('Data Layanan Deleted!', 'warning');

        return redirect()->route('products.index');
    }


}
