<?php

namespace Modules\TripBooking\src\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Category;
use Modules\TripBooking\src\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $datas = $this->categoryRepository->all();
        return view('TripBooking::category.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->route('category_index')->with('success', __('Data is deleted successfully.'));
    }
}
