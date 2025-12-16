<?php

namespace Modules\TripBooking\src\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Category\UpdateCategoryRequest;
use Modules\TripBooking\src\Repositories\Category\CategoryRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateCategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->categoryRepository->find($id);
        return view('TripBooking::category.edit', compact('item'));
    }

    public function store(UpdateCategoryRequest $request)
    {
        $this->categoryRepository->update($request);
        return redirect()->route('category_index')->with('success', __('Data is updated successfully.'));
    }
}
