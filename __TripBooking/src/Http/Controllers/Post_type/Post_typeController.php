<?php

namespace Modules\TripBooking\src\Http\Controllers\Post_type;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Post_type;
use Modules\TripBooking\src\Repositories\Post_type\Post_typeRepositoryInterface;

class Post_typeController extends Controller
{
    private $post_typeRepository;

    public function __construct(Post_typeRepositoryInterface $post_typeRepository)
    {
        $this->post_typeRepository = $post_typeRepository;
    }

    public function index()
    {
        $datas = $this->post_typeRepository->all();
        return view('TripBooking::post_type.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->post_typeRepository->delete($id);
        return redirect()->route('post_type_index')->with('success', __('Data is deleted successfully.'));
    }
}
