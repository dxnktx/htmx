<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Modules\TripBooking\src\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Post;
use Modules\TripBooking\src\Models\Gallery;
use Modules\TripBooking\src\Repositories\Post\PostRepositoryInterface;
use Modules\TripBooking\src\Repositories\Banner\BannerRepositoryInterface;
use Modules\TripBooking\src\Repositories\Partner\PartnerRepositoryInterface;
use Modules\TripBooking\src\Repositories\Gallery\GalleryRepositoryInterface;

class HomeController extends Controller
{
    private $postRepository;
    private $bannerRepository;
    private $partnerRepository;
    private $galleryRepository;

    public function __construct(PostRepositoryInterface $postRepository, BannerRepositoryInterface $bannerRepository, PartnerRepositoryInterface $partnerRepository, GalleryRepositoryInterface $galleryRepository)
    {
        $this->postRepository = $postRepository;
        $this->bannerRepository = $bannerRepository;
        $this->partnerRepository = $partnerRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function index()
    {
        $banners = $this->bannerRepository->all();
        $posts = Post::where('slug', '<>', 'gioi-thieu')->orderBy('created_at', 'desc')->take(6)->get();
        return view('TripBooking::front.home', compact('banners', 'posts'));
    }

    public function intro()
    {
        $post_single = Post::where('slug', 'gioi-thieu')->first();
        if($post_single) :
            $post_single->total_view += 1;
            $post_single->update();
            return view('TripBooking::front.post_detail', compact('post_single'));
        else :
            return view('TripBooking::front.intro');     
        endif;
    }

    public function gallery()
    {        
        $galleries = Gallery::groupBy('album')->get();//$this->galleryRepository->all();
        return view('TripBooking::front.gallery', compact('galleries'));
    }

    public function activity()
    {
        return view('TripBooking::front.activity');     
    }

    public function news()
    {
        return view('TripBooking::front.news');      
    }

    public function contact()
    {
        return view('TripBooking::front.contact');
    }

    public function switchLanguage($language)
    {
        session()->put('website_language', $language);

        return redirect()->back();
    }
}
