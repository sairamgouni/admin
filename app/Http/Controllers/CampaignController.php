<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CampaignController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $campaigns = \App\Campaign::paginate(PAGINATE);
        $data['title'] = 'Campaigns';
        $data['campaigns'] = $campaigns;
        return view('admin.campaigns.index',$data);
    }

    public function add()
    {
        $data['title'] = 'Add Campaign';
        $data['button_text'] = 'Save Campaign';
        return view('admin.campaigns.add-edit',$data);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $result = (object) \App\Campaign::saveRecord($request);
        \Session::flash('type',$result->type);
        \Session::flash('message',$result->message);
        return redirect('admin/campaigns');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      

        $data['title'] = 'Edit Campaign';
        $data['record'] = \App\Campaign::getRecord($slug);
        $data['button_text'] = 'Update Campaign';
        return view('admin.campaigns.add-edit',$data);
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
       
          $request->validate([
            'Campaign' => 'required',
           
        ]);
        $result = (object) \App\Campaign::updateRecord($request, $slug);
        flash($result->type,$result->message);
        return redirect('admin/campaigns');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slug = $request->slug;
        $result = \App\Campaign::deleteRecord($slug);
        return $result;
    }
}






