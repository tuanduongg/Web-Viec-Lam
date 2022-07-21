<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->get('l');
        $city = $request->get('c');
        $salaryRequest = $request->get('s');
        $search= $request->get('q');
        
        if (!empty($salaryRequest)) {
            $salary =  explode('-', $salaryRequest);
            $salaryFrom = $salary[0] . '000000';
            $salaryTo = $salary[1] . '000000';
        }

        $query = Post::query()
            ->where('status', '1')
            ->where('job_tittle', 'like', '%' . $search. '%');

        if (!empty($language)) {
            $query->where('language','like', '%' . $language . '%');
        }
        if (!empty($salary)) {
            $query->whereBetween('salary', [$salaryFrom, $salaryTo])->orderBy('salary', 'asc');
        }
        if (!empty($city)) {
            $query->where('city', 'like', '%' . $city . '%');
        }

        $remote = $request->get('remote') ?? '';
        $parttime = $request->get('parttime') ?? '';
        if (!empty($remote)) {
            $query->where('remote', '1');
        }
        if (!empty($parttime)) {
            $query->where('parttime', '1');
        }
        $posts = $query
            ->inRandomOrder()
            ->paginate(10);
        $posts->appends([
            'language' => $language,
            'city' => $city,
            'salary' => $salaryRequest,
            'remote' => $remote,
            'parttime' => $parttime,
            'q' => $search,
        ]);

        $maxSalary = Post::max('salary'); //get max salary in db
        $arrSalary = [
            '0-5' => 'Dưới 5tr',
            '5-10' => 'Từ 5tr-10tr',
            '10-20' => 'Từ 10tr-20tr',
            '20-25' => 'Từ 20tr-25tr',
            "25-$maxSalary" => "Trên 25tr",
        ];
        $arrCity = $this->getAllCity();
        $arrLanguage = $this->getAlllanguage();

        return view('client.jobs.index', [
            'posts' => $posts,
            'arrLanguage' => $arrLanguage,
            'selectedLanguage' => $language,
            'arrCity' => $arrCity,
            'selectedCity' => $city,
            'arrSalary' => $arrSalary,
            'selectedSalary' => $salaryRequest,
            'remote' => $remote,
            'parttime' => $parttime,
        ]);
    }


    public function getAllCity()
    {
        $arrCity = Post::query()
            ->groupBy('city')
            ->get('city');
        return $arrCity;
    }

    public function getAlllanguage()
    {
        $arrLanguage = Post::query()
            ->groupBy('language')
            ->orderBy('language', 'asc')
            ->get('language');
        return $arrLanguage;
    }

    public function show($post)
    {
        $post = Post::query()
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select([
                'posts.*',
                'users.name as company',
                'users.email',
                'users.phone',
            ])
            ->findOrFail($post);
        return view('client.jobs.viewjob', [
            'post' => $post,
        ]);
    }
}
