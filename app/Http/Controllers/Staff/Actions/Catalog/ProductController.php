<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreProductRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;



class ProductController extends Controller
{
    public function __construct(protected ProductService $service){}

    public function store(StoreProductRequest $request)
    {
        $this->service->execute($request->toDTO());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Product created successfully.'),
        ]);

        return to_route('catalog.products');
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
