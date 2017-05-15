<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\AssignOp\Mod;
use Yajra\Datatables\Datatables;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return redirect(route('modules.controllers'));


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
        return view('module.add_controller', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $title=Input::get('title');
        $description=Input::get('description');
        $route=Input::get('route');
        $menu_status=Input::get('menu_status');
        $icon=Input::get('icon');

        $rules=
            [
                'title' => 'required|unique:modules,title',
                'route' => 'required',
            ];
        $messages=
            [
                'title.required' => 'Title required',
                'title.unique' => 'Controller already exists',
                'route.required' => 'Route required'
            ];

        $this->validate($request, $rules, $messages);

        $description=(empty($description) ? NULL : $description);
        $icon=(empty($icon) ? NULL : $icon);


        $module=Module::create
        (
            [
                'title' => $title,
                'type' => 'controller',
                'description' => $description,
                'route' => $route,
                'menu_status' => $menu_status,
                'icon' => $icon,
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if($module)
        {
            Session::flash('success', 'New controller added successfully');
        }
        else
            {
                Session::flash('error', 'Something went wrong, try again');

            }

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $module=Module::where('id', $id)->first();

        $data=[
            'page' => 'Modules',
            'controller' => $module,
            'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
        ];

        return view('module.edit_controller', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $title=Input::get('title');
        $description=Input::get('description');
        $route=Input::get('route');
        $menu_status=Input::get('menu_status');
        $icon=Input::get('icon');
        $status=Input::get('status');

        $rules=
            [

                'title' => 'required|unique:modules,title,'.$id,
                'route' => 'required',
            ];
        $messages=
            [
                'title.required' => 'Title required',
                'title.unique' => 'Controller already exists',
                'route.required' => 'Route required'
            ];

        $this->validate($request, $rules, $messages);

        $description=(empty($description) ? NULL : $description);
        $icon=(empty($icon) ? NULL : $icon);

        $module=Module::find($id);
        $module->title=$title;
        $module->description=$description;
        $module->route=$route;
        $module->menu_status=$menu_status;
        $module->icon=$icon;
        $module->status=$status;

        if($module->save())
        {
            Session::flash('success','Module updated successfully');
        }
        else{
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();




    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $module=Module::where([['parent_id','=', 0],['id','=', $id]]);

        if($module->delete())
        {
            Session::flash('success','Controller deleted successfully!');
        }
        else
            {
                Session::flash('error','Something went wrong, try again');
            }

            return redirect()->back();


    }



    public function controllers()
    {
        $controllers=Module::whereRaw('parent_id=0 AND status IN (0,1)')->get();
        $data =
            [
                'page' => Route::currentRouteName(),
                'controllers' => $controllers,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        //dd($modules);
        return view('module.controllers', $data);

    }

    public function show_trash()
    {
        $controllers=Module::where([['parent_id', '=',0],['status','=', 2]])->get();
        $data=
            [
                'page' => 'Modules',
                'controllers' => $controllers,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('module.trashed_controllers', $data);
    }

    public function trashed(Request $request, $id)
    {

        $module=Module::where([['parent_id','=', 0],['id','=', $id]])->update(['status' => 2]);


        if($module)
        {
            Session::flash('success','Controller deleted successfully!');
        }
        else
        {
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();


    }

    public function restore(Request $request, $id)
    {
        $module=Module::where([['parent_id','=', 0],['id','=', $id]])->update(['status' => 1]);


        if($module)
        {
            Session::flash('success','Controller restore successfully!');
        }
        else
        {
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function action_create($id)
    {
        $data =
            [
                'page' => Route::currentRouteName(),
                'parent_id' => $id,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('module.add_action', $data);
    }

    public function action_store(Request $request, $id)
    {

        $title=Input::get('title');
        $description=Input::get('description');
        $route=Input::get('route');
        $menu_status=Input::get('menu_status');
        $icon=Input::get('icon');

        $rules=
            [
                'title' => 'required|unique:modules,title',
                'route' => 'required',
            ];
        $messages=
            [
                'title.required' => 'Title required',
                'title.unique' => 'Action already exists',
                'route.required' => 'Route required'
            ];

        $this->validate($request, $rules, $messages);

        $description=(empty($description) ? NULL : $description);
        $icon=(empty($icon) ? NULL : $icon);


        $module=Module::create
        (
            [
                'parent_id' => $id,
                'title' => $title,
                'type' => 'action',
                'description' => $description,
                'route' => $route,
                'menu_status' => $menu_status,
                'icon' => $icon,
                'created_by' => Session::get('user')[0]->id
            ]
        );

        if($module)
        {
            Session::flash('success', 'New action added successfully');
        }
        else
        {
            Session::flash('error', 'Something went wrong, try again');

        }

        return redirect()->back();
    }

    public function actions($id)
    {


        $actions=Module::whereRaw('parent_id='.$id.' AND status IN (0,1)')->get();
        //$actions=Module::where('parent_id', $id)->whereIn('status', [0,1])->get();

        $data =
            [
                'page' => '',
                'actions' => $actions,
                'parent_id' => $id,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        //dd($modules);
        return view('module.actions', $data);

    }
    public function edit_action($parent_id, $id)
    {
        $action=Module::whereRaw('id = '.$id.' AND parent_id = '.$parent_id)->get();

        $data=
            [
                'page' => '',
                'action' => $action,
                'parent_id' => $id,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];

        return view('module.edit_action', $data);
    }
    public function update_action(Request $request, $id)
    {
        $title=Input::get('title');
        $description=Input::get('description');
        $route=Input::get('route');
        $menu_status=Input::get('menu_status');

        $status=Input::get('status');

        $rules=
            [

                'title' => 'required|unique:modules,title,'.$id,
                'route' => 'required',
            ];
        $messages=
            [
                'title.required' => 'Title required',
                'title.unique' => 'Controller already exists',
                'route.required' => 'Route required'
            ];

        $this->validate($request, $rules, $messages);

        $description=(empty($description) ? NULL : $description);

        $module=Module::find($id);
        $module->title=$title;
        $module->description=$description;
        $module->route=$route;
        $module->menu_status=$menu_status;
        $module->status=$status;

        if($module->save())
        {
            Session::flash('success','Action updated successfully');
        }
        else{
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function show_trashed_actions($parent_id)
    {
        $actions=Module::where([['parent_id', '=',$parent_id],['status','=', 2]])->get();

        $data=
            [
                'page' => 'Modules',
                'actions' => $actions,
                'controller_id' => $parent_id,
                'homepage' => Module::where('id', Session::get('user')[0]->role->homepage_id)->first()->route
            ];
        return view('module.trashed_actions', $data);
    }

    public function action_trash($id)
    {
        $module=Module::where([['id','=', $id]])->update(['status' => 2]);


        if($module)
        {
            Session::flash('success','Action deleted successfully!');
        }
        else
        {
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();

    }

    public function action_restore(Request $request, $id)
    {
        $module=Module::where([['id','=', $id]])->update(['status' => 1]);


        if($module)
        {
            Session::flash('success','Action restore successfully!');
        }
        else
        {
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();
    }

    public function action_destroy($id)
    {
        //
        $module=Module::where([['id','=', $id]]);

        if($module->delete())
        {
            Session::flash('success','Action deleted successfully!');
        }
        else
        {
            Session::flash('error','Something went wrong, try again');
        }

        return redirect()->back();


    }



}
