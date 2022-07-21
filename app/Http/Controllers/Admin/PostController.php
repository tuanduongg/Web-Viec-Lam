<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPosts;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

class PostController extends Controller
{
    private $model;
    private $table;
    public function __construct()
    {

        $this->model = new Post();
        $this->table = $this->model->getTable();
        View::share([
            'tittle' => ucwords($this->table),
            'table' => $this->table,
        ]);
    }
    public function index()
    {
        $languages = $this->model::groupBy('language')
            ->select('language')
            ->pluck('language');
        $status = [
            0 => 'Closed',
            1 => 'Live',
            2 => 'Peding',
        ];
        return view('admin.posts.index', [
            'languages' => $languages,
            'status' => $status,
        ]);
    }

    public function fetch()
    {
        return Datatables::of($this->model::query())
            ->editColumn('user_id', function (Post $post) {
                $user = User::findOrFail($post->user_id);
                return '<a href="http://webvieclam.test/admin/users?role=+&q=' . $user->id . '" target="_blank">' . $user->name . '</a>';
            })
            ->editColumn('salary', function (Post $post) {
                return $post->fomat_salary . ' vnđ';
            })
            ->editColumn('created_at', function (Post $post) {
                return date_format($post->created_at, "d/m/Y H:m:s");
            })
            ->editColumn('remote', function (Post $post) {
                return $post->remote === 1 ?  'X' : '';
            })
            ->editColumn('parttime', function (Post $post) {
                return $post->parttime === 1 ? 'X' : '';
            })
            ->editColumn('status', function (Post $post) {
                if ($post->status === 0) {
                    return '<span style="color: red;font-weight: bold;">Closed</span>';
                } elseif ($post->status === 1) {
                    return '<span style="color: green; font-weight: bold;">Live</span>';
                } else {
                    return '<span style="color: blue;font-weight: bold;">Pending</span>';
                }
            })
            ->addColumn('edit', 'Edit')
            ->editColumn('edit', function (Post $post) {
                return '<button class="btn btn-success" data-toggle="modal" data-target="#modal-lg" id="btn-edit" data-id=' . $post->id . ' >Edit</button>';
            })
            ->addColumn('delete', 'delete')
            ->editColumn('delete', function (Post $post) {
                return "<button class='btn btn-danger' id='btn-delete'  data-id='$post->id' >Delete</button>";
            })
            ->rawColumns([
                'user_id',
                'status',
                'edit',
                'delete',
            ])
            ->make(true);
    }

    public function show($postID)
    {
        $post = $this->model->findOrFail($postID);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $obj = $this->model::findOrFail($id);
        $obj->fill($request->except(['_token', 'method']));
        $obj->save();
        return response()->json([
            'message' => 'Updated',
        ]);
    }

    public function destroy($postID)
    {
        $post = $this->model->findOrFail($postID);
        UserPosts::where('post_id', $postID)->delete();
        $post->delete();
        return response()->json(['message' => 'Removed']);
    }
}
