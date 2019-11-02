<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\AgentPerformanceReport;

use App\AgentGroupSummaryReport;
use App\Imports\AgentGroupProformanceReportImport;
use App\Imports\AgentGroupSummaryReportImport;
use App\Imports\AgentPerformanceReportImport;
use App\Imports\PsmImport;
use App\Psm;
use App\SendNo;
use App\User;
use Carbon\Carbon;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;


class SupController extends Controller
{

    public function index(){

        return view('admin.import');
    }

    public function import(Request $request){
        $file= ($request->file('file'));
        Excel::import(new AgentGroupSummaryReportImport, $file);
       return back()->with('success', 'All good!');
    }

    public function import2(Request $request){
        $file2= ($request->file('file2'));
        Excel::import(new AgentGroupProformanceReportImport, $file2);
        return back()->with('success', 'All good!');
    }

    public function import3(Request $request){
        $file3= ($request->file('file3'));
        Excel::import(new AgentPerformanceReportImport, $file3);
        return back()->with('success', 'All good!');
    }

    public function import4(Request $request){
        $file4= ($request->file('file4'));
        Excel::import(new PsmImport(), $file4);
        return back()->with('success', 'All good!');
    }



//    public function getDate(){
//
//        return view('admin.get_date');
//    }

//    public function sendDate(Request $request){
//
//
//        return view('admin.view', compact('date'));
//
//    }

    public function view(Request $request){
        if (Auth::user() == null){
            return view('auth.login');
        }
            $users=User::where('position',Auth::user()->group )->get();
            $group= Auth::user()->group;
            if($request->allzoon){
                $users=User::where('zoon',Auth::user()->zoon )->get();
            }elseif($request->zoons){
                $users=User::where('zoon',$request->zoons )->get();
            }

            // $agent= Agent::where('position',$group)->get();
            $agents=Agent::all();

            // $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');

            $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
            $latin_num = range(0, 9);

            $dateFrom= $request->from;
            $dateFrom=str_replace($persian_num, $latin_num, $dateFrom);
            $dateUpTo= $request->upTo;
            $dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);
//dd($users);

            // if($request->agent){

            //     $agents_option=$request->agent;
            //     $viewSum= AgentGroupSummaryReport::whereIn('AgentID',$agents_option)
            //     ->whereBetween('DATE',[$dateFrom, $dateUpTo])->get();
            // }else{
            //     $viewSum= AgentGroupSummaryReport::whereIn('AgentID',$agent_select)
            //     ->whereBetween('DATE',[$dateFrom, $dateUpTo])->get();
            // }
            $viewSum= AgentGroupSummaryReport::whereIn('AgentID',$request->agent ?? [])
                 ->whereBetween('DATE',[$dateFrom, $dateUpTo])->get();






        //$result = $viewSum->merge($viewPer);

        //dd($viewSum);

//            paginate(50)->appends(request()->query());;
//        ($view);

            //$olddate= Request::flashOnly('dateFrom', 'dateUpTo');
            //dd($request->agent);
            return view('admin.view',compact('viewSum','users', 'agents', 'dateFrom','dateUpTo'));



    }

    public function view2(Request $request){
        if (Auth::user() == null){
            return view('auth.login');
        }

        $users=User::where('position',Auth::user()->group )->get();
        $group= Auth::user()->group;
        if($request->allzoon){
            $users=User::where('zoon',Auth::user()->zoon )->get();
        }elseif($request->zoons){
            $users=User::where('zoon',$request->zoons )->get();
        }
        $group= Auth::user()->group;

        $agent= Agent::where('position',$group)->get();
        $agents=Agent::all();

        // $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');

        //arrays of persian and latin numbers
        $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $latin_num = range(0, 9);

        $dateFrom= $request->from;
        $dateFrom=str_replace($persian_num, $latin_num, $dateFrom);
        //$dateFrom= str_replace('/','-',$dateFrom);
        //$dateFrom= Carbon::createFromDate($dateFrom)->isoFormat('YYYY-MM-DD');
        $dateUpTo= $request->upTo;
        $dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);
        //$dateUpTo= str_replace('/','-',$dateUpTo);
        //$dateUpTo= Carbon::createFromDate($dateUpTo)->isoFormat('YYYY-MM-DD');

        // if($request->agent){
        //     $agents_option=$request->agent;
        //     $viewPer= AgentPerformanceReport::whereIn('AgentID',$agents_option)
        //     ->whereBetween('Date',[$dateFrom, $dateUpTo])->get();
        // }else{
        //     $viewPer= AgentPerformanceReport::whereIn('AgentID',$agent_select)
        //     ->whereBetween('Date',[$dateFrom, $dateUpTo])->get();
        // }
        $viewPer= AgentPerformanceReport::whereIn('AgentID',$request->agent ?? [])
             ->whereBetween('Date',[$dateFrom, $dateUpTo])->get();

