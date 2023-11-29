<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $late_products = Product::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $sale = Sale::find(1);
        $sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['sliders'=>$sliders,
            'late_products'=>$late_products,'categories'=>$categories,'no_of_products'=>$no_of_products,
            'sproducts' => $sproducts,'sale'=>$sale])->layout('layouts.base');
    }
}
