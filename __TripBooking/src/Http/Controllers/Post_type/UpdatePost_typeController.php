<?php

namespace Modules\TripBooking\src\Http\Controllers\Post_type;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Post_type\UpdatePost_typeRequest;
use Modules\TripBooking\src\Repositories\Post_type\Post_typeRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdatePost_typeController extends Controller
{
    private $post_typeRepository;

    public function __construct(Post_typeRepositoryInterface $post_typeRepository)
    {
        $this->post_typeRepository = $post_typeRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->post_typeRepository->find($id);
        return view('TripBooking::post_type.edit', compact('item'));
    }

    public function store(UpdatePost_typeRequest $request)
    {
        $this->post_typeRepository->update($request);
        return redirect()->route('post_type_index')->with('success', __('Data is updated successfully.'));
    }
}
