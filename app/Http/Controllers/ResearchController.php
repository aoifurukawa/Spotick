<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    private $research;

    public function __construct(Research $research)
    {
        $this->research = $research;
    }

    // public function research(Request $request){
    //     $query = $this->research->query();

    //     if ($request->filled('title')) {
    //         $query->where('title', 'like', '%' . $request->title . '%');
    //     }

    //     $results = $query->get();

    //     return view('research-result')->with('results', $results);
    // }
}
