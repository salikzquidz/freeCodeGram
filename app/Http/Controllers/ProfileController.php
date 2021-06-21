<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {
        // dd($user);
        // $user = User::findOrFail($user);
        // return view('profiles/index', [
        //     'user' => $user, 
        // ]);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($follows);
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        //only authorized user can edit
        $this->authorize('update', $user->profile); 
        // dd($user);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        //only authorized user can update
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        // dd($data);
        
        // if image submitted
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            // dd($imagePath);
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000) ;
            $image -> save();
            // auth()->user()->profile->update(array_merge(
            //     $data,
            //     ['image' => $imagePath]
            // ));
            $imageArray = ['image' => $imagePath];
        // if no image submitted
        }
        // else{
        //     auth()->user()->profile->update($data);
        //     return redirect ("/profile/{$user->id}");
        // }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect ("/profile/{$user->id}");
    }
}
