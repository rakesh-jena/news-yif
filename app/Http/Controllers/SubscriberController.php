<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $users = Subscriber::all();
        return view('admin.subscriber', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $subscriber = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect('/?subscribe=success');
    }
}
