<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    
    public function index(Request $request)
    {
        
        $users = User::count();
        $hr = User::where('role', '1')->count();
        $posts = Post::count();
        $postsPending = Post::where('status', '2')->count();
        return view('admin.dashboard', [
            'users' => $users,
            'posts' => $posts,
            'postsPending' => $postsPending,
            'hr' => $hr,
        ]);
    }

    public function getDataDonutchart()
    {
        $data = Post::query()
            ->select(DB::raw('posts.language,COUNT(id) as total_id'))
            ->groupBy('language')
            ->get();
        return response()->json($data);
    }

    public function getDataBarChart(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');
        $lastDayOfMonth = 0;
        if ($month == date('m') && $year == date('Y')) { //nếu là  tháng hiện tại, năm hiện tại => lấy ngày hiện tại 
            $lastDayOfMonth = date('d');
        } else { // lấy ngày cuối cùng của tháng đó
            $dateString = $year . '-' . $month . '-1';
            $date =  date("Y-m-t", strtotime($dateString));
            $lastDayOfMonth = explode('-', $date)[2];
        }
        for ($i = 1; $i <= $lastDayOfMonth; $i++) {
            $arrResult[$i]['post'] = 0;
            $arrResult[$i]['user'] = 0;
        }
        $dataPost = Post::query()
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdDate,Count(id) as total'))
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->get();
        $dataUser = User::query()
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdDate,Count(id) as total'))
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->get();
        $dataMer['post'] = $dataPost->toArray();
        $dataMer['user'] = $dataUser->toArray();

        foreach ($dataMer as $key => $value) {
            foreach ($value as  $item) {
                $date = date('d', strtotime($item['createdDate']));
                $arrResult[(int)$date][$key] = $item['total'];
            }
        }
        // return $arrResult;
        return response()->json($arrResult);
    }
}
