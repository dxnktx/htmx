<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Modules\TripBooking\src\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\TripBooking\src\Models\Category;

class CategoryController extends Controller
{

    public function detail($slug)
    {
        $category_single = Category::where('slug', $slug)->first();
        return view('TripBooking::front.category', compact('post_single'));
    }

    public function categories()
    {
        $categories = Category::withCount('r')->orderBy('r_post_count', 'desc')->get();
        return view('TripBooking::front.categories', compact('job_categories', 'job_category_page_item'));
    }
}
