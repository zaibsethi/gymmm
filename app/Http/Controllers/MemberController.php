<?php

namespace App\Http\Controllers;

use App\Attandance;
use App\Http\Requests\MemberAttandance;
use App\Member;
use App\OldMember;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function storeMember(Request $request)
    {

        $formData = $request->all();
        Member::create($formData);

        return redirect()->route('addMember')->with('success', 'Member Added.');

    }

    public function memberList()
    {
//        retreive members table data
        $membersData = Member::all();

//     current date
        $cdate = Carbon::now();
        $cdate1 = $cdate->toDateString();

        foreach ($membersData as $memberVarDate) {

            $mdate = $memberVarDate->fee_date;

//            if (($mdate) > ($cdate1))
//                return redirect()->route('memberList', compact('membersData'))->with('success', 'Registered Member.');
//            else
//                return redirect()->route('memberList', compact('membersData'))->with('danger', 'Pay your  Fee.');

        }

//        adding 4 days in current date
        $currentDate = Carbon::now();
        $currentDateVar = $currentDate->toDateString();
        $currentDateAddDays = date('Y-m-d', (strtotime('+4 day', strtotime($currentDate))));

        return view('members-list', compact('membersData', 'cdate1', 'currentDateAddDays'));
    }

    public function addAttendance(Member $id, Request $request)
    {


        $allAttandanceData = Attandance::all();
        $cdate = Carbon::now()->format('d.m.Y');

        foreach ($allAttandanceData as $allAttandanceDataVar) {
            if ($allAttandanceDataVar->date == $cdate && $allAttandanceDataVar->name == $request->name) {
                return redirect()->route('memberList')->with('success', 'Already Marked.');

            }

        }

        $attendanceData = $request->all();
        Attandance::create($attendanceData);

        $membersData = Member::all();
        $cdate = Carbon::now();
        $cdate1 = $cdate->toDateString();
        $memberDate = Member::where('roll_num', $request->roll_num)->Where('name', $request->name)->get();

        foreach ($memberDate as $memberVarDate) {

            $mdate = $memberVarDate->fee_date;

            $date4 = ($cdate->diffInDays($mdate));

//            $aDays = ($mdate->addDays(30));
//
//            dd($aDays);

//            dd($date4);
//            if (($date4) > 3) {
//                return redirect()->route('memberList', compact('membersData'))->with('block', 'Member Blocked.');
//
//            }


            if (($mdate) > ($cdate1))
                return redirect()->route('memberList', compact('membersData'))->with('success', 'Attandance Marked. Fee Date' . ' ' . $memberVarDate->fee_date);
            else
                return redirect()->route('memberList', compact('membersData'))->with('danger', 'Pay your  Fee.' . ' ' . $memberVarDate->fee_date);

        }


    }

    public function redList()
    {

//        retrive members table data
//        $redMembersData = Member::all();
        $redMembersData = Member::orderBy('fee_date', 'ASC')->get();

//      current date
        $date = Carbon::now();
        $cdate = $date->toDateString();

        return view('red-list', compact('redMembersData', 'cdate'));

    }

    public function editMember($id)
    {
        $memberVar = Member::find($id);

//        dd($memberVar);

        return view('edit-member', compact('memberVar'));

    }

    public function updateMember(Request $request, Member $id)
    {
        $memberVar = $request->all();

        $id->update($memberVar);

        return redirect()->route('redList')->with("success", "Member has been Updated successfully");


    }

    public function findMember(Request $request)
    {

        // retrive all data from members table
        $membersData = Member::all();

//       getting request data
        $formData = $request->all();

        if ($request->find_num == null) {
            return redirect()->route('memberList')->with('success', 'Null Value');

        }

        foreach ($membersData as $membersFindMember) {

//         if request phone is equal to member number it will store in old member table
            if ($membersFindMember->phone == $request->find_num) {
                OldMember::create($formData);

                return redirect()->route('memberList')->with('success', $membersFindMember->name . '  ' . $membersFindMember->roll_num);
            }
        }


//        dd($request->find_num);
        return redirect()->route('memberList')->with('danger', 'Member NOT Found.');
    }

    public function attandanceList()
    {
        $membersData = Attandance::orderBy('created_at', 'desc')->get();

//      getting current date for comparing fee due date
        $cdate = Carbon::now();
        $current_date = $cdate->toDateString();

        return view('attandance', compact('membersData', 'current_date'));

    }

    public function dailyAttandanceList()
    {
        //curent date different format
        $cdate = Carbon::now()->format('d.m.Y');

        // getting all attandance list by desc order
        $membersData = Attandance::orderBy('created_at', 'desc')->get();;

        //curent date different format
        $curdate = Carbon::now();
        $cdate1 = $curdate->toDateString();

        return view('daily-attandance-list', compact('membersData', 'cdate', 'cdate1'));


    }

    public function oldList()
    {
//        getting members table data and old members table data for comparing
        $memberListData = Member::all();
        $OldembersData = OldMember::all();


        return view('old-list', compact('memberListData', 'OldembersData'));


    }
}
