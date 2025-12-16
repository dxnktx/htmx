<?php

namespace Modules\TripBooking\src\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $datas = $this->postRepository->all();
        return view('TripBooking::post.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('post_index')->with('success', __('Data is deleted successfully.'));
    }
}
