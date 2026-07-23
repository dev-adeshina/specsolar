<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\BrandService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreBrandRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;



class BrandController extends Controller
{
    public function __construct(protected BrandService $service){}
    public function store(StoreBrandRequest $request)
    {
        $this->service->execute($request->toDTO());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Brand created successfully.'),
        ]);

        return to_route('catalog.brands');
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
