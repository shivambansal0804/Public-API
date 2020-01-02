<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        return Subscriber::get()->latest();
    }

    public function store(StoreSubscriber $request)
    {
        return Subscriber::create([
            'email' => $request->email
        ]);
    }
}
