<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ChallengeRequest;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    public function index()
    {
    	$challenges = \App\Challenge::paginate(5);
    	$data['title'] = 'Challenges';
    	$data['challenges'] = $challenges;
    	return view('admin.challenges.index',$data);
    }

    public function add()
    {

      
        $category = \App\Category::get()->pluck('title', 'id');
       
        $data['record'] = false;
        $data['title'] = 'Add Challenge';
        $data['category'] = $category;
    
    	return view('admin.challenges.add-edit', $data);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $result = (object) \App\Challenge::saveRecord($request);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/challenges');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
          $category = \App\Category::get()->pluck('title', 'id');
        $data['title'] = 'edit';
        $data['record'] = \App\Challenge::getRecord($slug);
        $data['category'] = $category;

    // dd($data);
        return view('admin.challenges.add-edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $result = (object) \App\Challenge::updateRecord($request, $slug);
        \Session::flash('type',$result->type);
    	\Session::flash('message',$result->message);
        return redirect('admin/challenges');
    }

     public function destroy(Request $request)
    {
        $slug = $request->slug;
        $result = \App\Challenge::deleteRecord($slug);
        return $result;
    }
}
