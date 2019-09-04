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
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->authorize('view', Video::class);
        return view('admin.video.list');
    }

    public function data()
    {
        $this->authorize('view', Video::class);
        $videos = Video::select(['title', 'published', 'created_at', 'id']);
        return Datatables::of($videos)
            ->editColumn('published', function ($video) {
                if ($video->published) {
                    return "Published";
                } else {
                    return "Draft";
                }
            })
            ->editColumn('id', function ($video) {
                return view('admin.common._icons', ['model' => $video, 'route' => 'videos'])->render();
            })
            ->rawColumns(['published', 'id'])
            ->make(true);
    }
    
    public function create()
    {
        $this->authorize('create', Video::class);
        return view('admin.video.create');
    }
    
    public function show($id)
    {
        $this->authorize('view', Video::class);
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }
    
    public function edit($id)
    {
        $this->authorize('update', Video::class);
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }
    
    public function store(VideoCreateRequest $request)
    {
        $this->authorize('create', Video::class);
        try {
            $data = $request->all();
            if (!empty($data['title'])) {
                unset($data['_token']);
                Video::create($data);
                toast('Video created successfully!', 'success');
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
        $this->authorize('update', Video::class);
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
                toast('Video updated successfully!', 'success');
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
        $this->authorize('delete', Video::class);
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
