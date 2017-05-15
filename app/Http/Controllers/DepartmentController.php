<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentType;
use App\Models\District;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::whereIn('status', [0, 1])->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'departments' => $departments
            ];

        return view('department.departments', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'districts' => District::where([['status', '=', 1]])->get(),
                'department_types' => DepartmentType::where([['status', '=', 1]])->get()
            ];
        return view('department.add_department', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $title = Input::get('title');
        $district = Input::get('district');
        $department_type = Input::get('department_type');
        $department_level = Input::get('department_level');
        $short_name = Input::get('short_name');
        $description = Input::get('description');


        $rules =
            [
                'title' => 'required'
            ];
        $messages =
            [
                'title.required' => 'Title required',
                'title.unique' => 'Department already exist'
            ];

        $this->validate($request, $rules, $messages);

        $department_check = Department::where(
            [
                ['title', '=', $title],
                ['district_id', '=', $district],
                ['department_type_id', '=', $department_type],
                ['department_level', '=', $department_level]
            ])->get();
        if ($department_check->count() > 0) {
            Session::flash('error', 'Department <b>' . $title . '</b> already exist');
            return redirect()->back();
        }

        $short_name = (empty($short_name) ? NULL : $short_name);
        $description = (empty($description) ? NULL : $description);

        $department = Department::create
        (
            [
                'title' => $title,
                'district_id' => $district,
                'department_type_id' => $department_type,
                'short_name' => $short_name,
                'description' => $description,
                'department_level' => $department_level,
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if ($department) {
            Session::flash('success', 'New department added successfully');
        } else {
            Session::flash('error', 'Something went wrong, try again');

        }

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $department = Department::where('id', $id)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'districts' => District::where([['status', '=', 1]])->get(),
                'department_types' => DepartmentType::where([['status', '=', 1]])->get(),
                'department' => $department
            ];

        return view('department.edit_department', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $title = Input::get('title');
        $district = Input::get('district');
        $department_type = Input::get('department_type');
        $department_level = Input::get('department_level');
        $short_name = Input::get('short_name');
        $description = Input::get('description');
        $status=Input::get('status');


        $rules =
            [
                'title' => 'required'
            ];
        $messages =
            [
                'title.required' => 'Title required',
                'title.unique' => 'Department already exist'
            ];

        $this->validate($request, $rules, $messages);

        $department_check = Department::where(
            [
                ['title', '=', $title],
                ['district_id', '=', $district],
                ['department_type_id', '=', $department_type],
                ['department_level', '=', $department_level],
                ['id', '!=', $id]
            ])->get();
        if ($department_check->count() > 0) {
            Session::flash('error', 'Department <b>' . $title . '</b> already exist');
            return redirect()->back();
        }

        $short_name = (empty($short_name) ? NULL : $short_name);
        $description = (empty($description) ? NULL : $description);

        $department = Department::where('id', $id)->update(
            [
                'title' => $title,
                'district_id' => $district,
                'department_type_id' => $department_type,
                'short_name' => $short_name,
                'description' => $description,
                'department_level' => $department_level,
                'status' => $status
            ]);

        if ($department) {
            Session::flash('success', 'Department updated successfully');
        } else {
            Session::flash('error', 'Something went wrong, try again');

        }

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $departments=Department::findOrFail($id);
        if($departments->delete())
        {
            Session::flash('success', 'Department deleted successfully');

        } else {
            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();
    }

    public function show_trash()
    {
        $departments = Department::where('status', 2)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'departments' => $departments
            ];

        return view('department.trashed_departments', $data);
    }

    public function trash($id)
    {

        $department = Department::where('id', $id)->update(['status' => 2]);
        if ($department) {
            Session::flash('success', 'Department has been sent to trash');

        } else {
            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();
    }

    public function restore($id)
    {
        $department = Department::where('id', $id)->update(['status' => 1]);
        if ($department) {
            Session::flash('success', 'Department restore successfully');


        } else {
            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();
    }
}
