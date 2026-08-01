<?php 


namespace App\Domains\Catalog\Services;

use App\Domains\Catalog\DTOs\SeoDTO;
use App\Domains\Catalog\Models\Seo;
use App\Domains\Catalog\Repository\SeoRepository;
use Illuminate\Support\Facades\DB;



class SeoService 
{
    public function __construct(protected SeoRepository $repository){}

    public function execute(SeoDTO $dto, int $productId): Seo
    {
        return DB::taransction(function () use ($dto,  $productId) {
            $seo = $this->repository->store($dto);

            $seo->forceFill(['product_id' => $productId])->save();
            return $seo;

        });
    }
}