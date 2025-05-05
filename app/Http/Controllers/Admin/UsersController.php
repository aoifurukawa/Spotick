<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // sponsor
    public function sponsors_show()
    {
        $all_sponsor = User::whereIn('role_id', [1, 3])->get();

        return view('admin.sponsor-list')->with('all_sponsors', $all_sponsor);
    }

    public function sponsors_info_show($id)
    {
        return 'hello';
    }

    public function users_show()
    {
        $all_user = User::where('role_id', 2)->get();

        return view('admin.user-list')->with('all_user', $all_user);
    }
}
