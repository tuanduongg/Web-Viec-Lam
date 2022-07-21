<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPosts;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    public function show($userId)
    {
        $data = UserPosts::query()
            ->join('posts', 'posts.id', '=', 'user_posts.post_id')
            ->where('user_posts.user_id', $userId)
            ->select([
                'posts.job_tittle',
                'user_posts.*',
            ])
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function updateStatus(Request $request, $user_id)
    {
        $post_id = $request->get('post_id');
        $type = $request->get('type');
        $query = UserPosts::query()
            ->where('user_id', $user_id)
            ->where('post_id', $post_id);
        if($type == 2) {
            // return response()->json([
            //     'message' => $type . ' Vào đây',
            // ], 200);
            $query->update([
                    'status' => 2,
                ]);
        }elseif($type == 0) {
            $query->update([
                'status' => 0,
            ]);
        }
        return response()->json([
            'message' => $type,
        ], 200);
    }
    public function updateStatusCancel(Request $request, $user_id)
    {
        $post_id = $request->get('post_id');
        UserPosts::query()
            ->where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->update([
                'status' => 0,
            ]);
        return response()->json([
            'message' => 'Thành Công',
        ], 200);
    }

    public function cancelPost(Request $request, $postId)
    {
        $userId = $request->get('user_id');
        UserPosts::query()
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->update(['status' => 0]);
        return response()->json("Thành Công!");
    }
    public function applyNow(Request $request, $postId)
    {
        $userId = $request->get('user_id');
        $role = User::query()
        ->where('id' ,$userId)
        ->get('role')[0] -> role;
        if($role == 0) {

            $isExists = UserPosts::query()
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->first();
            if ($isExists == null) {
                $object = new UserPosts();
                $object->post_id = $postId;
                $object->user_id = $userId;
                $object->status = 1;
                $object->save();
                return response()->json("Thành Công!");
            }
            return response()->json([
                'message' => 'Bạn đã ứng tuyển công việc rồi'
            ], 400);
        }
        return response()->json([
            'message' => 'Không Thể Ứng Tuyển'
        ],400);
        // return $role;
    }
}
