<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceToken;
use App\Http\Requests\StoreDeviceToken;

class DeviceTokenController extends Controller
{
    public function index()
    {
        return DeviceToken::all();
    }

    public function store(StoreDeviceToken $request)
    {
        $device = DeviceToken::create($request->all());

        return $device;
    }
}
