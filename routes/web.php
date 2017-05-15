<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('home'));
});


Route::group(['middleware' => 'auth', 'prefix' => 'bdms'], function ()
{



    Route::get('users/login','UserController@login')->name('user.login');
    Route::get('users/logout', 'UserController@logout')->name('user.logout');
    Route::post('users/authenticate', 'UserController@authenticate')->name('user.authenticate');

    Route::get('users/trashed_users','UserController@show_trash')->name('users.trashed');
    Route::post('users/{id}/trash', 'UserController@trash')->name('users.trash');
    Route::get('users/{id}/restore', 'UserController@restore')->name('users.restore');

    Route::get('users/profile', 'UserController@profile')->name('users.profile');
    Route::put('users/{id}/profile_update', 'UserController@profile_update')->name('profile.update');
    Route::get('users/change_password', 'UserController@change_password')->name('users.change_password');
    Route::put('users/{id}/password_update', 'UserController@password_update')->name('password.update');

    Route::resource('users','UserController');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.home');
    //Route::resource('dashboard', 'DashboardController');

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/modules/controllers','ModuleController@controllers')->name('modules.controllers');
    Route::get('modules/trashed_controllers', 'ModuleController@show_trash')->name('modules.trashed');
    Route::post('modules/{id}/trash','ModuleController@trashed')->name('modules.trash');
    Route::get('modules/{id}/restore', 'ModuleController@restore')->name('modules.restore');

    Route::get('modules/actions', function (){
        return redirect(route('modules.controllers'));
    });
    Route::get('modules/{id}/actions/create','ModuleController@action_create')->name('actions.create');
    Route::post('modules/{id}/actions', 'ModuleController@action_store')->name('actions.store');
    Route::get('modules/{id}/actions', 'ModuleController@actions')->name('modules.actions');
    Route::get('modules/{parent_id}/edit_action/{id}', 'ModuleController@edit_action')->name('actions.edit');
    Route::put('modules/actions/{id}/edit', 'ModuleController@update_action')->name('actions.update');
    Route::get('modules/{parent_id}/trashed_actions', 'ModuleController@show_trashed_actions')->name('actions.trashed');
    Route::put('modules/actions/{id}/trash','ModuleController@action_trash')->name('actions.trash');
    Route::delete('modules/actions/{id}/destroy', 'ModuleController@action_destroy')->name('actions.destroy');
    Route::get('modules/actions/{id}/restore', 'ModuleController@action_restore')->name('actions.restore');
    Route::resource('modules','ModuleController',
        [
            'names'=>
                [
                    'index' => 'modules'
                ]
        ]);


    Route::post('roles/{id}/trash','RoleController@trashed')->name('roles.trash');
    Route::get('roles/trashed', 'RoleController@show_trash')->name('roles.trashed');
    Route::get('roles/{id}/restore', 'RoleController@restore')->name('roles.restore');
    Route::resource('roles', 'RoleController');


    Route::get('departments/trashed_departments', 'DepartmentController@show_trash')->name('departments.trashed');
    Route::put('departments/{id}/trash', 'DepartmentController@trash')->name('departments.trash');
    Route::get('departments/{id}/restore', 'DepartmentController@restore')->name('departments.restore');
    Route::resource('departments', 'DepartmentController');



    Route::get('designations/trashed_designations', 'DesignationController@show_trash')->name('designations.trashed');
    Route::put('designations/{id}/trash', 'DesignationController@trash')->name('designations.trash');
    Route::get('designations/{id}/restore', 'DesignationController@restore')->name('designations.restore');
    Route::resource('designations', 'DesignationController');

});
