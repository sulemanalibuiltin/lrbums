<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::whereIn('status', [0, 1])->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'roles' => $roles,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('role.roles', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $modules=Module::whereIn('status', [0, 1])->get();
        $modules_select = "";
        foreach ($modules as $module)
        {
            if($module->parent_id == 0)
            {
                $modules_select .= "<optgroup label='$module->title'>";

                foreach($modules as $cmodule)
                {
                    if($cmodule->parent_id == $module->id)
                    {
                        $modules_select .= "<option value='$cmodule->id'>$cmodule->title</option>";
                    }
                }

                $modules_select .= "</optgroup>";
            }
        }



        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'modules_select' => $modules_select,
                'modules' => Module::whereIn('status', [0, 1])->get()
            ];
        return view('role.add_role', $data);
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
        $homepage = Input::get('homepage');
        $description = Input::get('description');
        $assign_modules = Input::get('checked_modules');

        $rules =
            [
                'title' => 'required',
                'checked_modules' => 'required'
            ];
        $messages =
            [
                'title.required' => 'Title required',
                'checked_modules.required' => 'Modules required'

            ];

        $this->validate($request, $rules, $messages);

        $assign_modules = explode(',', $assign_modules);



        //dd($assign_modules);
        $description = empty($description) ? NULL : $description;


        $role = Role::create
        (
            [
                'title' => $title,
                'homepage_id' => $homepage,
                'description' => $description,
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if ($role) {
            $compiled_module_ids = Module::compileModuleIds($assign_modules);
            if($compiled_module_ids > 1) {
                $this->addRights($role->id, $compiled_module_ids);
            }

            Session::flash('success','New role added successfully');

        } else {
            Session::flash('error', 'Something went wrong, try again');

        }

        return redirect()->back();


    }

    public function addRights($role_id, $modules_ids)
    {
        $role=Role::where('id', $role_id)->first();
        foreach ($modules_ids as $module_id)
        {
            $module=Module::where('id',$module_id)->first();
            $role->modules()->attach($module->id,
                    [
                        'created_by' => Session::get('user')[0]->id,
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'updated_at' => Carbon::now()->toDateTimeString()
                    ]);

        }
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
        $role=Role::where('id', $id)->with('modules')->first();
        $modules=Module::whereIn('status', [0, 1])->get();
        $assigned_modules=$role->modules()->get()->toArray();

        $modules_select = "";
        foreach ($modules as $module)
        {
            if($module->parent_id == 0)
            {
                $modules_select .= "<optgroup label='$module->title'>";

                foreach($modules as $cmodule)
                {
                    if($cmodule->parent_id == $module->id)
                    {
                        if($cmodule->id == $role->homepage_id)
                            $modules_select .= "<option value='$cmodule->id' selected='selected'>$cmodule->title</option>";
                        else
                            $modules_select .= "<option value='$cmodule->id'>$cmodule->title</option>";
                    }
                }

                $modules_select .= "</optgroup>";
            }
        }

        $data =
            [
                'page' => Route::currentRouteName(),
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route,
                'modules' => Module::whereIn('status', [0, 1])->get(),
                'modules_select' => $modules_select,
                'assigned_modules' => array_column($assigned_modules, 'id'),
                'role' => $role
            ];

        return view('role.edit_role', $data);
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
        $homepage = Input::get('homepage');
        $description = Input::get('description');
        $status=Input::get('status');
        $prev_assigned_modules=Input::get('assigned_modules');
        $assign_modules = Input::get('checked_modules');

        $rules =
            [
                'title' => 'required'
            ];
        $messages =
            [
                'title.required' => 'Title required'

            ];

        $this->validate($request, $rules, $messages);

        $assign_modules = explode(',', $assign_modules);

        //dd($assign_modules);
        $description = empty($description) ? NULL : $description;


        $role = Role::findOrFail($id);
        $role_update=Role::where('id', $id)->update(['homepage_id' => $homepage,
                                    'title' => $title,
                                    'description' => $description,
                                    'status' => $status]);



        if ($role_update) {
            $role->modules()->detach();
            $compiled_module_ids = Module::compileModuleIds($assign_modules);
            if($compiled_module_ids > 1) {
                $this->addRights($role->id, $compiled_module_ids);
            }

            Session::flash('success','Role updated successfully');

        } else {
            Session::flash('error', 'Something went wrong, try again');

        }

        return redirect(route('roles.index'));


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
        $role=Role::findOrFail($id);
        if($role->delete())
        {
            $role->modules()->detach();

            Session::flash('success', 'Role deleted successfully');
        }
        else
        {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();

    }

    public function trashed($id)
    {
        //dd($id);
        $role=Role::where('id', $id)->update(['status' => '2']);
        if($role)
        {
            Session::flash('success', 'Role trashed successfully');

        }
        else
            {
                Session::flash('error', 'Something went wrong, try again');
            }

            return redirect()->back();

    }

    public function show_trash()
    {
        $roles=Role::where([['status','=', 2]])->get();
        $data=
            [
                'page' => 'Modules',
                'roles' => $roles,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('role.trashed_roles', $data);
    }

    public function restore($id)
    {
        $role=Role::where('id', $id)->update(['status' => '1']);
        if($role)
        {
            Session::flash('success', 'Role restore successfully');

        }
        else
        {
            Session::flash('error', 'Something went wrong, try again');
        }

        return redirect()->back();
    }
}
