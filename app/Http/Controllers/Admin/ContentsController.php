<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:1000',
        ]);

        $this->content->name = $request->name;
        $this->content->save();

        return redirect()->back();
    }

    public function contents_show()
    {
        $all_contents = $this->content->oldest()->get();

        return view('admin.content-list')->with('all_contents', $all_contents);
    }
}
