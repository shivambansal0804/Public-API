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

            $item['userImg'] = $item->getFirstMediaUrl('avatar', 'thumb');

            array_push($tempArr,$item);
           
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

        $user['userImg'] = $user->getFirstMediaUrl('avatar', 'thumb');

        return $user;
    }
}
