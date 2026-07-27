<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\AttributeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreAttributeRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;



class AttributeController extends Controller
{
    public function __construct(
        protected AttributeService $service
    ) {}

    public function store(StoreAttributeRequest $request){
        $this->service->execute(
            $request->toDTO()
        );

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Attribute created successfully.'),
        ]);

        return to_route('catalog.attribute');
        return to_route('catalog.attribute');
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
