<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::get();
        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:majors|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

         // save image
        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move('images/majors', $imageName);

        Major::create([
            'title' => $request->title,
            'image' => $imageName
        ]);

        return redirect()
        ->route('major.index')
        ->with('success','Data saved successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::findOrFail($id);
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:majors,title,' . $id ,
            'image' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $major = Major::findOrFail($id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {           

            if($request->hasFile('image')) {

                // delete old image
                $path = 'images/majors/' . $major->image;
                if(File::exists($path)) {
                    File::delete($path);
                }

                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('images/majors', $imageName);
                $major->image = $imageName;
            }

            $major->update(
                [
                    'title' => $request->title
                ]
            );

            return redirect()
            ->route('major.index')
            ->with('success','Data is updated successfully');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Major::findOrFail($id);

        // delete old image
        $path = 'images/majors/'. $major->image;
        if(File::exists($path)) {
            File::delete($path);
        }

        $major->delete();

        return redirect()
        ->back()
        ->with('success','Data is deleted successfully');
    }
}
