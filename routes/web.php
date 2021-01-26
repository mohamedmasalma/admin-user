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
    return view('auth.login');
});

Auth::routes();


Route::get('vertify/{email}/{vertifToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');  

   Route::get('T_forget', 'HomeController@T_forget')->name('T_forget');

    Route::post('login/test', 'redirectAdminController@loginByAdmin')->name('login.test');


//______________________________________Admin Autn_________________________________________________________
   Route::get('admin/home', 'AdminController@index')->name('admin');
  Route::POST('admin/login','admin\LoginController@login')->name('admin.login');
  Route::GET('admin-password/reset/{token}','admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::GET('admin/login','admin\LoginController@showLoginForm')->name('admin.login');
  Route::POST('admin-password/email','admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::GET('admin-password/reset','admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::POST('admin-password/reset','admin\ResetPasswordController@reset')->name('reset.admin') ; 


//____________________________________ADMIN ROUTE_________________________________________________



  //_________________________________Dashboared____________________________________________________
  Route::get('dashboard/campaign', 'admin\content\dashboardController@showCampaign')->name('dash.camp');
  Route::get('dashboard/lead', 'admin\content\dashboardController@showLead')->name('dash.lead');



//__________________________________Account__________________________________________________________
  Route::get('accounts/payment', 'admin\content\accountController@payment')->name('accounts.payment');
  Route::get('accounts/profile', 'admin\content\accountController@profile')->name('accounts.profile');
 Route::post('store/profile', 'admin\content\accountController@storeprofile')->name('admin.store.profile');
  Route::get('accounts/subscription', 'admin\content\accountController@subscription')->name('accounts.subscription');


//______________________________________Template__________________________________________________________
    Route::get('template/sms', 'admin\content\templateController@sms')->name('template.sms');
    Route::get('template/email', 'admin\content\templateController@email')->name('template.email');
    Route::get('template/voicemail', 'admin\content\templateController@voicemail')->name('template.voicemail');
    Route::get('add/template', 'admin\content\templateController@addTemplate')->name('add.template');
    Route::post('add/sms', 'admin\content\templateController@addSms')->name('add.sms');
    Route::post('add/email', 'admin\content\templateController@addEmail')->name('add.email');
    Route::post('edit/email', 'admin\content\templateController@editEmail')->name('edit.email');
    Route::post('edit/sms', 'admin\content\templateController@editSms')->name('edit.sms');
    Route::post('upload/voicemail', 'admin\content\templateController@uploadVoicemail')->name('upload.voicemail');
    Route::post('delete/voicemail', 'admin\content\templateController@deleteVoicemail')->name('delete.voicemail');


//_________________________________________Setting___________________________________________________________
  Route::get('setting/sms', 'admin\content\settingController@sms')->name('setting.sms');
  Route::get('setting/email', 'admin\content\settingController@email')->name('setting.email');
  Route::get('setting/voicemail', 'admin\content\settingController@voicemail')->name('setting.voicemail');
  Route::post('save/rvm', 'admin\content\settingController@saveRvm')->name('save.rvm');
  Route::post('save/email', 'admin\content\settingController@saveEmail')->name('save.email');
  Route::post('save/sms', 'admin\content\settingController@saveSms')->name('save.sms');



//___________________________________________Leads___________________________________________________________
  Route::get('leads/add', 'admin\content\leadController@leadAdd')->name('lead.add');
  Route::post('leads/store', 'admin\content\leadController@storeLead')->name('store.lead');
  Route::get('leads/all', 'admin\content\leadController@leadAll')->name('lead.all');
  Route::get('leads/dnc', 'admin\content\leadController@leadDnc')->name('lead.dnc');
  Route::get('leads/sold', 'admin\content\leadController@leadSold')->name('lead.sold');
  Route::post('admin/delete/lead/{id}', 'admin\content\leadController@deleteLead')->name('admin.delete.lead');
  Route::post('admin/delete/dnc/{id}', 'admin\content\leadController@deleteDnc')->name('admin.delete.dnc');
   Route::post('admin/delete/sold/{id}', 'admin\content\leadController@deleteSold')->name('admin.delete.sold');
  Route::get('admin/download/csv', 'admin\content\leadController@downloadCsv')->name('download.csv');
  Route::get('admin/leads/upload/view', 'admin\content\leadController@ShowUploadView')->name('upload.view');
  Route::post('admin/leads/parse_import', 'admin\content\leadController@parseImport')->name('parse.import');
  Route::post('admin/leads/final/import', 'admin\content\leadController@processImport')->name('final.import');
  Route::post('admin/update/lead', 'admin\content\leadController@updateLead')->name('admin.update.lead');




//_____________________________________________Admin_______________________________________________________________
  Route::get('admin/customer', 'admin\content\mainController@showCustomer')->name('customers');
  Route::get('admin/campaign', 'admin\content\mainController@showcamp')->name('admin.camp');
  Route::post('admin/delete/account/{id}', 'admin\content\mainController@deleteAccount')->name('admin.delete.account');
  Route::post('admin/delete/allcamp/{id}', 'admin\content\mainController@deleteallCamp')->name('admin.delete.allcamp');
  Route::post('admin/edit/customers', 'admin\content\mainController@EditCustomer')->name('admin.edit.customers');
  Route::post('admin/edit/camp', 'admin\content\mainController@EditCamp')->name('admin.edit.camp');
  
  


//______________________________________________Campain________________________________________________________
  Route::get('create/camp', 'admin\content\campController@create_camp')->name('create.camp');
  Route::get('all/camp', 'admin\content\campController@all_camp')->name('all.camp');  
  Route::post('admin/delete/camp/{id}', 'admin\content\campController@deleteCamp')->name('admin.delete.camp');
  Route::get('sche/camp', 'admin\content\campController@sche_camp')->name('sche.camp');  
   Route::post('admin/edit/all/camp', 'admin\content\campController@edit')->name('admin.edit.all.camp');
  Route::get('completed/camp', 'admin\content\campController@completed_camp')->name('completed.camp');
  Route::post('store/camp', 'admin\content\campController@store')->name('store.camp');   


//__________________________________END ADMIN___________________________________________
//___________________________________________________________________________________________________________________




  //_________________________________USER ROUTE________________________________________________


  //____________________________________Dashboard_________________________________________________

  Route::get('user/dashboard/campaign', 'user\content\dashboardController@showCampaign')->name('user.dash.camp');
  Route::get('user/dashboard/lead', 'user\content\dashboardController@showLead')->name('user.dash.lead');


  //____________________________________Account_________________________________________________
  Route::get('user/accounts/payment', 'user\content\accountController@payment')->name('user.accounts.payment');
  Route::get('user/accounts/profile', 'user\content\accountController@profile')->name('user.accounts.profile');
  Route::post('user/store/profile', 'user\content\accountController@storeprofile')->name('user.store.profile');
  Route::get('user/accounts/subscription', 'user\content\accountController@subscription')->name('user.accounts.subscription');



//__________________________________________template___________________________________________________________
   Route::get('user/template/sms', 'user\content\templateController@sms')->name('user.template.sms');
  Route::get('user/template/email', 'user\content\templateController@email')->name('user.template.email');
  Route::get('user/template/voicemail', 'user\content\templateController@voicemail')->name('user.template.voicemail');
  Route::post('user/edit/sms', 'user\content\templateController@editSms')->name('user.edit.sms');
   Route::post('user/edit/email', 'user\content\templateController@editEmail')->name('user.edit.email');
  Route::post('user/delete/voicemail', 'user\content\templateController@deleteVoicemail')->name('user.delete.voicemail');



//___________________________________________Setting_______________________________________________________________
  Route::get('user/setting/sms', 'user\content\settingController@sms')->name('user.setting.sms');
  Route::get('user/setting/email', 'user\content\settingController@email')->name('user.setting.email');
  Route::get('user/setting/voicemail', 'user\content\settingController@voicemail')->name('user.setting.voicemail');
  Route::post('user/save/rvm', 'user\content\settingController@saveRvm')->name('user.save.rvm');
  Route::post('user/save/email', 'user\content\settingController@saveEmail')->name('user.save.email');
  Route::post('user/save/sms', 'user\content\settingController@saveSms')->name('user.save.sms');




//_____________________________________________Leads______________________________________________________
  Route::get('user/leads/add', 'user\content\leadController@leadAdd')->name('user.lead.add');
  Route::post('user/leads/store', 'user\content\leadController@storeLead')->name('user.store.lead');
  Route::post('user/update/lead', 'user\content\leadController@updateLead')->name('user.update.lead');
  Route::get('user/leads/all', 'user\content\leadController@leadAll')->name('user.lead.all');
  Route::get('user/leads/dnc', 'user\content\leadController@leadDnc')->name('user.lead.dnc');
  Route::get('user/leads/sold', 'user\content\leadController@leadSold')->name('user.lead.sold');
  Route::post('user/delete/sold/{id}', 'user\content\leadController@deleteSold')->name('user.delete.sold');
  Route::post('user/delete/lead/{id}', 'user\content\leadController@deleteLead')->name('user.delete.lead');
  Route::post('user/delete/dnc/{id}', 'user\content\leadController@deleteDnc')->name('user.delete.dnc');

  Route::get('user/download/csv', 'user\content\leadController@downloadCsv')->name('user.download.csv');
  Route::get('user/leads/upload/view', 'user\content\leadController@ShowUploadView')->name('user.upload.view');
  Route::post('user/leads/parse_import', 'user\content\leadController@parseImport')->name('user.parse.import');
  Route::post('user/leads/final/import', 'user\content\leadController@processImport')->name('user.final.import');



  //____________________________________________Campaign_________________________________________________________
  Route::get('user/create/camp', 'user\content\campController@create_camp')->name('user.create.camp');
   Route::post('user/delete/camp/{id}', 'user\content\campController@deleteCamp')->name('delete.camp');
  Route::get('user/all/camp', 'user\content\campController@all_camp')->name('user.all.camp'); 
   Route::post('user/edit/camp', 'user\content\campController@editCamp')->name('user.edit.camp');  
  Route::get('user/sche/camp', 'user\content\campController@sche_camp')->name('user.sche.camp');  
  Route::get('user/completed/camp', 'user\content\campController@completed_camp')->name('user.completed.camp');
  Route::post('user/store/camp', 'user\content\campController@store')->name('user.store.camp');                       
 // ____________________________________________END USER__________________________________
  //_____________________________________________________________________________________________________