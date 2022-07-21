<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLanguage() {
        $languages = Post::groupBy('language')
            ->select('language')
            ->pluck('language');
            return $languages;
    }
    public function create()
    {
        $languages = PostController::getAllLanguage();
        return view('client.hr.createpost',[
            'languages' =>$languages,
        ]);
    }
    
    

    public function store(Request $request)
    {
        $arrRule = [
            'job_tittle' => 'bail|required',
            'city' => 'required',
            'number_applicants' => 'required|numeric',
            'language' => 'required',
            'salary' => 'required',
        ];
        //   $arrRuleMessage = [
        //     'job_tittle.required' => 'Bắt buộc phải điền tiêu đề!',
        //     'city.required' => 'Bắt buộc điền thành phố!',
        //     'language.required' => 'Bắt buộc chọn ngôn ngữ!',
        //     'salary.required' => 'Bắt buộc điền lương!',
        //     'number_applicants.required' => 'Bắt buộc điền số lượng!',
        //     'number_applicants.numeric' => 'Số lượng phải là số!',
        // ];
        
        $request->validate($arrRule);
        $post = $request->all();
        $request->has('remote') ?  $post['remote'] = 1 : $post['remote'] = 0;
        $request->has('parttime') ?  $post['parttime'] = 1 : $post['parttime'] = 0;
        $salary = implode(explode(',',$post['salary']));
        $post['salary'] = $salary;
        Post::create($post);
        return redirect()->back()->with(['success' => "Thêm Thành Công!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $languages = PostController::getAllLanguage();
        $post = Post::FindOrFail($id);
        // return dd($post);
        return view('client.hr.editpost',[
            'post' => $post,
            'languages' =>$languages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('status')) {
            $status = $request->get('status');
            Post::query()
                ->whereId($id)
                ->update(['status' => $status]);
            // return response()->json(['success' => $status]);
            return response()->json(['success' => "Thành Công"]);
        }
        $arrRule = [
            'job_tittle' => 'bail|required',
            'city' => 'required',
            'number_applicants' => 'required|numeric',
            'language' => 'required',
            'salary' => 'required',
        ];
        //   $arrRuleMessage = [
        //     'job_tittle.required' => 'Bắt buộc phải điền tiêu đề!',
        //     'city.required' => 'Bắt buộc điền thành phố!',
        //     'language.required' => 'Bắt buộc chọn ngôn ngữ!',
        //     'salary.required' => 'Bắt buộc điền lương!',
        //     'number_applicants.required' => 'Bắt buộc điền số lượng!',
        //     'number_applicants.numeric' => 'Số lượng phải là số!',
        // ];
        $request->validate($arrRule);
        $post = $request->except(['_token','_method','files']);
        // return dd($post);

        $request->has('remote') ?  $post['remote'] = 1 : $post['remote'] = 0;
        $request->has('parttime') ?  $post['parttime'] = 1 : $post['parttime'] = 0;
        $salary = implode(explode(',',$post['salary']));
        $post['salary'] = $salary;
        // ::update($post);
        Post::whereId($id)->update($post);
        return redirect()->back()->with(['success' => "Sửa Thành Công!"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back()->with(['success' => "Xoá Thành Công!"]);
    }

    public function updateStatus(Request $request) {
        $data = $request->get('status');
        return response()->json($data);
    }
}
