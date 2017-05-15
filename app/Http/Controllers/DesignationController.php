<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designations = Designation::whereIn('status', [0, 1])->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'designations' => $designations
            ];

        return view('designation.designations', $data);
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
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('designation.add_designation', $data);
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
        $description = Input::get('description');

        $rules =
            [
                'title' => 'required|unique:designations,title'
            ];
        $message =
            [
                'title.required' => 'Title required',
                'title.unique' => 'Designation already exist'
            ];

        $this->validate($request, $rules, $message);

        $description = (empty($description)) ? NULL : $description;

        $designation = Designation::create
        (
            [
                'title' => $title,
                'description' => $description,
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if ($designation) {
            Session::flash('success', 'Designation added successfully');

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
        $designation = Designation::where('id', $id)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'designation' => $designation
            ];

        return view('designation.edit_designation', $data);

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
        $description = Input::get('description');
        $status = Input::get('status');

        $rules =
            [
                'title' => 'required|unique:designations,title,' . $id
            ];
        $message =
            [
                'title.required' => 'Title required',
                'title.unique' => 'Designation already exist'
            ];

        $this->validate($request, $rules, $message);

        $description = (empty($description)) ? NULL : $description;

        $designation = Designation::where('id', $id)->update
        (
            [
                'title' => $title,
                'description' => $description,
                'status' => $status
            ]
        );

        if ($designation) {
            Session::flash('success', 'Designation updated successfully');

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
        $designation = Designation::findOrFail($id);
        if ($designation->delete()) {
            Session::flash('success', 'Designation deleted successfully');
        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function show_trash()
    {
        $designations = Designation::where('status', 2)->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'designations' => $designations
            ];

        return view('designation.trashed_designations', $data);
    }

    public function trash($id)
    {

        $designation = Designation::where('id', $id)->update(['status' => 2]);
        if ($designation) {
            Session::flash('success', 'Designation has been sent to trash');

        } else {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function restore($id)
    {
        $designation = Designation::where('id', $id)->update(['status' => 1]);
        if ($designation) {
            Session::flash('success', 'Designation restore successfully');


        } else {
            Session::flash('error', 'Something went wrong, try again');


        }

        return redirect()->back();
    }


}
