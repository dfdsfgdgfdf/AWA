<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //هنا هنعطي لكل واحد الدور بتاعه و صلاحياته
        if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
            return redirect('admin/index');
        }

        $abouts = About::orderBy('id' ,'desc')->paginate(10);

        return view('backend.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
            return redirect('admin/index');
        }

        return view('backend.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        try {
            if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
                return redirect('admin/index');
            }

            $input['title']     = $request->title;
            $input['text']      = $request->text;
            $input['video_src'] = $request->video_src;
            $input['status']    = $request->status;

            if ($image = $request->file('image')) {
                $filename = time() . md5(uniqid()) .'.'.$image->getClientOriginalExtension();
                $path = ('assets/about/' . $filename);
                // Image::make($image->getRealPath())->resize(450, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($path, 100);
                // $input['image']  = $path;
                Image::make($image->getRealPath())->save($path, 100);
                $input['image']  = $path;
            }

            $about = About::create($input);

            return redirect()->route('admin.abouts.index')->with([
                'message' => 'About Us Created Successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_about,display_about')) {
            return redirect('admin/index');
        }

        return view('backend.abouts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_about,update_about')) {
            return redirect('admin/index');
        }

        return view('backend.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, About $about)
    {
        try {
            if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
                return redirect('admin/index');
            }

            $input['title']     = $request->title;
            $input['text']      = $request->text;
            $input['video_src'] = $request->video_src;
            $input['status']    = $request->status;

            if ($image = $request->file('image')) {

                if ($about->image != null && is_file($about->image)) {
                    unlink($about->image);
                }

                $filename = time() . md5(uniqid()) .'.'.$image->getClientOriginalExtension();
                $path = ('assets/about/' . $filename);
                // Image::make($image->getRealPath())->resize(350, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($path, 100);
                // $input['image']  = $path;
                Image::make($image->getRealPath())->save($path, 100);
                $input['image']  = $path;
            }
            $about->update($input);
            return redirect()->route('admin.abouts.index')->with([
                'message' => 'About Us Updated Successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
            return redirect('admin/index');
        }

        if ($about->image != null && is_file($about->image)) {
            unlink($about->image);
        }
        $about->delete();

        return redirect()->route('admin.abouts.index')->with([
            'message' => 'About Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }


    public function removeImage(Request $request)
    {
        if (!\auth()->user()->ability('superAdmin', 'manage_about,show_about')) {
            return redirect('admin/index');
        }

        $about = About::whereId($request->about_id)->first();
        if ($about) {
            if (is_file($about->image)) {
                unlink($about->image);

                $about->image = null;
                $about->save();
            }
        }
        return true;
    }


}