//dd($viewPer);
        return view('admin.view2',compact('viewPer','users', 'agents', 'dateFrom','dateUpTo'));

    }

    public function psm(Request $request){
        if (Auth::user() == null){
            return view('auth.login');
        }
        $users=User::where('position',Auth::user()->group )->get();
        $group= Auth::user()->group;
        if($request->allzoon){
            $users=User::where('zoon',Auth::user()->zoon )->get();
        }elseif($request->zoons){
            $users=User::where('zoon',$request->zoons )->get();
        }
        $group= Auth::user()->group;


        $agent= Agent::where('position',$group)->get();
        $agents=Agent::all();


        $agent_select= Agent::where('position',$group)->where('status',1)->get('agent');

        //arrays of persian and latin numbers
        $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $latin_num = range(0, 9);

        $dateFrom= $request->from;
        $dateFrom=str_replace($persian_num, $latin_num, $dateFrom);
        //$dateFrom= str_replace('/','-',$dateFrom);
        //$dateFrom= Carbon::createFromDate($dateFrom)->isoFormat('YYYY-MM-DD');
        $dateUpTo= $request->upTo;
        $dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);
        //$dateUpTo= str_replace('/','-',$dateUpTo);
        //$dateUpTo= Carbon::createFromDate($dateUpTo)->isoFormat('YYYY-MM-DD');
        $viewPsm= Psm::whereIn('agentid',$agent_select)
            ->whereBetween('date',[$dateFrom, $dateUpTo])->get();
        return view('admin.psm',compact('viewPsm','users', 'agents', 'dateFrom','dateUpTo'));
    }

    public function dpsm(Request $request){
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
        //$dateFrom= str_replace('/','-',$dateFrom);
        //$dateFrom= Carbon::createFromDate($dateFrom)->isoFormat('YYYY-MM-DD');
        $dateUpTo= $request->upTo;
        $dateUpTo=str_replace($persian_num, $latin_num, $dateUpTo);
        //$dateUpTo= str_replace('/','-',$dateUpTo);
        //$dateUpTo= Carbon::createFromDate($dateUpTo)->isoFormat('YYYY-MM-DD');

        $viewdPer= AgentPerformanceReport::whereIn('AgentID',$agent_select)
            ->whereBetween('Date',[$dateFrom, $dateUpTo])->get();
        //dd($viewdPer);


        $viewdSum= AgentGroupSummaryReport::whereIn('AgentID',$agent_select)
            ->whereBetween('DATE',[$dateFrom, $dateUpTo])->get();

//        $merged = $viewdSum->merge($viewdPer);
        //dd($merged);
//        $merged->each(function($record)
//        {
//            echo $record->fieldName.'<br />';
//});

//        $viewdPsm = $merged->all();
//        dd($merged);


//        $ttttttt= array_combine($viewdPer, $viewdSum);
//        dd($ttttttt);

//        $mi = new MultipleIterator();
//        $mi->attachIterator(new ArrayIterator($viewdPer));
//        $mi->attachIterator(new ArrayIterator($viewdSum));
//        foreach($mi as list($viewdPerdata, $viewdSumdata)) {
//            dd($viewdPerdata,$viewdSumdata);
//        }



        return view('admin.dpsm',compact('viewdPer','viewdSum',  'agent', 'dateFrom','dateUpTo'));
    }

    public function show_agent(Request $request){
        if (Auth::user() == null){
            return view('auth.login');
        }
        $group = Auth::user()->group;

        if ($request->chagent === 'all'){
         DB::table('agents')
         ->where('position',$group)
         ->update(['status' => 1]);
        }if($request->chagent === 'emp'){
        DB::table('agents')
            ->where('position',$group)
            ->update(['status' => 0]);
        }

        $chagent = $request->chagent;
        $agentselect = Agent::where('agent', $chagent)->first();



        if ($agentselect) {

            $status = $agentselect->status;
            $ag = $agentselect->agent;

            if ($status == 1) {
                DB::table('agents')
                    ->where('agent', $ag)
                    ->update(['status' => 0]);

            } else {
                DB::table('agents')
                    ->where('agent', $ag)
                    ->update(['status' => 1]);
            }
            $agent = Agent::where('position', $group)->get();
            return view('admin.show_agents', compact('agent'));


        }else{

            $agent = Agent::where('position', $group)->get();
            return view('admin.show_agents', compact('agent'));

        }
    }

    public function agent_register(){
        return view('admin.agent_register');
    }

    public function agent_store(Request $request){
        $agentSt= new Agent();
        $agentSt->agent= $request->agent;
        $agentSt->name= $request->name;
        $agentSt->position= $request->position;
        $agentSt->save();
        return back();
    }

    public function status(Request $request) {
        return view('admin.show_agent');


    }

    public function edit_agent(Request $request){
        if ($request->agent){
            $editAgent= Agent::where('agent',$request->agent)->first();
            //dd($editAgent);
            return view('admin.edit_agents', compact('editAgent'));
        }
    }

    public function editagent(Request $request){
        Agent::where('agent',$request->agent)
        ->update([
            'agent'=> $request->agent,
            'name'=> $request->name,
            'position'=> $request->position,
            ]);
        return back();

    }

    public function dellagent(Request $request){
        Agent::where('agent',$request->agent)->delete();
        return back();
    }
    public function usersView(){
        $show_user= User::get();
        return view('admin/show_users', compact('show_user'));
    }

    public function usersEdit(Request $request){
        $user= User::where('id',$request->id)->first();
        return view('admin/edit_users', compact('user'));
    }

    public function usersUpdate(Request $request){
        $oldPrv= User::where('id',$request->id)->pluck('privilege');
        $oldpass=User::where('id',$request->id)->pluck('password');
        $privileage=$request->privilege ?? $oldPrv[0];
//dd(Hash::make($request->password));
        User::find($request->id)
        ->update([
           'name' => $request->name,
           'email' => $request->email,
           'group' => $request->group,
           'privilege' => $privileage,
           'position' => $request->position,
           'sex' => $request->sex,
           'grade' => $request->grade,
           'zoon' => $request->zoon,
           'agent' => $request->agent,
           'password' => Hash::make($request->password) ?? $oldpass[0],

        ]);
        return redirect('admin/show_users');
    }

    public function upload(Request $request){
        $request->validate([
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:10240 kb|min:9 kb'
        ]);
        $image= $request->file('image');
        $postfix= $image->getClientOriginalExtension();
        $name= uniqid().'.'.$postfix;
        $url= "dist/img/";
        $image->move($url, $name);
        $img= $url.$name;
        User::find($request->id)
        ->update([
            'image' => $img,
        ]);
        return redirect('admin/show_users');

    }

    public function dellUsers(Request $request){
        User::where('id',$request->id)->delete();
        return back();
    }

    public function sendBox(Request $request){
        $send= SendNo::where('id', $request->id)->first();
//dd($send);
            if($send->status){
                return back();
            }else{
                SendNo::where('id', $request->id)->update(['status'=> 1]);
                return back();
            }

    }
    public function viewZoon_group(){
        return view('admin.zoonGroup');

    }
}
