<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
// use Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile); //proteger la fonction dune quelconque modification
        return view('profiles.edit', compact('user')); 
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'nom_prenom' =>'required|min:5|max:150',
            'tel' =>'required|min:8|numeric',
            'niveau' =>'required',
            'filiere' =>'required',
            'bio' => 'required|min:5',
            'etablissement' =>'required|min:3|max:200',
            'image' => 'max:3000',
            
        ]);

        if(request()->hasFile('image'))
        {

            $destination_path = 'public/avatars';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs($destination_path, $image_name);
            $data['image'] = $image_name;
         
        }
            auth()->user()->profile->update($data);

        session()->flash('message', 'text');

        return redirect()->route('profiles.show', ['user'=> $user]);
    }

} 




