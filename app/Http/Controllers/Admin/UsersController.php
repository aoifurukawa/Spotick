<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Post;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    private $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    // sponsor
    public function sponsors_show()
    {
        $all_sponsor = User::whereIn('role_id', [1, 3])->withTrashed()->get();

        return view('admin.sponsor-list')->with('all_sponsors', $all_sponsor);
    }

    public function sponsors_info_show($id)
    {
        $sponsor = $this->user->findOrFail($id);

        return view('admin.sponsor-info')->with('sponsor', $sponsor);
    }

    public function users_info_show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('admin.user-info')->with('user', $user);
    }

    public function users_show()
    {
        $all_user = User::where('role_id', 2)->get();

        return view('admin.user-list')->with('all_user', $all_user);
    }

    public function payments_show()
    {
        $payment_record = Payment::latest()->get();

        return view('admin.payment-list')->with('payment_record', $payment_record);
    }

    // public function deactivate($id)
    // {
    //     $this->user->destroy($id);

    //     return redirect()->back();
    // }

    public function deactivate($id)
    {
        $this->user->destroy($id);

        $this->post->where('user_id', $id)->delete();

        return redirect()->back();

    }

    public function activate($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }
}
