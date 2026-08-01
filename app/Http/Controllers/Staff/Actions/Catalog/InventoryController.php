<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\InventoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreInventoryRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function __construct(protected InventoryService $service){}

    public function store(StoreInventoryRequest $request) 
    {
        $this->service->execute($request->toDTO());
        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Inventory created successfully.'),
        ]);

        return to_route('catalog.product');
    }
}
