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
    $route->get('/agent_register','SupController@agent_register');
    $route->post('/agent_store','SupController@agent_store');
    $route->get('/import','SupController@index');
    $route->post('/import','SupController@import');
    $route->post('/import2','SupController@import2');
    $route->post('/import3','SupController@import3');
    $route->post('/import4','SupController@import4');
    $route->post('/import5','QaController@import5');
    $route->get('/view','SupController@view');
    $route->get('/view2','SupController@view2');
    $route->get('/psm','SupController@psm');
    $route->get('/dpsm','SupController@dpsm');
    $route->get('/quality_teh','QaController@qualityteh');
    $route->get('/quality_reg','QaController@qualityreg');
    $route->get('/quality_edit','QaController@qualityedit');
    $route->get('/quality_Communicatedـedit','QaController@qualityCommunicatededit');
    $route->get('/quality_dell','QaController@qualitydell');
    $route->post('/quality_edit','QaController@quality_update');
    $route->post('/quality_reg','QaController@quality_reg_store');
    $route->get('/quality_show','QaController@qualityShow');
    $route->get('/sendno','AgentController@sendview');
    $route->get('/select_date','AgentController@select_date');
    $route->get('/sendnumber','AgentController@sendNumber');
    $route->post('/sendno','AgentController@storeno');
    $route->post('/send_res','AgentController@storeres');
    $route->get('/view_no','AgentController@viewno');
    $route->get('/del_no','AgentController@delno');
    $route->get('/show_agents','SupController@show_agent');
    $route->get('/edit_agents','SupController@edit_agent');
    $route->get('/show_users','SupController@usersView');
    $route->get('/edit_users','SupController@usersEdit');
    $route->post('/edit_users','SupController@usersUpdate');
    $route->get('/dell_users','SupController@dellUsers');
    $route->post('/edit_agents','SupController@editagent');
    $route->post('/upload_image','SupController@upload');
    $route->get('/dell_agents','SupController@dellagent');
    $route->get('/select_date_vacation','AgentController@selectDateVacation');
    $route->post('/sendOff','AgentController@offStore');
    $route->get('/view_off','AgentController@viewOff');
    $route->get('/offChStatus','AgentController@OffChStatus');
    $route->get('/offDell','AgentController@OffDelete');
    $route->get('/permDell','AgentController@permDelete');
    $route->post('/OffPerm','AgentController@OffPermition');
    $route->get('/link_status','AgentController@linkStatus');
    $route->get('/send_box','SupController@sendBox');
    $route->get('/zoon_group','SupController@viewZoon_group');


});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

