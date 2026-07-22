<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Repository\CategoryRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreCategoryRequest;
use Illuminate\Http\RedirectResponse;
use App\Domains\Catalog\Services\CategoryService;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(protected CategoryRepository $repository, protected CategoryService $service){}

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $this->service->execute($request->toDTO());
        Inertia::flash('toast', ['type' => 'success', 'message' => __("Category created successfully.")]);
        return to_route('catalog.categories');

    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}