<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HrController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $posts = Post::query()
            ->where('user_id', $user_id)
            ->latest()
            ->paginate(10);

        $numberUser = HrController::countUsersApply();

        // return dd($numberUser);
        return view('client.hr.listpost', [
            'posts' => $posts,
            'numberUser' => $numberUser,
        ]);
    }

    public function countUsersApply()
    {
        $user_id = auth()->id();
        $numberUser = Post::query()
            ->select(DB::raw('posts.id,COUNT(user_posts.user_id) as numberUser'))
            ->leftJoin('user_posts', 'posts.id', '=', 'user_posts.post_id')
            ->where('posts.user_id', $user_id)
            ->groupBy('posts.id')
            ->get();
        $arr = [];
        foreach ($numberUser as $value) {
            $arr[$value->id] = $value->numberUser;
        }
        return $arr;
    }

    public function getUserPosts($post_id)
    {
        // $post_id = $request->get('post_id');
        $data = User::query()
            ->select(DB::raw('user_posts.user_id,users.name,users.email,user_posts.created_at,user_posts.status'))
            ->Join('user_posts', 'users.id', '=', 'user_posts.user_id')
            ->where('user_posts.post_id', $post_id)
            ->groupBy('user_posts.user_id','user_posts.created_at','user_posts.status')
            ->latest()
            ->get();

        // return $data;
        // SELECT users.id,users.name,users.email,user_posts.created_at FROM users 
        // LEFT JOIN user_posts on users.id = user_posts.user_id 
        // WHERE user_posts.post_id = 1012
        // GROUP BY users.id;
        return response()->json([
            "data" => $data,
        ]);


    }

    // public function acceptUserPosts($user_id) {
        
    // }
}
