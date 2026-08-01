<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Domains\Catalog\Repository\SeoRepository;
use App\Domains\Catalog\Services\SeoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreSeoRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;




class SeoController extends Controller
{
    public function __construct(
        protected SeoRepository $repository,
        protected SeoService $createService,
        // protected UpdateSeoService $updateService,
    ) {}

    public function store(StoreSeoRequest $request, int $productId)
    {
        $this->createService->execute(
            dto: $request->toDTO(),
            productId: $productId,
        );

        Inertia::flash('toast', ['type' => 'success', 'message' => __('SEO created successfully.')]);

        return to_route('catalog.product');
    }


    // public function update(UpdateSeoRequest $request, int $productId): RedirectResponse
    // {
    //     $this->updateService->execute(
    //         dto: $request->toDTO(),
    //         productId: $productId,
    //     );

    //     Inertia::flash('toast', ['type' => 'success', 'message' => __('SEO updated successfully.')]);

    //     return to_route('catalog.products.show', ['product' => $productId]);
    // }

}
