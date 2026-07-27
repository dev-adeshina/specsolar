<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Services\AttributeGroupService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreAttributeGroupRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;




class AttributeGroupController extends Controller
{
    public function __construct(protected AttributeGroupService $service){}

    public function store(StoreAttributeGroupRequest $request)
    {

        $this->service->execute(
            $request->toDTO()
        );

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Attribute Group created successfully.'),
        ]);

        return to_route('catalog.attribute-group');
        
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
