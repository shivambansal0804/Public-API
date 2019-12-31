<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceToken;

class DeviceTokenController extends Controller
{
    public function index()
    {
        return DeviceToken::all();
    }

    public function store(Request $request)
    {
        $device = DeviceToken::create($request->all());

        return $device;
    }
}
