<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Upload as UploadResource;
use App\Events\FileUploaded;
use app\Models\User;
class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get authenticated user
        $uploads = auth()->user()->upload;
;
        // 
        return UploadResource::collection(Upload::paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $validated = $request->validate([
           'title' => 'required|unique:uploads',
           'excel' => 'required|file',
           'user_id' => 'required'
       ]);
       // Validation passes

       $user = User::where('id', $request->user_id)->first()->name;


       // Upload file to local storage
       $file_url = Storage::cloud()->putFileAs('docs', $request->file('excel'), $request->title);
       
       // Save    
       try {
           // Save record to DB
           $record = Upload::create([
               'title' => $request->title,
               'url' => $file_url,
               'user_id' => $request->user_id
           ]);

        //    dd($record);

           // Fire event to move file to AWS
           event( new FileUploaded($record));

            // return success
            return is_null($record) ? true : $record;

       } catch( \Exception $e) {
           throw $e;
       }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
        return $upload->delete();
    }
}
