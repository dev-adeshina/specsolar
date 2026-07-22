<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Domains\Catalog\Models\Category;
use App\Domains\Catalog\Models\Brand;
use App\Domains\Catalog\Models\ProductType;
use App\Domains\Catalog\Models\AttributeGroup;
use App\Domains\Catalog\Models\Attribute;
use App\Domains\Catalog\Models\ProductTypeAttribute;
use App\Domains\Catalog\Models\Tag;
use App\Domains\Catalog\Models\Warehouse;
use App\Domains\Catalog\Models\Product;
use App\Domains\Catalog\Models\ProductVariant;


class CatalogController extends Controller
{
    //

    public function categories()
    {
       
        return Inertia::render('admin/catalog/categories', ['categories' => Category::all()]);
    }


    public function brands() 
    {
        return Inertia::render('admin/catalog/brands', ['brands' => Brand::all()]);
    }

    public function productType()
    {
        return Inertia::render('admin/catalog/product-type', ['product-type' => ProductType::all()]);
    }

    public function attributeGroup()
    {
        return Inertia::render('admin/catalog/attribute-group', ['attribute-group' => AttributeGroup::all()]);
    }

    public function attribute() 
    {
        return Inertia::render('admin/catalog/attribute', ['attribute' => Attribute::all()]);
    }

    public function productTypeAttribute()
    {
        return Inertia::render('admin/catalog/product-type-attribute', ['product-type-attribute' => ProductTypeAttribute::all()]);
    }

    public function tag() 
    {
        return Inertia::render('admin/catalog/tag', ['tag' => Tag::all()]);
    }


    public function warehouse() 
    {
        return Inertia::render('admin/catalog/warehouse', ['warehouse' => Warehouse::all()]);
    }

    public function product()
    {
        return Inertia::render('admin/catalog/product', ['product' => Product::all()]);
    }

    public function productVariant()
    {
        return Inertia::render('admin/catalog/product-variant', ['productVariant' => ProductVariant::all()]);
    }
}
