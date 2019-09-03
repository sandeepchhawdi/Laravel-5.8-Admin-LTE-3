<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use App\Http\Requests\Admin\VideoCreateRequest;
use Datatables;

class VideoController extends AdminController
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware(['auth', 'role:admin']);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.video.list');
    }

    public function list()
    {
        $videos = Video::select(['title', 'published', 'created_at', 'id']);
        return Datatables::of($videos)
            ->editColumn('published', function ($video) { 
                    if($video->published) 
                        return "Published";
                    else
                        return "Draft";
                    })
            ->editColumn('id', function($video){
                    return view('admin.video.icons', ['video' => $video])->render();
                    })
            ->rawColumns(['published', 'id'])
            ->make(true);
    }
    
    public function create()
    {
        return view('admin.video.create');
    }
    
    public function show($id)
    {
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }
    
    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }
    
    public function store(VideoCreateRequest $request)
    {
        try {
            $data = $request->all();
            if (!empty($data['title'])) {
                unset($data['_token']);
                Video::create($data);
                toast('Video created successfully!','success');
            } else {
                toast('Video Title is must!', 'error');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $ex) {
            toast('Some error occurred!', 'error');
            return redirect()->back()->withInput();
        }
        return redirect()->route('admin.videos.index');
    }
    
    public function update($id, VideoCreateRequest $request)
    {
        try {
            $data = $request->all();
            if (!empty($data['title'])) {
                unset($data['_method']);
                unset($data['_token']);
                $video = Video::where('id', $id)->first();
                foreach ($data as $key => $value) {
                    $video->$key = $value;
                }
                $video->update();
                toast('Video updated successfully!','success');
            } else {
                toast('Video Title is must!', 'error');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $ex) {
            toast('Some error occurred!', 'error');
            return redirect()->back()->withInput();
        }
        return redirect()->route('admin.videos.index');
    }

    public function destroy($id)
    {
        try {
            $video = Video::find($id);
            if ($video) {
                $video->delete();
            }            
            return response()->json('Video deleted successfully!');
        } catch (\Exception $ex) {
            return response()->json('Some error occurred!');
        }
    }
}
