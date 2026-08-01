<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Repository\ProductImageRepository;
use App\Domains\Catalog\Services\ProductImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreProductImageRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;



class ProductImageController extends Controller
{
    public function __construct(protected ProductImageRepository $repository, protected ProductImageService $service){}

    public function store(StoreProductImageRequest $request)
    {
        $this->service->execute($request->toDTO());
        Inertia::flash('toast', ['type' => 'success', 'message' => __("Image uploaded successfully.")]);
        return to_route('catalog.product');

    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
