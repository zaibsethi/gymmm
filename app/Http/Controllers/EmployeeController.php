<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeAttandanceRequest;
use App\Http\Requests\EmployeeCheckOutAttandance;
use App\Http\Requests\EmployeeTaskAddRequest;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employeeAttandance()
    {
        return view('employee-attandance');

    }

    public function markEmployeeAttandance(EmployeeAttandanceRequest $request)
    {
//        $request->validate([
//            'date' => 'unique:employees,date,' . $request->id . ',id,name,' . $request->name
//        ]);


        $allAttandanceData = Employee::all();
        $cdate = Carbon::now()->format('d.m.Y');

        $attendanceData = $request->all();

        Employee::create($attendanceData);

        return redirect()->route('employeeAttandance')->with('success', 'Check In Added.');

//        foreach ($allAttandanceData as $allAttandanceVar) {
//
//
//            $getDate = ($allAttandanceVar->created_at)->format('d.m.Y');
//            if ((($allAttandanceVar->name) != ($request->name)) && (($getDate) != ($cdate))) {
//                Employee::create($attendanceData);
//
//                return redirect()->route('employeeAttandance')->with('success', 'Attandance Added.');
//
//
//            } else {
//                return redirect()->route('employeeAttandance')->with('danger', ' Allready Marked.');
//
//            }
//        }


    }

    public function updateEmployeeAttandance(Request $request)
    {
        $cdate = Carbon::now()->format('d.m.Y');
        $cdateAndTime = Carbon::now();

        $compareEmployeeData = Employee::all();
        foreach ($compareEmployeeData as $compareEmployeeVar) {
//            $checkNewDate = ($compareEmployeeVar->created_at)->format('d.m.Y');

            if ($compareEmployeeVar->date == $cdate && $compareEmployeeVar->name == $request->name) {
                Employee::where('name', $request->name)->update(['updated_at' => $cdateAndTime]);

            }

        }

        return redirect()->route('employeeAttandance')->with('success', 'Check Out Marked.');

    }

    public function employeeAttandanceList()

    {
        $employeeAttandance = Employee::all();

        return view('employee-attandance-list', compact('employeeAttandance'));


    }

    public function employeeTask()
    {

        return view('task');
    }

    public function taskDone(EmployeeTaskAddRequest $request)
    {
        $taskDone = $request->all();
        Task::create($taskDone);
        return redirect(route('employeeTask'))->with('success', 'Tasks Added..');
    }

    public function taskDoneList()
    {
        $taskDoneListVar = Task::all();

        return view('task-done-list', compact('taskDoneListVar'));
    }

    public function whatsappMessage()
    {
        return view('whatsapp-message');
    }
}



