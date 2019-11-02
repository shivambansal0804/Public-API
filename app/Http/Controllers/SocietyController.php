<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Society;


class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societies = Society::where('status','published')->get();
        $tempArr = [];

        foreach ($societies as $item){

            array_push($tempArr,
        [   'id'=>$item->id,
            'name'=>$item->name,
            'category'=>$item->category,
            'slug'=>$item->slug,
            'uuid'=>$item->uuid,

            'user_id'=>$item->user_id,
            'status'=>$item->status,
            'description'=>$item->description, 
            'linkedin'=>$item->linkedin,
            'facebook'=>$item->facebook, 
            'instagram'=>$item->instagram, 
            'contact_mail'=>$item->contact_mail, 
            'head_incharge'=>$item->head_incharge, 
            'pr_incharge'=>$item->pr_incharge, 
            'pr_contact_number'=>$item->pr_contact_number,
            'head_contact_number'=>$item->head_contact_number, 
            'website'=>$item->website, 
            'referrals'=>$item->referrals, 
            'views'=>$item->views,
            'society_imgUrl'=> $item->getFirstMediaUrl('soc_logo'),
            
            ]);
           
        }

        return $tempArr;
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $item = Society::where(['id'=> $id, 'status' => 'published'])->firstOrFail();

       $society_Object = [
        'id'=>$item->id,
        'name'=>$item->name,
        'category'=>$item->category,
        'slug'=>$item->slug,
        'uuid'=>$item->uuid,

        'user_id'=>$item->user_id,
        'status'=>$item->status,
        'description'=>$item->description, 
        'linkedin'=>$item->linkedin,
        'facebook'=>$item->facebook, 
        'instagram'=>$item->instagram, 
        'contact_mail'=>$item->contact_mail, 
        'head_incharge'=>$item->head_incharge, 
        'pr_incharge'=>$item->pr_incharge, 
        'pr_contact_number'=>$item->pr_contact_number,
        'head_contact_number'=>$item->head_contact_number, 
        'website'=>$item->website, 
        'referrals'=>$item->referrals, 
        'views'=>$item->views,
        'society_imgUrl'=> $item->getFirstMediaUrl('soc_logo'),
          
       ] ;
        
        


       
        return $society_Object;
    }
}