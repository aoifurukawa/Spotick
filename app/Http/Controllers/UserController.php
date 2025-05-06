<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    private $post;

    private $content;

    public function __construct(User $user, Post $post, Content $content)
    {
        $this->user = $user;
        $this->post = $post;
        $this->content = $content;
    }

    public function showForm()
    {
        $user = auth()->user();

        return view('sponsor.personal-information')->with('user', $user);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:1048',
            'phone_number' => 'nullable|string|max:20',
            'country' => 'required|string|max:100',
            'zip_code' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'airport' => 'nullable|string|max:100',
            'role_id' => 'required',
        ]);
        $user = $this->user->findorFail($id);
        if ($request->avatar) {
            $user->avatar = 'data:image/'.$request->avatar->extension().';base64,'.base64_encode(file_get_contents($request->avatar));
        }

        $user->phone_number = $request->phone_number;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->airport = $request->airport;
        $user->role_id = $request->role_id;
        $user->save();

        $all_posts = $this->post->latest()->get();
        $all_content = $this->content->oldest()->get();

        return view('sponsor.home')->with('all_posts', $all_posts)
            ->with('all_content', $all_content);
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('sponsor.personal-information')->with('user', $user);
    }
}
