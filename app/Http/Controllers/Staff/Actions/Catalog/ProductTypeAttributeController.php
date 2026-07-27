<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\ProductTypeAttributeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreProductTypeAttributeRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ProductTypeAttributeController extends Controller
{
    public function __construct(
        protected ProductTypeAttributeService $service
    ) {}


    public function store(StoreProductTypeAttributeRequest  $request){

        $this->service->execute(
            $request->toDTO()
        );

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Product Type Attribute created successfully.'),
        ]);

        return to_route('catalog.product-type-attribute');
  
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
