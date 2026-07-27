<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function store(){
        return to_route('catalog.product-variant');
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
