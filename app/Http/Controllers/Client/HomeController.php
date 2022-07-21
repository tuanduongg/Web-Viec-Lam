<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getArrLanguages()
    {
        $arrLanguage = Post::query()
            ->select(DB::raw('posts.language,COUNT(id) as total_id'))
            ->groupBy('language')
            ->take(8)
            ->get();
        return $arrLanguage;
    }
    public function getArrPosts()
    {
        $arrPost = Post::query()
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select([
                'posts.job_tittle',
                'posts.id',
                'posts.user_id',
                'posts.salary',
                'posts.city',
                'posts.created_at',
                'users.name as company',
                ])
            ->inRandomOrder()
            ->take(4)
            ->get();
        return $arrPost;
    }
    public function getAllCity() {
        $arrCity = Post::query()
            ->groupBy('city')
            ->get('city');
        return $arrCity;
    }

    public function index()
    {
        $arrLanguage = HomeController::getArrLanguages();
        $arrCity = HomeController::getAllCity();
        $arrPost = HomeController::getArrPosts();
        return view('client.home',[
            'arrLanguage' => $arrLanguage,
            'arrPost' => $arrPost,
            'arrCity' => $arrCity,
        ]);
    }
}
