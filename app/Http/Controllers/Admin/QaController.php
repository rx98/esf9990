<?php

namespace App\Http\Controllers\Admin;

use App\Imports\QualityImport;
use App\InternalQa;
use App\Quality;
use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class QaController extends Controller
{
    public function import5(Request $request){
        $file= ($request->file('file5'));
        Excel::import(new QualityImport, $file);
        return back()->with('success', 'All good!');
    }

    public function qualityteh(Request $request){
        if (Auth::user() == null){
            return view('auth.login');
        }
        $group= Auth::user()->group;
        $agent= Agent::where('position',$group)->get();
        $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');

        //arrays of persian and latin numbers
        $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $latin_num = range(0, 9);

        $dateFrom= $request->from;
        $dateFrom=str_replace($persian_num, $latin_num, $dateFrom);

        $dateUpTo= $request->upTo;
        $dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);



        $viewQaTeh= Quality::whereIn('AgentId',$agent_select)
            ->whereBetween('Time',[$dateFrom, $dateUpTo])->get();
        return view('admin.quality_teh', compact('agent', 'viewQaTeh', 'dateFrom', 'dateUpTo'));
    }

    public function qualityreg(){

        return view('admin.quality_reg');
    }

    public function quality_reg_store(Request $request){
        $QaINernal=  new InternalQa();
        $QaINernal->agent= $request->agent;
        $QaINernal->number= $request->number;
        $QaINernal->datelisten= $request->datelisten;
        $QaINernal->date= $request->date;
        $QaINernal->status= $request->status;
        $QaINernal->subject= $request->subject;
        $QaINernal->item1= $request->item1;
        $QaINernal->item2= $request->item2;
        $QaINernal->item3= $request->item3;
        $QaINernal->item5= $request->item5;
        $QaINernal->item6= $request->item6;
        $QaINernal->item7= $request->item7;
        $QaINernal->item8= $request->item8;
        $QaINernal->item9= $request->item9;
        $QaINernal->item10= $request->item10;
        $QaINernal->item11= $request->item11;
        $QaINernal->item12= $request->item12;
        $QaINernal->item13= $request->item13;
        $QaINernal->comment= $request->comment;
        $QaINernal->highlight= $request->highlight;
        $QaINernal->save();
        return back()->withInput();
    }

    public function qualityShow(Request $request){
        $referesh= null;

        $group= Auth::user()->group;
        $agent= Agent::where('position',$group)->get();
        $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');

        //arrays of persian and latin numbers
        $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $latin_num = range(0, 9);

        $dateFrom= $request->from;
        //$dateFrom=str_replace($persian_num, $latin_num, $dateFrom);


        $dateUpTo= $request->upTo;
        //$dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);

        Session::put('dateFrom', $dateFrom);

        Session::put('dateUpTo', $dateUpTo);




        if ($request->Communicated){
            $qaShow= InternalQa::whereIn('agent',$agent_select)
                ->whereBetween('datelisten',[$dateFrom, $dateUpTo])->get();
        }else{
            $qaShow= InternalQa::whereIn('agent',$agent_select)
                ->whereBetween('datelisten',[$dateFrom, $dateUpTo])
                ->where('Communicated', null)->get();
        }
        Session::put('qaShow', $qaShow);

        //$this->quality_update($dateFrom, $dateUpTo);


        return view('admin.quality_show', compact('dateFrom', 'dateUpTo', 'qaShow', 'referesh'));
    }

    public function qualityedit(Request $request){
        $edit_inernalQa= InternalQa::where('id',$request->id)->first();
        return view('admin.quality_edit', compact('edit_inernalQa'));
    }

    public function quality_update(Request $request){

        //InternalQa::where('id',$request->id)
        DB::table('internal_qas')->where('id',$request->id)
        ->update([
            'agent'=> $request->agent,
            'number'=> $request->number,
            'datelisten'=> $request->datelisten,
            'date'=> $request->date,
            'status'=> $request->status,
            'subject'=> $request->subject,
            'item1'=> $request->item1,
            'item2'=> $request->item2,
            'item3'=> $request->item3,
            'item5'=> $request->item5,
            'item6'=> $request->item6,
            'item7'=> $request->item7,
            'item8'=> $request->item8,
            'item9'=> $request->item9,
            'item10'=> $request->item10,
            'item11'=> $request->item11,
            'item12'=> $request->item12,
            'item13'=> $request->item13,
            'comment'=> $request->comment,
            'highlight'=> $request->highlight,
            ]);
        //dd($data);
        $id=$request->id;
        $dateFrom= Session::get('dateFrom');
        $dateUpTo= Session::get('dateUpTo');
        $referesh= 1;
        //$qaShow= Session::get('qaShow');
        $group= Auth::user()->group;
        $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');
        if ($request->Communicated){
            $qaShow= InternalQa::whereIn('agent',$agent_select)
                ->whereBetween('datelisten',[$dateFrom, $dateUpTo])->get();
        }else{
            $qaShow= InternalQa::whereIn('agent',$agent_select)
                ->whereBetween('datelisten',[$dateFrom, $dateUpTo])
                ->where('Communicated', null)->get();
        }



//        return redirect('admin/quality_show')->withInput();
        return view('admin.quality_show', compact('dateFrom', 'dateUpTo', 'qaShow', 'id', 'referesh'));


    }
    public function qualitydell(Request $request){
        $dellId = $request->id;
        InternalQa::find($dellId)->delete();
        return back();
    }
    public function qualityCommunicatededit(Request $request){
        $chComId = $request->id;
        $Communicated= InternalQa::find($chComId);
        //dd($Communicated->Communicated);
        if ($Communicated->Communicated){
        InternalQa::find($chComId)->update([
            'Communicated' => null
        ]);}else{
            InternalQa::find($chComId)->update([
                'Communicated' => 1
            ]);}
        return back();
    }


}
