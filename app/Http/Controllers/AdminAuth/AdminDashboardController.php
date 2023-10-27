<?php


namespace App\Http\Controllers\AdminAuth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{

    public function newusers(Request $request)
    {
        $search=$request['search']??"";
        if($search!==""){
            $users=DB::table('users')->where('status','=',0)->where('txnid','=',$search)->get()->paginate(6);
        }else{
            $users=DB::table('users')->select('*')->where('status','=',0)->get()->paginate(6);
        }
        $users=compact('users','users');
        return view('admin.NewUsers.NewUsers')->with($users);
} 

public function oldusers(Request $request)
{
    $search=$request['search']??"";
    if($search!==""){
        $users=DB::table('users')->where('status','=',1)->where('txnid','=',$search)->get()->paginate(6);
    }else{
        $users=DB::table('users')->select('*')->where('status','=',1)->get()->paginate(6);
    }
    $users=compact('users','users');
    return view('admin.OldUsers.OldUsers')->with($users);
} 
public function updateusers(Request $request)
{
    $check = $request->check;

    $users=DB::table("users")->whereIn('id',$check)->update(['status'=>'1']);
    return redirect()->back();

}
public function deleteusers(Request $request)
{
    $delete = $request->delete;

    $users=DB::table("users")->whereIn('id',$delete)->delete();

    return redirect()->back();

}

public function goback(Request $request)
{
    $delete = $request->delete;

    $users=DB::table("users")->whereIn('id',$delete)->update(['status'=>'0']);

    return redirect()->back();

}

public function availableseat(){

    $seat=DB::table('availableseat')->get();
   
    return view('admin.AvailableSeat.AvailableSeat',['seat'=>$seat]);
}

public function updateavailableseat(Request $request)
{
        $newseat=$request->newseat;
        $ratio=$request->ratio;
        $ids=$request->ids;
        
        $seat = DB::table('availableseat')
         ->whereIn('s_id', $ids)
         ->update([
             'available_seat' => $newseat,
             'admission_ratio' => $ratio
         ]);

        return redirect()->back();
}

public function migration(){
    
    return view('admin.Migration.Migration');
}

public function migrate(){
    DB::table('subject_choice_a')
    ->whereExists(function ($query) {
        $sa = 'subject_choice_a';
        $query->select(DB::raw(1))
            ->from('selected_students')
            ->whereRaw("$sa.Subject_Order >= selected_students.Subject_Order")
            ->whereRaw("$sa.Roll = selected_students.Roll");
    })
    ->delete();

DB::table('subject_choice_b')
    ->whereExists(function ($query) {
        $sb = 'subject_choice_b';
        $query->select(DB::raw(1))
            ->from('selected_students')
            ->whereRaw("$sb.Subject_Order >= selected_students.Subject_Order")
            ->whereRaw("$sb.Roll = selected_students.Roll");
    })
    ->delete();

DB::table('subject_choice_c')
    ->whereExists(function ($query) {
        $sc = 'subject_choice_c';
        $query->select(DB::raw(1))
            ->from('selected_students')
            ->whereRaw("$sc.Subject_Order >= selected_students.Subject_Order")
            ->whereRaw("$sc.Roll = selected_students.Roll");
    })
    ->delete();


return redirect()->back();
}

public function migrationdetails_a(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_a')->select('Roll','Merit')->distinct()->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_a')->select('Roll','Merit')->distinct()->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');

    return view('admin.Migrationdetails_a.Migrationdetails_a')->with($subject_choice);
}

public function migrationdetails_b(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_b')->select('Roll','Merit')->distinct()->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_b')->select('Roll','Merit')->distinct()->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');

    return view('admin.Migrationdetails_b.Migrationdetails_b')->with($subject_choice);
}

public function migrationdetails_c(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_c')->select('Roll','Merit')->distinct()->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_c')->select('Roll','Merit')->distinct()->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');

    return view('admin.Migrationdetails_c.Migrationdetails_c')->with($subject_choice);
}

public function Studentsdetails_a(Request $request){
    $roll=$request->roll;

    $subject_choice=DB::table('Subject_Choice_a')->select('*')->whereIn('Roll',$roll)->orderBy('Subject_Order', 'ASC')->get()->paginate(25);

    return view('admin.Studentsdetails_a.Studentsdetails_a',['subject_choice'=>$subject_choice]);
}

