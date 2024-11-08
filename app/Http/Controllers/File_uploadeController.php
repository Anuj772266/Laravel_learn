<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uploade_data;

class File_uploadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Uploade_data::get();
        return view('file-uploade', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:3000'
        ]);

        $file = $request->file('photo');
        $path = $request->file('photo')->store('image', 'public');
        // $path = $request->photo->Store('image', 'local');
        // $fileName = $file->getClientOriginalName();
        // $path = time(). '_' . $request->photo->storeAs('image', $fileName, 'public');

        // $extension = $file->Extension();
        // $extension = $file->getSize();

        Uploade_data::create([
            'file_name' => $path
        ]);
        return redirect()->route('file-upload.index')->with('status', 'User Image Uploded Successfully.');
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
        $user = Uploade_data::find($id);

        return view('file-uploade', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Data = Uploade_data::find($id);
        if($request->hasFile('photo')){
            $path = $request->photo->store('image', 'public');
            $Data->file_name = $path;
            $Data->save();
        }
        return redirect()->route('file-upload.index')
        ->with('status', 'User Image Data Update Successfully.');
    }
//

    public function destroy(string $id)
    {
        $user = Uploade_data::find($id);
        $user->delete();
        $image_path = public_path("storage/").$user->file_name;
        // return $image_path;
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return redirect()->route('file-upload.index')
        ->with('status', 'User Image Data Deleted Successfully.');
    }
}
