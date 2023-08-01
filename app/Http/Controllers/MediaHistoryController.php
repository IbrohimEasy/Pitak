<?php

namespace App\Http\Controllers;

use App\Models\MediaHistory;
use App\Models\MediaHistoryUser;
use App\Models\Users;
use Illuminate\Http\Request;
use Image;

class MediaHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media_histories = MediaHistory::all();
        return view('media-history.index', ['media_histories'=>$media_histories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $media_histories = MediaHistory::all();
        return view('media-history.create', ['media_histories'=>$media_histories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video'=>'mimes:mp4,ogx,ogs,ogv,ogg,webm,avi',
            'image'=>'required|mimes:jpg,png,jpeg,webp'
        ]);
        $media_history = new MediaHistory();
        $file = $request->file('image');
        $video = $request->file('video');
        $letters = range('a', 'z');
        $random_array = [$letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)], $letters[rand(0,25)]];
        $random = implode("", $random_array);
        $image_name = $random . '' . date('Y-m-dh-i-s') . '.' . $file->extension();
        $img = Image::make($file->path());
        $img->resize(150, 150, function($constraint){
           $constraint->aspectRatio();
        })->save(storage_path('app/public/media/thumb/'.$image_name));
        $media_history->url_small = $image_name;
        if(isset($request->video)){
            $letters_new = range('a', 'z');
            $random_array_new = [$letters_new[rand(0,25)], $letters_new[rand(0,25)], $letters_new[rand(0,25)], $letters_new[rand(0,25)], $letters_new[rand(0,25)]];
            $random_new = implode("", $random_array_new);
            $video_name = $random_new . '' . date('Y-m-dh-i-s') . '.' . $video->extension();
            $video->storeAs('public/media/videos/', $video_name);
            $media_history->url_big = $video_name;
        }else{
            $file->storeAs('public/media/', $image_name);
            $media_history->url_big = $image_name;
        }
        $media_history->save();
        return redirect()->route('mediaHistory.index')->with('status', translate('Successfully created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = MediaHistory::find($id);
        return view('media-history.show', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $media_history = MediaHistory::find($id);
        return view('media-history.edit', ['media_history'=>$media_history]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'video'=>'mimes:mp4,ogx,ogs,ogv,ogg,webm,avi',
            'image'=>'mimes:jpg,png,jpeg,webp'
        ]);
        $model = MediaHistory::find($id);
        $file = $request->file('image');
        $video = $request->file('video');
        if(isset($file)){
            $avatar = storage_path('app/public/media/thumb/'.$model->url_small);
            $avatar_main = storage_path('app/public/media/'.$model->url_big);
            if(file_exists($avatar)){
                unlink($avatar);
            }
            if(file_exists($avatar_main)){
                unlink($avatar_main);
            }
        }
        if($request->is_video == 'true' && isset($video)){
            $video_main = storage_path('app/public/media/videos/'.$model->url_big);
            if(file_exists($video_main)){
                unlink($video_main);
            }
        }
        if(isset($file)){
            $letters = range('a', 'z');
            $random_array = [$letters[rand(0, 25)], $letters[rand(0, 25)], $letters[rand(0, 25)], $letters[rand(0, 25)], $letters[rand(0, 25)]];
            $random = implode("", $random_array);
            $image_name = $random . '' . date('Y-m-dh-i-s') . '.' . $file->extension();
            $img = Image::make($file->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/media/thumb/' . $image_name));
            $model->url_small = $image_name;
        }
        if (isset($request->video)) {
            $video_array = explode(".", $request->video);
            if(!in_array($video_array[1], ['jpg','png','jpeg','webp'])) {
                if ($request->is_video == 'true') {
                    $video_main = storage_path('app/public/media/videos/' . $model->url_big);
                    if (file_exists($video_main)) {
                        unlink($video_main);
                    }
                }
                $letters_new = range('a', 'z');
                $random_array_new = [$letters_new[rand(0, 25)], $letters_new[rand(0, 25)], $letters_new[rand(0, 25)], $letters_new[rand(0, 25)], $letters_new[rand(0, 25)]];
                $random_new = implode("", $random_array_new);
                $video_name = $random_new . '' . date('Y-m-dh-i-s') . '.' . $video->extension();
                $video->storeAs('public/media/videos/', $video_name);
                $model->url_big = $video_name;
            }else {
                $file->storeAs('public/media/', $image_name);
                $model->url_big = $image_name;
            }
        }

        $model->save();
        return redirect()->route('mediaHistory.index')->with('status', translate('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = MediaHistory::find($id);
        if(isset($model)){
            $avatar = storage_path('app/public/media/thumb/'.$model->url_small);
            $avatar_main = storage_path('app/public/media/'.$model->url_big);
            if(file_exists($avatar)){
                unlink($avatar);
            }
            if(file_exists($avatar_main)){
                unlink($avatar_main);
            } $video_main = storage_path('app/public/media/'.$model->url_big);
            if(file_exists($video_main)){
                unlink($video_main);
            }
        }
        $model->delete();
        return redirect()->route('mediaHistory.index')->with('status', translate('Successfully deleted'));
    }
}
