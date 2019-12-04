<?php

namespace App\Http\Controllers\Admin;

use App\group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\zoon;

class AdminController extends Controller
{
    public function Zoon_group(){
        $zoons=Zoon::get();
        $groups=Group::get();
        return view('admin.zoonGroup', compact('zoons', 'groups'));
    }
    public function zoonStore(Request $request){
    $addZoon= new zoon();
    $addZoon->name=$request->name;
    $addZoon->save();
    return back();
    }
    public function groupStore(Request $request){
        if(is_numeric($request->zoon_id)){
            $zoon_id=$request->zoon_id;
        }else{
            $getZoonId=zoon::where('name',$request->zoon_id)->first();
            $zoon_id=$getZoonId->id;
        }

        $addgroup= new group();
        $addgroup->zoon_id=$zoon_id;
        $addgroup->row=$request->row;
        $addgroup->sup=$request->sup;
        $addgroup->qa=$request->qa;
        $addgroup->save();
        return back();
    }
    public function groupDell(Request $request){
        group::where('id', $request->id)->first()->delete();
        return back();
    }
    public function zoonDell(Request $request){
        zoon::where('id', $request->id)->first()->delete();
        return back();
    }
}
