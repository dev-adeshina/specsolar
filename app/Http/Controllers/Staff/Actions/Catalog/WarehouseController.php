<?php

namespace App\Http\Controllers\Staff\Actions\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function store(){
        return to_route('catalog.warehouse');
    }

    public function update(){}

    public function  destroy(){}

    public function  restore(){}

    public function  archive(){}

    public function  duplicate(){}
}