public function Studentsdetails_b(Request $request){
    $roll=$request->roll;

    $subject_choice=DB::table('Subject_Choice_b')->select('*')->whereIn('Roll',$roll)->orderBy('Subject_Order', 'ASC')->get()->paginate(25);

    return view('admin.Studentsdetails_b.Studentsdetails_b',['subject_choice'=>$subject_choice]);
}

public function Studentsdetails_c(Request $request){
    $roll=$request->roll;

    $subject_choice=DB::table('Subject_Choice_c')->select('*')->whereIn('Roll',$roll)->orderBy('Subject_Order', 'ASC')->get()->paginate(25);

    return view('admin.Studentsdetails_c.Studentsdetails_c',['subject_choice'=>$subject_choice]);
}

public function stopmigration_a(Request $request)
{
    $gstroll=$request->gstroll;

    $stop_migration=DB::table("Subject_Choice_a")->whereIn('Roll',$gstroll)->delete();

    return redirect()->back();

}

public function stopmigration_b(Request $request)
{
    $gstroll=$request->gstroll;

    $stop_migration=DB::table("Subject_Choice_b")->whereIn('Roll',$gstroll)->delete();

    return redirect()->back();

}


public function stopmigration_c(Request $request)
{
    $gstroll=$request->gstroll;

    $stop_migration=DB::table("Subject_Choice_c")->whereIn('Roll',$gstroll)->delete();

    return redirect()->back();

}


public function stopmigrate(){
    DB::table('subject_choice_a')
    ->whereExists(function ($query) {
        $query->select(DB::raw(1))
            ->from('stop_migration')
            ->whereRaw('subject_choice_a.Roll = stop_migration.Roll');
    })
    ->delete();

DB::table('subject_choice_b')
    ->whereExists(function ($query) {
        $query->select(DB::raw(1))
            ->from('stop_migration')
            ->whereRaw('subject_choice_b.Roll = stop_migration.Roll');
    })
    ->delete();

DB::table('subject_choice_c')
    ->whereExists(function ($query) {
        $query->select(DB::raw(1))
            ->from('stop_migration')
            ->whereRaw('subject_choice_c.Roll = stop_migration.Roll');
    })
    ->delete();


    return redirect()->back();
}

public function Stopmigrationlist(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $roll=DB::table('stop_migration')->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $roll = DB::table('stop_migration')->get()->paginate(25);

    }
    $roll=compact('roll','roll');
    return view('admin.Stopmigrationlist.Stopmigrationlist')->with($roll);
}

public function Selectedlist(Request $request)
{
    $search=$request['search']??"";
    if($search!==""){
        $selected=DB::table('selected_students')->where('Roll','=',$search)->orderBy('Merit', 'ASC')->get()->paginate(25);
    }else{
        $selected=DB::table('selected_students')->orderBy('Merit', 'ASC')->get()->paginate(25);
    }
    $selected=compact('selected','selected');

    return view('admin.Selectedlist.Selectedlist')->with($selected);;

}

public function allSubjects_a(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_a')->orderBy('Merit','ASC')->orderBy('Subject_Order', 'ASC')->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_a')
                    ->orderBy('Subject_Order', 'asc')
                    ->orderBy('Subject', 'asc')
                    ->orderBy('Merit', 'asc')
                    ->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');
    

    return view('admin.AllSubjects_a.AllSubjects_a')->with($subject_choice);
}


public function allSubjects_b(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_b')->orderBy('Merit','ASC')->orderBy('Subject_Order', 'ASC')->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_b')
                    ->orderBy('Subject_Order', 'asc')
                    ->orderBy('Subject', 'asc')
                    ->orderBy('Merit', 'asc')
                    ->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');
    

    return view('admin.AllSubjects_b.AllSubjects_b')->with($subject_choice);
}

public function allSubjects_c(Request $request){
    $search=$request['search']??"";
    if($search!==""){
        $subject_choice=DB::table('Subject_Choice_c')->orderBy('Merit','ASC')->orderBy('Subject_Order', 'ASC')->where('Roll','=',$search)->get()->paginate(25);
    }else{
        $subject_choice = DB::table('Subject_Choice_c')
                    ->orderBy('Subject_Order', 'asc')
                    ->orderBy('Subject', 'asc')
                    ->orderBy('Merit', 'asc')
                    ->paginate(25);

    }
    $subject_choice=compact('subject_choice','subject_choice');
    

    return view('admin.AllSubjects_c.AllSubjects_c')->with($subject_choice);
}

}
