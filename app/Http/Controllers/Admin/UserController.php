<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private $model;
    private $table;
    public function __construct()
    {

        $this->model = new User();
        $this->table = (new User())->getTable();
        View::share([
            'tittle' => ucwords($this->table),
            'table' => $this->table,
        ]);
        // dd($this->table);
    }
    public function index(Request $request)
    {
        $arrRole = [0 => 'Aplicants', 1 => 'HR'];

        $search = $request->get('q');
        $role = $request->get('role');
        $query = $this->model::query()
        ->where('id', 'like', '%' . $search . '%')
        // ->where('role ','<',2)
        ->latest();
        if ((string)$role != '') {
            $query->where('role', $role);
        }
        $users = $query
        ->where('role','<>',2)
        ->paginate(10);

        $users->appends(['q' => $search]);
        $users->appends(['role' => $role]);
        return view("admin.$this->table.index", [
            'users' => $users,
            'search' => $search,
            'arrRole' => $arrRole,
            'selectedRole' => $role,
        ]);
    }
    public function show($id)
    {
        $user = $this->model::findOrFail($id);
        return response()->json([
            'user' => $user,
        ]);
    }

    public function fetchUsers()
    {
        $users = $this->model::latest()->all();
        return response()->json([
            'users' => $users,
        ]);
    }
    public function edit($id)
    {
        $value = $this->model::findOrFail($id);
        return  response()->json($value);
    }
    public function update(Request $request, $id)
    {
        $arrRule = [
            'name' => 'bail|required',
            'email' => 'required|email',
            // 'password' => 'required|min:4',
        ];
        // $arrRuleMessage = [
        //     'name.required' => 'Bắt buộc phải điền tên!',
        //     'email.required' => 'Bắt buộc điền email!',
        //     'email.email' => 'Điền đúng định dạng email!',
        //     // 'password.required' => 'Bắt buộc điền password!',
        //     // 'password.min' => 'Password có ít nhất 4 ký tự!',
        // ];

        if(!empty($request->get('phone'))) {
            $arrRule['phone'] = ['regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'];
            // $arrRuleMessage['phone.regex'] = 'Không đúng định dạng số điện thoại!';
        }
        $request->validate($arrRule);
        $obj = $this->model::findOrFail($id);
        $obj->fill($request->except(['_token', 'method']));
        $obj->save();
        return  response(1);
    }
    public function destroy($user)
    {
        $value = $this->model::findOrFail($user);
        if ($value->role === 0) { // aplicants
            $isUserPost = UserPosts::where('user_id', '=', $user)->exists();
            if ($isUserPost === true) {
                UserPosts::where('user_id', '=', $user)->delete();
            }
        } else if ($value->role === 1) { //hr
            $isPost = Post::where('user_id', '=', $user)->exists();
            if ($isPost === true) {
                $arrPost_id = Post::where('user_id', '=', $user)->pluck('id');
                UserPosts::whereIn('post_id', $arrPost_id)->delete();
                Post::where('user_id', '=', $user)->delete();
            }
        }
        $value->delete();
        return  redirect()->back();
    }
}
