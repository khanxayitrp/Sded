<?php

namespace App\Http\Controllers;

use App\staff;
use App\sdlist;
use App\positionlevel;
use App\youth;
use App\laoworker;
use App\women;
use App\payment;
use App\activitys;
use App\educationlevel;
use App\laoclan;
use App\activitytype;
use App\laomember;
use App\soldier;
use App\slideshow;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebadminController extends Controller
{
    // protected $excepts = [
    //     'except' => [
    //         'Listdata'
    //     ]
    // ];

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
       	$this->middleware('auth');
    	$this->middleware('multipleuser:superadmin,admin,writer')->except(['Listdata','ListallYouth','ListallLaoworker','ListallWomen','Profile','ListLaomember']);
    }

    function Listdata()
    {
    	$data = staff::select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'positionlevel.PositionName as Position','sdlist.SDlistName as location','staff.RegDate as memberdate')
                ->leftJoin('positionlevel', 'staff.PositionID', '=', 'positionlevel.PositionID')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('alldata',compact('data'));
    }

    function ListLocation()
    {
        $data = sdlist::all();
        //dd($data);
        return view('alllocation',compact('data'));
    }

    function ListallActivitytype()
    {
        $data = activitytype::all();
        //dd($data);
        return view('allactivitytype',compact('data'));
    }

    function ListallLaoworker()
    {
         $data = laoworker::select('laoworker.LaoWorkerID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','laoworker.LaoWorkerDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'laoworker.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('alllaoworker',compact('data'));
    }

    function ListallWomen()
    {
        $data = women::select('women.WomenID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','women.WomenDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'women.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('allwomen',compact('data'));
    }


    function ListallYouth()
    {
        $data = youth::select('youth.YouthID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','youth.YouthDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'youth.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('allyouth',compact('data'));
    }

    function ListallActivity()
    {
        // $data = Activitys::select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
        //     'Sdlist.SDlistName as location','Activitys.act_date as actdate','Activitys.act_mode as actmode',
        //     'Activitys.description as description')
        //         ->leftJoin('staff', 'staff.IDSDED', '=', 'Activitys.IDSDED')
        //         ->leftJoin('Sdlist', 'staff.SDListID', '=', 'Sdlist.SDListID')->get();

        $data = DB::table('activitys')
                ->select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','activitys.act_date as actdate',
            'activitys.description as description',
                DB::raw('(CASE WHEN (activitys.act_mode ="1") THEN "ວຽກງານຊາວໜຸ່ມ"
                            WHEN (activitys.act_mode ="2") THEN "ວຽກງານແມ່ຍິງ"                    
                            ELSE "ວຽກງານກຳມະບານ" END) as actmode'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'activitys.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('allactivity',compact('data'));
    }

    function Payment()
    {
        $data = staff::all();
        //$array_year =array();
        $year =date('Y');
        $stop =$year - 5;
        for($start =$year; $start >= $stop; $start--)
        {
            $array_year[] =$start;
        }
        //dd($array_year);
        return view('payment',compact('data','array_year'));
    }

    function SavePayment(Request $request){

        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'YearPay'=>'required',
            'Paytype'=>'required',
            'Total'=>'required',
            'PayDetail'=>'required'
        ]);
        $num = payment::where('IDSDED',$request->Name)
                        ->where('YearPayment', $request->YearPay)
                        ->where('PayType', $request->Paytype)
                        ->groupBy('IDSDED')->count();
        if($num >0){
            $data = DB::table('payment')
                ->select(DB::raw("SUM(Total) as total"))
                ->where('IDSDED',$request->Name)
                ->where('YearPayment', $request->YearPay)
                ->where('PayType', $request->Paytype)
                ->groupBy('IDSDED')->get();

            foreach($data as $dt){
                $array_data = $dt->total;
            }
            $data1 = json_decode(json_encode($request->Total, JSON_NUMERIC_CHECK|JSON_PRESERVE_ZERO_FRACTION|JSON_UNESCAPED_SLASHES), true);
            $total = 60000 - $data1;

            if($array_data <= $total){
                // $check = "LESS";
                // dd($check);
                $SavePay = new payment;
                $SavePay->IDSDED =$request->Name;
                $SavePay->YearPayment =$request->YearPay;
                $SavePay->PayType =$request->Paytype;
                $SavePay->Total =$request->Total;
                $SavePay->DetailPayment =$request->PayDetail;
                $SavePay->save();

                return redirect()->route('index')->with('success', 'ຈ່າຍສຳເລັດແລ້ວ');
            }
            else
            {
                // $check = "More";
                // dd($check);
                return redirect()->route('index')->with('warning', 'ບໍ່ສາມາດຈ່າຍໄດ້ ເນື່ອງຈາກເກີນວົງເງິນ');
            }

        }
        else
        {
                $SavePay = new payment;
                $SavePay->IDSDED =$request->Name;
                $SavePay->YearPayment =$request->YearPay;
                $SavePay->PayType =$request->Paytype;
                $SavePay->Total =$request->Total;
                $SavePay->DetailPayment =$request->PayDetail;
                $SavePay->save();

                return redirect()->route('index')->with('success', 'ຈ່າຍສຳເລັດແລ້ວ');
        }

    }

    function AddYouth()
    {
        $data = staff::all();
        $data1 = youth::select('youth.YouthID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','youth.YouthDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'youth.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('addyouth',compact('data','data1'));
    }

    function SaveYouth(Request $request)
    {

        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Reg_date'=>'required'
        ]);
        
        $data = youth::where('IDSDED',$request->Name)->count();
        if(!$data)
        {
            
            $save = new youth;
            $save->IDSDED =$request->Name;
            $save->YouthDate =$request->Reg_date;
            $save->save();

            return redirect()->route('webadmin.listyouth')->with('success', 'ເພີ້ມສະມາຊິກໃໝ່ສຳເລັດແລ້ວ');
        }
        else
        {
            //dd($data);
            return redirect()->route('webadmin.listyouth')->with('warning', 'ສະມາຊິກຜູ້ນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
        }
            
    }

    function DeleteYouth($id){
        
        $Delete = youth::where('YouthID',$id)->first();
        $Delete->delete();

        return redirect()->route('webadmin.listyouth')->with('success', 'ລົບຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }

    function AddLaoworker()
    {
        $data = staff::all();
        $data1 = laoworker::select('laoworker.LaoWorkerID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','laoworker.LaoWorkerDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'laoworker.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('addlaoworker',compact('data','data1'));
    }

    function SaveLaoworker(Request $request)
    {

        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Reg_date'=>'required'
        ]);
        
        $data = laoworker::where('IDSDED',$request->Name)->count();

        if(!$data)
        {
            $save = new laoworker;
            $save->IDSDED =$request->Name;
            $save->LaoWorkerDate =$request->Reg_date;
            $save->save();

            return redirect()->route('webadmin.listlaoworker')->with('success', 'ເພີ້ມສະມາຊິກໃໝ່ສຳເລັດແລ້ວ');
        }
        else
        {
            return redirect()->route('webadmin.listlaoworker')->with('warning', 'ສະມາຊິກຜູ້ນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
        }

    }

    function DeleteLaoworker($id){
        
        $Delete = laoworker::where('LaoWorkerID',$id)->first();
        $Delete->delete();

        return redirect()->route('webadmin.listlaoworker')->with('success', 'ລົບຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }


    function AddWomen()
    {
        $data = staff::all();
        $data1 = women::select('women.WomenID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','women.WomenDate as memberdate')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'women.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('addwomen',compact('data','data1'));
    }

    function SaveWomen(Request $request)
    {

        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Reg_date'=>'required'
        ]);
        $data = women::where('IDSDED',$request->Name)->count();
        //dd($data);
        if(!$data)
        {

            $save = new women;
            $save->IDSDED =$request->Name;
            $save->WomenDate =$request->Reg_date;
            $save->save();

            return redirect()->route('webadmin.listwomen')->with('success', 'ເພີ້ມສະມາຊິກໃໝ່ສຳເລັດແລ້ວ');
        }
        else
        {
            return redirect()->route('webadmin.listwomen')->with('warning', 'ສະມາຊິກຜູ້ນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
        }

    }

    function DeleteWomen($id){
        
        $Delete = women::where('WomenID',$id)->first();
        $Delete->delete();

        return redirect()->route('webadmin.listwomen')->with('success', 'ລົບຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }
    
    function AddStaff()
    {
        $data = positionlevel::all();
        $data1 = sdlist::all();
        $data2 = laoclan::all();
        $data3 = educationlevel::all();
        return view('addstaff',compact('data','data1','data2','data3'));
    }

    function SaveStaff(Request $request){

        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Lastname'=>'required',
            'Position'=>'required',
            'Location'=>'required',
            'Reg_date'=>'required',
            'Sex' => 'required',
            'Birth_date'=>'required',
            'Clanlao' => 'required',
            'Educationlevel' => 'required',
            'Logo' => 'required'
        ]);

        if ($request->hasfile('Logo'))
        {
            $file = $request->file('Logo');
            $filename =md5(date('Y-m-d') . microtime()) . time() . '_upload_.' . $file->getClientOriginalExtension();
            $location = public_path('/upload/');
            $file->move($location,$filename);
            //dd($location);
            $save = new staff;
            $save->SDEDName =$request->Name;
            $save->LastName =$request->Lastname;
            $save->PositionID =$request->Position;
            $save->SDlistID =$request->Location;
            $save->RegDate =$request->Reg_date;
            $save->Sex =$request->Sex;

            $save->Birthdate =$request->Birth_date;
            $save->Clan =$request->Clanlao;
            $save->Edu_level =$request->Educationlevel;

            $save->Logo =$filename;
            $save->save();

        return redirect()->route('webadmin.index');
        }

    }

    function GetUpdatestaff($id)
    {
        $staff = staff::where('IDSDED','=',$id)->first();    
        $data = positionlevel::all();
        $data1 = sdlist::all();
        $data2 = laoclan::all();
        $data3 = educationlevel::all();
        //return view('admin.updatejob',compact('Jobs'));
        //dd($staff,$data,$data1,$data2,$data3);

        return view('updatestaff',compact('staff','data','data1','data2','data3'));
    }

    function UpdateStaff(Request $request, $id){
        //dd($request);
        $this->validate($request,[
            'Name'=>'required',
            'Lastname'=>'required',
            'Position'=>'required',
            'Location'=>'required',
            'Reg_date'=>'required',
            'Birth_date'=>'required',
            'Sex' => 'required',
            'Clanlao' => 'required',
            'Educationlevel' => 'required'
        ]);
        //dd($request);
        $update = staff::where('IDSDED','=',$id)->first(); 
        

        if ($request->hasfile('Logo'))
        {
            $file = $request->file('Logo');
            $filename =md5(date('Y-m-d') . microtime()) . time() . '_upload_.' . $file->getClientOriginalExtension();
            $location = public_path('/upload/');
            $file->move($location,$filename);
            if(!$update->Logo){

            }else{
                unlink($location.$update->Logo);
            }
            

            $update->Logo =$filename;
            
        }
            $update->SDEDName =$request->Name;
            $update->LastName =$request->Lastname;
            $update->PositionID =$request->Position;
            $update->SDlistID =$request->Location;
            $update->RegDate =$request->Reg_date;
            $update->Sex =$request->Sex;

            $update->Birthdate =$request->Birth_date;
            $update->Clan =$request->Clanlao;
            $update->Edu_level =$request->Educationlevel;

            $update->save();

            return redirect()->route('webadmin.index');
    }

    function DeleteStaff($id)
    { 
        $Delete = staff::where('IDSDED',$id)->first();
        $relation = $Delete->deleteRelateStaff();
        if($relation == 1)
        {
            $location = public_path('/upload/');
            unlink($location.$Delete->Logo);
            $Delete->delete();
        }
        return redirect()->route('webadmin.index');
    }

    function ListLaomember()
    {
        //$staff = staff::all();
        $data = laomember::select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','laomember.LaoMemberLevel1 as member1','laomember.LaoMemberLevel2 as member2')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'laomember.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('alllaomember',compact('data'));
    }

    function AddLaomember()
    {
        $data = staff::all();
        $data1 = laomember::select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','laomember.LaoMemberLevel1 as member1','laomember.LaoMemberLevel2 as member2')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'laomember.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('addlaomember',compact('data','data1'));
    }

    function SaveLaomember(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Laomember1'=>'required'
        ]);
        
        $data = laomember::where('IDSDED',$request->Name)->count();

        if(!$data)
        {
            $save = new laomember;
            $save->IDSDED =$request->Name;
            $save->LaoMemberLevel1 =$request->Laomember1;
            $save->LaoMemberLevel2 =$request->Laomember2;
            $save->save();

            return redirect()->route('webadmin.listlaomember')->with('success', 'ເພີ້ມສະມາຊິກໃໝ່ສຳເລັດແລ້ວ');
        }
        else
        {
            return redirect()->route('webadmin.listlaomember')->with('warning', 'ສະມາຊິກຜູ້ນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
        }

    }

    function GetUpdatelaomember($id)
    {
        $staff = staff::all();    
        $data = laomember::select('laomember.LaoMemberID as id','staff.IDSDED as staffID','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','laomember.LaoMemberLevel1 as member1','laomember.LaoMemberLevel2 as member2')
                ->leftJoin('staff', 'staff.IDSDED', '=', 'laomember.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')
                ->where('staff.IDSDED', '=',$id)->first();
    //dd($staff,$data);
        return view('updatelaomember',compact('staff','data'));
    }

    function UpdateLaomember(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required',
            'Laomember1'=>'required',
            'Laomember2'=>'required'
        ]);
        
        $updatelaomem = laomember::where('IDSDED','=',$id)->first(); 

        //dd($request->all(),$updatelaomem);
        $updatelaomem->LaoMemberLevel1 =$request->Laomember1;
        $updatelaomem->LaoMemberLevel2 =$request->Laomember2;
        $updatelaomem->save();

        return redirect()->route('webadmin.listlaomember')->with('success', 'ແກ້ໄຂຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
        

    }

    function DeleteLaomember($id)
    {
        $DeleteLaomem = laomember::where('LaoMemberID',$id)->first();
        $DeleteLaomem->delete();
        return redirect()->route('webadmin.listlaomember')->with('success', 'ລົບຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }

    function AddLaosoldier()
    {
        $data = staff::all();
        $data1 = soldier::select('soldier.SID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location',
            DB::raw('("ເປັນພະນັກງານທະຫານ") as status'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'soldier.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('addsoldier',compact('data','data1'));
    }

    function SaveLaosoldier(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'Name'=>'required'
        ]);
        
        $data = soldier::where('IDSDED',$request->Name)->count();

        if(!$data)
        {
            $savesoldier = new soldier;
            $savesoldier->IDSDED =$request->Name;
            $savesoldier->save();

            return redirect()->route('webadmin.listlaosoldier')->with('success', 'ເພີ້ມສະມາຊິກໃໝ່ສຳເລັດແລ້ວ');
        }
        else
        {
            return redirect()->route('webadmin.listlaosoldier')->with('warning', 'ສະມາຊິກຜູ້ນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
        }

    }

    function ListallLaosoldier()
    {
        $data = soldier::select('soldier.SID as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location',
            DB::raw('("ເປັນພະນັກງານທະຫານ") as status'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'soldier.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')->get();
        return view('alllaosoldier',compact('data'));
    }

    function DeleteLaosoldier($id)
    {
        $DeleteLaomem = soldier::where('SID',$id)->first();
        $DeleteLaomem->delete();
        return redirect()->route('webadmin.listlaosoldier')->with('success', 'ລົບຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }

    function Profile($id)
    {
        $profile = staff::select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname','staff.Birthdate as birthdate',
            'positionlevel.PositionName as Position','sdlist.SDlistName as location','staff.RegDate as memberdate','educationlevel.LevelName as LevelName','staff.Sex as gender','staff.Logo as logo')
                ->leftJoin('positionlevel', 'staff.PositionID', '=', 'positionlevel.PositionID')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')
                ->leftJoin('educationlevel', 'staff.Edu_level', '=', 'educationlevel.LevelID')
                ->where('staff.IDSDED','=',$id)->first();

        $data = DB::table('activitys')
                ->select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','activitys.act_date as actdate',
            'activitys.description as description',
                DB::raw('(CASE WHEN (activitys.act_mode ="1") THEN "ວຽກງານຊາວໜຸ່ມ"
                            WHEN (activitys.act_mode ="2") THEN "ວຽກງານແມ່ຍິງ"                    
                            ELSE "ວຽກງານກຳມະບານ" END) as actmode'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'activitys.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')
                ->where('staff.IDSDED','=',$id)
                ->where('activitys.act_mode','=','1')
                ->get();

        $data1 = DB::table('activitys')
                ->select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','activitys.act_date as actdate',
            'activitys.description as description',
                DB::raw('(CASE WHEN (activitys.act_mode ="1") THEN "ວຽກງານຊາວໜຸ່ມ"
                            WHEN (activitys.act_mode ="2") THEN "ວຽກງານແມ່ຍິງ"                    
                            ELSE "ວຽກງານກຳມະບານ" END) as actmode'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'activitys.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')
                ->where('staff.IDSDED','=',$id)
                ->where('activitys.act_mode','=','2')
                ->get();

        $data2 = DB::table('activitys')
                ->select('staff.IDSDED as id','staff.SDEDName as fname','staff.LastName as lname',
            'sdlist.SDlistName as location','activitys.act_date as actdate',
            'activitys.description as description',
                DB::raw('(CASE WHEN (activitys.act_mode ="1") THEN "ວຽກງານຊາວໜຸ່ມ"
                            WHEN (activitys.act_mode ="2") THEN "ວຽກງານແມ່ຍິງ"                    
                            ELSE "ວຽກງານກຳມະບານ" END) as actmode'))
                ->leftJoin('staff', 'staff.IDSDED', '=', 'activitys.IDSDED')
                ->leftJoin('sdlist', 'staff.SDListID', '=', 'sdlist.SDListID')
                ->where('staff.IDSDED','=',$id)
                ->where('activitys.act_mode','=','3')
                ->get();
        //dd($data2);
        return view('profile',compact('profile','data','data1','data2'));
    }


    function AddActivity()
    {
        $data = staff::all();
        $data1 = activitytype::all();
    
        return view('activity',compact('data','data1'));
    }

    function SaveActivity(Request $request)
    {

        $this->validate($request,[
            'Name'=>'required',
            'Act_date'=>'required',
            'Act_type'=>'required',
            'Description'=>'required'
        ]);

            $data = activitys::where('IDSDED',$request->Name)
                ->where('act_date', $request->Act_date)
                ->where('act_mode', $request->Act_type)
                ->groupBy('IDSDED')->count();
            //dd($data);

            if($data < 1){
                $SaveAct = new activitys;
                $SaveAct->IDSDED =$request->Name;
                $SaveAct->act_date =$request->Act_date;
                $SaveAct->act_mode =$request->Act_type;
                $SaveAct->description =$request->Description;
                $SaveAct->save();
                //return view('allactivity',compact('data'));
                return redirect()->route('webadmin.listactivity')->with('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດແລ້ວ');
            }
            else
            {
                return redirect()->route('webadmin.listactivity')->with('warning', 'ຂໍ້ມູນນີ້ມີໃນຖານຂໍ້ມູນແລ້ວ');
            }

    }

    function AddnewLocation()
    {
        $data = sdlist::all();
        return view('addlolist',compact('data'));
    }

    function SaveLocation(Request $request)
    {
        $this->validate($request,[
            'LocationName'=>'required'
        ]);

        $Savelo = new sdlist;
        $Savelo->SDlistName =$request->LocationName;
        $Savelo->save();
        return redirect()->route('webadmin.listlocation')->with('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດແລ້ວ');
    }
    function AddnewActivity()
    {
        $data = activitytype::all();
        return view('addactivitytype',compact('data'));
    }

    function SaveActivitytype(Request $request)
    {
        $this->validate($request,[
            'Activitytype'=>'required'
        ]);

        $SaveactType = new activitytype;
        $SaveactType->Act_Typename =$request->Activitytype;
        $SaveactType->save();
        return redirect()->route('webadmin.listactivitytype')->with('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດແລ້ວ');
    }

    function AddSlideshow()
    {
        return view('addslide');
    }

    function SaveSlideshow(Request $request)
    {
        $this->validate($request,[
            'Name'=>'required',
            'slide'=>'required'
        ]);

        if ($request->hasfile('slide'))
        {

            $allowedfileExtension=['jpeg','jpg','png'];
            $file = $request->file('slide');
            $filename =md5(date('Y-m-d') . microtime()) . time() . '_upload_.' . $file->getClientOriginalExtension();
            $location = public_path('/upload/');

            $check =in_array($file->getClientOriginalExtension(), $allowedfileExtension);
            if($check)
            {
            $file->move($location,$filename);
            //dd($location);
            $Saveslide = new slideshow;
            $Saveslide->slidename =$request->Name;
            $Saveslide->slidepath =$filename;
            $Saveslide->save();

                return redirect()->route('webadmin.listallslideshow')->with('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດແລ້ວ');
            }
            else
            {
                return redirect()->route('webadmin.listallslideshow')->with('warning','Sorry, please only upload png, jpg, jpeg');
            }
            
        }

    }
    function ListallSlideshow()
    {
        $data = slideshow::all();
        //dd($data);
        return view('allslide',compact('data'));
    }
    function DeleteSlideshow($id)
    {
        $Deleteslide = slideshow::where('slideID',$id)->first();
        $Deleteslide->delete();
        return redirect()->route('webadmin.listallslideshow');
    }
}
