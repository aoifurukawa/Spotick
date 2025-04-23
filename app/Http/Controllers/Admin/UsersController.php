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

    public function sponsors_show()
    {
        return view('admin.sponsor-list');
    }

    public function users_show()
    {
        return view('admin.user-list');
    }
}
