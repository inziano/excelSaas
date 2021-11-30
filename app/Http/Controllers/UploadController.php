<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Upload as UploadResource;

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

        dd($uploads);
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
           'excel' => 'required|file'
       ]);

       dd($request->all());
       // Validation passes

       // Upload file to local storage
       $file_url = Storage::disk('local')->put($request->name, $request->file('excel'));
       
       // Save    
       try {
           // Save record to DB
           $record = Upload::create([
               'title' => $request->title,
           ]);

           // Fire event to move file to AWS
           event( new FileUploaded($file_url));

            // return success
            return is_null($record) ? true : $resp;

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
