<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;

class ContentsController extends Controller
{
    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function contents_show()
    {
        return view('admin.content-list');
    }
}
