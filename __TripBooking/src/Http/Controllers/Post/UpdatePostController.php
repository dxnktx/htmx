<?php

namespace Modules\TripBooking\src\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Post\UpdatePostRequest;
use Modules\TripBooking\src\Repositories\Post\PostRepositoryInterface;
use Modules\TripBooking\src\Repositories\Category\CategoryRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdatePostController extends Controller
{
    private $postRepository;
    private $categoryRepository;

    public function __construct(PostRepositoryInterface $postRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->postRepository->find($id);
        $categories = $this->categoryRepository->all();
        return view('TripBooking::post.edit', compact('item', 'categories'));
    }

    public function store(UpdatePostRequest $request)
    {
        $this->postRepository->update($request);
        return redirect()->route('post_index')->with('success', __('Data is updated successfully.'));
    }
}
