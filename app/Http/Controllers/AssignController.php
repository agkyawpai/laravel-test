<?php

namespace App\Http\Controllers;

use App\Assign;
use App\Employee;
use App\RoleDepEmp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignController extends Controller
{
    // public function show(Request $request)
    // {
    //     $titles = DB::table('assigns')->where('emp_id', $request->id)->pluck('title', 'created_at');
    //     return $titles;
    // }
    // public function orWhere()
    // {
    //     $titles = DB::table('assigns')
    //         ->where('emp_id', '>', 100)
    //         ->orWhere('title', 'Urban Planner')
    //         ->get();
    //     return $titles;
    // }
    // public function whereTime()
    // {
    //     $titles = DB::table('assigns')
    //         ->whereTime('created_at', '=', '04:04:45')
    //         ->get();
    //     return $titles;
    // }

    public function createAssign(Request $request)
    {
        $assignments = $request->all_assignments;
        $data = [];
        foreach ($assignments as $assignment) {
            $data = [
                'employee_id' => $assignment['employee_id'],
                'title' => $assignment['title'],
                'progress' => $assignment['progress'],
                'start_date' => $assignment['start_date'],
                'end_date' => $assignment['end_date'],
                'created_at' => now(),
                'updated_at' => now()
            ];
            Assign::insert($data);
        }

        return response()->json(['message' => 'Assignments created successfully'], 201);
    }
    public function activeAssign(Request $request)
    {
        $employee_id = $request->employee_id;
        $activeAssignments = Assign::where('employee_id', $employee_id)
            ->whereDate('start_date', '<=', Carbon::now())
            ->where('progress', '<', 100)
            ->whereNull('deleted_at')
            ->get();
        return response()->json(['message' => "Assignments of EmployeeId: $employee_id", 'assignments' => $activeAssignments], 200);
    }

    public function updateProgress(Request $request)
    {
        $assignmentId = $request->assignment_id;
        $newProgress = $request->new_progress;

        $assignment = Assign::find($assignmentId);
        if ($assignment) {
            $assignment->progress = $newProgress;
            $assignment->save();
            return response()->json(['message' => 'Progress updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No active assignments or late assignments for this employee'], 404);
        }
    }
    public function deleteAssignment(Request $request)
    {
        $assignmentId = $request->assignment_id;
        $assignment = Assign::find($assignmentId);

        if ($assignment) {
            $assignment->delete();
            return response()->json(['message' => 'Assignment deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Assignment not found'], 404);
        }
    }

    public function deleteEmployee(Request $request)
    {
        $employeeID = $request->employee_id;
        $employee = Employee::find($employeeID);

        if ($employee) {
            $employee->delete();
            $employee->assignments()->delete();

            return response()->json(['message' => 'Employee and their assignments deleted successfully']);
        }

        return response()->json(['message' => 'Employee not found'], 404);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = RoleDepEmp::select(
            'employees.emp_name',
            'departments.dep_name',
            'assigns.title',
            'roles.role_name',
            'assigns.start_date',
            'assigns.end_date',
            'assigns.progress'
        )
            ->join('employees', 'role_dep_emp.employee_id', '=', 'employees.id')
            ->join('roles', 'role_dep_emp.role_id', '=', 'roles.id')
            ->join('departments', 'role_dep_emp.department_id', '=', 'departments.id')
            ->join('assigns', 'employees.id', '=', 'assigns.employee_id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('departments.dep_name', $search)
                    ->orWhere('roles.role_name', $search)
                    ->orWhere('assigns.title', $search)
                    ->orWhere('assigns.progress', $search)
                    ->orWhere('assigns.start_date', $search)
                    ->orWhere('assigns.end_date', $search);
            });
        }

        $results = $query->get();

        return $results;
    }
}
