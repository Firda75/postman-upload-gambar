<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gambar;
use App\Http\Requests\gambarStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class gambarController extends Controller
{
    public function store(gambarStoreRequest $request)
    {   
    try{
        $imageName = Str::random(32).".".$request->image->getClientOriginalExtension();

        //create post gambar
        gambar::create([
            'name' => $request->name,
            'image'=> $imageName,
            'description'=> $request->description
        ]);

        // save image in strage folder
        Storage::disk('public')->put($imageName, file_get_contents($request->image));

        //return json Response
        return response()->json([
            'message' => "Post Successfully created"
        ],200);
        
    } catch(\Exception $e){
        return response()->json([
            'message' => "something went really wrong"
        ],500);
        
    }
}
}


