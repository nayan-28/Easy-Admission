<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    /*Students Details Panel*/  

public function details(){
        $roll=Auth::user()->roll;
    
        $tables = ['Subject_Choice_a', 'Subject_Choice_b', 'Subject_Choice_c'];
            $found = false;
            $subject_name = [];
            $subject_choice = [];
            $seat=[];
    foreach ($tables as $table) {
    $count = DB::table($table)
        ->where('Roll', '=', $roll)
        ->count();

    if ($count > 0) {
        // user's data is in this table
        $found = true;

        $seat = DB::table('availableseat')
            ->join($table, function ($join) use ($roll, $table) {
                $join->on('availableseat.s_id', '=', $table.'.s_id')
                     ->where($table.'.Roll', '=', $roll);
            })
            ->select('availableseat.subject_name', 'availableseat.total_seat', 'availableseat.available_seat', $table.'.Subject_Order', 'availableseat.admission_ratio')
            ->orderBy($table.'.Subject_Order', 'ASC')
            ->get();
    
        $merits = DB::table($table)
            ->select('Merit')
            ->distinct()
            ->where('Roll', '=', $roll)
            ->pluck('Merit')
            ->toArray();
    
        $appliedSubjects = DB::table($table)
            ->select('Subject')
            ->where('Roll', '=', $roll)
            ->get()
            ->pluck('Subject')
            ->toArray();
    
        $subject_choice = DB::table($table)
            ->select('Subject', DB::raw('count(*) as subject_count'))
            ->whereIn('Subject', function ($query) use ($roll, $table) {
                $query->select('Subject')
                    ->from($table)
                    ->where('Roll', $roll);
            })
            ->where('Merit', '<=', $merits)
            ->groupBy('Subject')
            ->orderBy('Subject', 'ASC')
            ->get();

        break; // exit loop as soon as user's data is found
        
    }
}

if (!$found) {
    // user's data is not found in any table
    // handle the case as necessary
}

$subject_name = DB::table('selected_students')->where('Roll', '=', $roll)->get();

return view('details.details', ['seat' => $seat, 'subject_choice' => $subject_choice, 'subject_name' => $subject_name]);


    }



public function home(){
    
        return view('welcome');
    }
}
