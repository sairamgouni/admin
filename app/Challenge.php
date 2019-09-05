<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
	use HasSlug;

	protected $table = 'challenges';

	public $success_message = [	'status' => 1,
    							'message'=> 'record_saved_successfully',
    							'type'   => 'success'
    						];
    public $error_message = [	'status' => 0,
    							'message'=> 'please_try_again_later',
    							'type'   => 'error'
    						];
	private $base_path = 'http://localhost/euraka-live/public/';    						
   	private $upload_path = 'uploads/challenges/';
   	private $upload_path_thumbnail = 'uploads/challenges/thumbnails/';    		
   	private $edit_path = 'challenges/edit/';				
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

  

    /**
     * This method will handle the total saving job of the module
     * Thsis accepts the UsersRequest Object
     * @param  UsersRequest $request [description]
     * @return [type]                [description]
     */
    public static function saveRecord(Request $request)
    {

          $static_object 	= (new self);
          $record 			= new \App\Challenge();
        $response = $static_object->doSaveOperation($request, $record);

          if($response)
              return $static_object->getMessage('success');
          else
              return $static_object->getMessage('error');

    }

    // M3cjk*BBR,ib
    public function doSaveOperation($request, $record)
    {
         $static_object     = (new self);

          $record->title    = $request->title;
          $record->slug   = $request->slug;
          $record->description    = $request->description;
          $record->image    = $request->image;
          $record->status    = $request->status;
          $record->category_id    = $request->category_id;
          $record->active_from   = $request->active_from;
          $record->description    = $request->description;
          $record->created_by = \Auth::user()->id;
		  $response = $record->save();
          $static_object->processUpload($request, $record);
          return $response;
    }

    /**
     * This method will assign appropriate message based on type
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function getMessage($type)
    {
        if($type=='success')
        {
          $this->success_message['message'] = $this->success_message['message'];
          return $this->success_message;
        }

        $this->error_message['message'] = $this->error_message['message'];
        return $this->error_message;
    }

    /**
     * This method will upload the file submitted by user
     * @param  [type] $request [description]
     * @param  [type] $record  [description]
     * @return [type]          [description]
     */
    public function processUpload($request, $record)
    {

    	if($request->hasFile('image'))
        {
    		$path = $request->file('image')->store('challenges');
        	$record->image = $path;
        	$response =    $record->save();
        	return $response;
    	}
       
    }

    /**
     * This method will send the edit path for the record
     * @return [type] [description]
     */
    public function getEditPath()
    {
        return $this->edit_path.$this->slug;
    }

     /**
     * This method will send the image path
     * If no image available it will create a named image with first 2 characters
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getImage()
    {
        $url = Storage::url($this->image);
        return $this->base_path.$url;
    }

    /**
     * This method will return the selected based on slug
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public static function getRecord($slug)
    {
        
    return \App\Challenge::leftJoin('categories','categories.id','challenges.category_id')
       ->where('challenges.slug','=', $slug)->first();
    }

    /**
     * This method will update the existing record
     * @param  CategoriesRequest $request [description]
     * @param  [type]                $slug    [description]
     * @return [type]                         [description]
     */
    public static function updateRecord(Request $request, $slug)
    {

        $static_object = (new self);
        $record =  \App\Challenge::getRecord($slug);

        if(!$record)
            return false;
       $response = $static_object->doSaveOperation($request, $record);

        if($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

    public function cagetory()
    {
        $cat = \App\Category::where('id', '=', $this->category_id)->first();
        if($cat)
            return $cat->title;
        return '-';
        // return 'test';
        // return $this->belongsTo('\App\Category');
    }
}
