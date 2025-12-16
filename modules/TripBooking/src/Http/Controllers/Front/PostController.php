<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Illuminate\Http\Request;
use Modules\TripBooking\src\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Post;
use Modules\TripBooking\src\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('name','id');
        $datas = Post::where('slug', '<>', 'gioi-thieu')->orderBy('id', 'desc')->get();
        return view('TripBooking::front.post_list', compact('datas', 'categories'));
    }

    public function detail($slug)
    {
        $post_single = Post::where('slug', $slug)->first();
        $post_single->total_view += 1;
        $post_single->update();

        return view('TripBooking::front.post_detail', compact('post_single'));
    }
}
