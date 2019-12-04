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

Route::prefix('admin')->namespace('Admin')->group(function ($route){
    $route->get('/agent_register','SupController@agent_register')->middleware('auth');
    $route->post('/agent_store','SupController@agent_store');
    $route->get('/import','SupController@index')->middleware('auth');
    $route->post('/import','SupController@import')->middleware('auth');
    $route->post('/import2','SupController@import2')->middleware('auth');
    $route->post('/import3','SupController@import3')->middleware('auth');
    $route->post('/import4','SupController@import4')->middleware('auth');
    $route->post('/import5','QaController@import5')->middleware('auth');
    $route->get('/view','SupController@view')->middleware('auth');
    $route->get('/view2','SupController@view2')->middleware('auth');
    $route->get('/psm','SupController@psm')->middleware('auth');
    $route->get('/dpsm','SupController@dpsm')->middleware('auth');
    $route->get('/quality_teh','QaController@qualityteh')->middleware('auth');
    $route->get('/quality_reg','QaController@qualityreg')->middleware('auth');
    $route->get('/quality_edit','QaController@qualityedit')->middleware('auth');
    $route->get('/quality_Communicatedـedit','QaController@qualityCommunicatededit')->middleware('auth');
    $route->get('/quality_dell','QaController@qualitydell')->middleware('auth');
    $route->post('/quality_edit','QaController@quality_update')->middleware('auth');
    $route->post('/quality_reg','QaController@quality_reg_store')->middleware('auth');
    $route->get('/quality_show','QaController@qualityShow')->middleware('auth');
    $route->get('/sendno','AgentController@sendview')->middleware('auth');
    $route->get('/select_date','AgentController@select_date')->middleware('auth');
    $route->get('/sendnumber','AgentController@sendNumber');
    $route->post('/sendno','AgentController@storeno');
    $route->post('/send_res','AgentController@storeres')->middleware('auth');
    $route->get('/view_no','AgentController@viewno')->middleware('auth');
    $route->get('/del_no','AgentController@delno')->middleware('auth');
    $route->get('/show_agents','SupController@show_agent')->middleware('auth');
    $route->get('/edit_agents','SupController@edit_agent')->middleware('auth');
    $route->get('/show_users','SupController@usersView')->middleware('auth');
    $route->get('/edit_users','SupController@usersEdit')->middleware('auth');
    $route->post('/edit_users','SupController@usersUpdate')->middleware('auth');
    $route->post('/edit_pass','SupController@chPass')->middleware('auth');
    $route->get('/dell_users','SupController@dellUsers')->middleware('auth');
    $route->post('/edit_agents','SupController@editagent');
    $route->post('/upload_image','SupController@upload')->middleware('auth');
    $route->get('/dell_agents','SupController@dellagent');
    $route->get('/select_date_vacation','AgentController@selectDateVacation')->middleware('auth');
    $route->post('/sendOff','AgentController@offStore')->middleware('auth');
    $route->get('/view_off','AgentController@viewOff')->middleware('auth');
    $route->get('/offChStatus','AgentController@OffChStatus')->middleware('auth');
    $route->get('/offDell','AgentController@OffDelete')->middleware('auth');
    $route->get('/permDell','AgentController@permDelete')->middleware('auth');
    $route->post('/OffPerm','AgentController@OffPermition')->middleware('auth');
    $route->get('/link_status','AgentController@linkStatus')->middleware('auth');
    $route->get('/send_box','SupController@sendBox')->middleware('auth');
    $route->get('/zoon_group','AdminController@Zoon_group')->middleware('auth');
    $route->post('/zoon_store','AdminController@zoonStore')->middleware('auth');
    $route->post('/group_store','AdminController@groupStore')->middleware('auth');
    $route->get('/zoonDell','AdminController@zoonDell')->middleware('auth');
    $route->get('/groupDell','AdminController@groupDell')->middleware('auth');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

