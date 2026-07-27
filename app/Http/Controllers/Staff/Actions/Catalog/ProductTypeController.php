<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Repository\ProductTypeRepository;
use App\Domains\Catalog\Services\ProductTypeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreProductTypeRequest;
use App\Http\Requests\Catalog\UpdateProductTypeRequest;
use Inertia\Inertia;



use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function __construct(
        protected ProductTypeRepository $repository,
        protected ProductTypeService $service,
    ) {}

    public function store(StoreProductTypeRequest $request)
    {
        $this->service->execute(
            $request->toDTO()
        );

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('ProductType created successfully.'),
        ]);

        return to_route('catalog.product-type');
    }

    public function update(UpdateProductTypeRequest $request){
        $this->service->execute(
            $request->toDTO()
        );


        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('ProductType updated successfully.'),
        ]);

        return back();
    }

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
