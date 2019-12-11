<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\AgentPerformanceReport;
use App\Link;
use App\Off;
use App\PermitionOff;
use App\SendNo;
use App\User;
use Facades\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function sendNumber(){
        return view('admin.send_number_without');
    }

    public function sendview(){
        return view('admin.send_no');
    }
    public function storeno(Request $request){
if($request->agent){
    $userId=User::where('agent',$request->agent)->first()->id ?? 'error';
if($userId == 'error'){
    return back()->with(['error' => 'کد پرسنلی خود را صحیح وارد کنید!']);

}
//dd($userId);
}else{
$userId=$request->user_id;
}
        $storenumber= new SendNo();
        $storenumber->user_id = $userId;
        $storenumber->number = $request->number;
        $storenumber->comment = $request->comment;
        $storenumber->agent = $request->agent;
        $storenumber->save();

        if($request->agent){
            return back()->with(['success' => 'شماره با موفقیت ارسال شد.']);
        }elseif(Auth::user()->privilege == 3){
            return back()->with(['success' => 'شماره با موفقیت ارسال شد.']);
        }elseif (Auth::user() || Auth::user()->privilege != 3){
            return redirect('admin/view_no');
        }
    }
public function storeres(Request $request){
    SendNo::where('id',$request->id)->update([
        'result'=>$request->result,
        'status'=>3
    ]);
return redirect('admin/view_no');

}

    public function viewno(Request $request){
        $users=User::where('zoon',Auth::user()->zoon)->pluck('id')->toArray();

        if($request->id){
            $select_no=SendNo::where('id', $request->id)->first();
            //dd($select_no);
        }else{
            $select_no=null;
        }

        if (Auth::user()->zoon === 'MCI' || Auth::user()->privilege === 3){
			if ($request->number){
            $viewNo= SendNo::whereIN('status',[1, 2, 3])->where('number','like','%'.$request->number.'%')->paginate('10');
			}else{
            $viewNo= SendNo::whereIN('status',[1, 2, 3])->paginate('10');
			}
			
        }elseif ($request->number){
			

            $viewNo=SendNo::whereIn('user_id',$users)->where('number','like','%'.$request->number.'%')->paginate('10');
			
        }else{
            $viewNo= SendNo::whereIn('user_id',$users)->paginate('10');//مشاهده تفکیکی برای هر زون اصلاح شود.

        }
        return view('admin.view_no', compact('viewNo', 'select_no'));

    }
    public function delno(Request $request){
        $deleteno= SendNo::where('id',$request->id)->first();
        $deleteno->delete();
        return back();

    }


    public function selectDateVacation(){
        $user= Auth::user()->id;
        $po= PermitionOff::get();


        $offs= Off::where('user_id',$user)->get();

        return view('admin.select_date_vacation', compact('offs','po'));

    }

    public function offStore(Request $request){
//        dd();
        $links= Link::find(1);
        $permi= PermitionOff::pluck('date')->toArray();
//        foreach ($permi as $pir){
//            dd($pir) ;
//        }
//        dd($permi,$a);

        if ($links->status == 1 && in_array (mb_substr($request->date, 0, -9, 'utf-8'), $permi)) {


                $storeOff = new Off();
                $storeOff->date = mb_substr($request->date, 0, -9, 'utf-8');
                $storeOff->user_id = $request->user_id;
                $storeOff->name = $request->name;
                $storeOff->save();

        }
        return back();

    }
    public function viewOff(Request $request){
        $po= PermitionOff::get();

        $dateFrom= $request->from;
        $dateUpTo= $request->upTo;
        $allOff= Off::whereBetween('date', [$dateFrom, $dateUpTo])->get();

        return view('admin.view_off', compact('allOff', 'po', 'dateFrom', 'dateUpTo'));
    }
    public function OffChStatus(Request $request){
        if (Auth::user()->privilege == 1 || Auth::user()->privilege == 4){
            $Off= Off::where('id', $request->id)->first();
                if ($Off->status == null){
                    $Off->update([
                        'status'=> 1,
                    ]);
                    return back();
                }else{
                    $Off->update([
                        'status'=> null,
                    ]);
                    return back();
                }
        }else{return back();}
    }

    public function OffDelete(Request $request){
        Off::where('id', $request->id)->Delete();
        return back();
    }

    public function OffPermition(Request $request){
        $perm= new PermitionOff();
        $perm->date = mb_substr($request->datePerm, 0, -9, 'utf-8');
//        dd($perm);
        $perm->save();
        return back();
    }

    public function permDelete(Request $request){
        PermitionOff::where('id', $request->id)->Delete();
        return back();
    }



    public function linkStatus(){
        $links= Link::find(1);
        if ($links->status == null){
            $links->update([
                'status' => 1
            ]);
            return back();
        }else{
            $links->update([
                'status' => null
            ]);
            return back();

        }
    }
}
