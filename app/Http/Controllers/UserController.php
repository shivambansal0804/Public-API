<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('show',true)->get();

        $tempArr = [];

        foreach ($users as $item){

            array_push($tempArr,
            ['info' => $item,
            'userImg'=> $item->getFirstMediaUrl('avatar', 'avatars'),
            ]);
           
        }

        return $tempArr;

        return $users;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where(['id'=> $id, 'show' => true])->firstOrFail();

        $info = [
            'info' => $user,
            'userImg' => $user->getFirstMediaUrl('avatar', 'avatars'),
        ];

        return $info;
    }
}
