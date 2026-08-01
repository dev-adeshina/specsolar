<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\ProductPriceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreProductPriceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;



class ProductPriceController extends Controller
{
    public function __construct(protected ProductPriceService $service){}

    public function store(StoreProductPriceRequest $request)
    {
        Log::info(['price' => $request->toDTO()]);
        $this->service->execute($request->toDTO());
        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Product Price created successfully.'),
        ]);

        return to_route('catalog.product');
    }
}
