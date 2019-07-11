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

Route::pattern('slug', '[a-z0-9- _]+');

//Route::group([ 'namespace'=>'Admin'], function () {

# Lock screen
Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
# All basic routes defined here
Route::get('login', 'AuthController@getSignin')->name('login');
Route::get('signin', 'AuthController@getSignin')->name('signin');
Route::post('signin', 'AuthController@postSignin')->name('postSignin');
Route::post('signup', 'AuthController@postSignup')->name('signup');
Route::post('forgot-password', 'AuthController@postForgotPassword')->name('signup');


# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

# Logout
Route::get('logout', 'AuthController@getLogout')->name('logout');

# Account Activation
Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
//});


Route::group(['middleware' => ['admin']], function () {
    Route::group(['middleware' => ['activity']], function () {
        # GUI Crud Generator
        // Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
        // Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
        // Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generate');
        //Route::post('modelCheck', 'ModelcheckController@modelCheck');
        # Dashboard / Index
        Route::get('/', 'JoshController@showHome')->name('dashboard');
        # crop demo
        //Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
        # Activity log
        //Route::get('activity_log', 'JoshController@ActivityLog')->name('activity_log');
        //Route::get('task/data', 'TaskController@data')->name('data');
    
        Route::group(['middleware' => ['permissions']], function () {

            //customer permissions
            Route::group(['prefix' => 'customers'], function () {
                //view
                Route::group(['as' => 'customers.'], function () {
                    Route::get('/', 'CustomerController@index')->name('index');
                    Route::get('/data', 'CustomerController@data')->name('data');
                    Route::get('/{customer}', 'CustomerController@show')->name('show');
                    Route::get('/getContact', 'CustomerController@getContact')->name('getContact');
                    Route::get('/orderHistory/{customer}', 'OrderController@customerHistory')->name('customerHistory');
                    //site view
                    Route::get('sites/data', 'SiteController@data')->name('sites.data');
                    Route::get('sites/data/{customer}', 'SiteController@customerData')->name('sites.customerSites');
                    Route::get('sites', 'SiteController@index')->name('sites.index');
                    Route::get('sites/{site}', 'SiteController@show')->name('sites.show');
                });
                //admin
                Route::group(['as' => 'customerAdmin.'], function () {
                    Route::get('customers/new', 'CustomerController@create')->name('create');
                    Route::get('customers/{customer}/edit', 'CustomerController@edit')->name('edit');
                    Route::post('customers/store', 'CustomerController@store')->name('store');
                    Route::post('customers/{customer}/update', 'CustomerController@update')->name('update');
                    Route::post('customer/uploadProfilePic', 'CustomerController@uploadProfilePic')->name('uploadProfilePic');
                    //site admin
                    Route::get('sites/{customer}/create', 'SiteController@create')->name('sites.create');
                    Route::get('sites/{site}/edit', 'SiteController@edit')->name('sites.edit');
                    Route::post('sites/store', 'SiteController@store')->name('sites.store');
                    Route::post('sites/{site}/update', 'SiteController@update')->name('sites.update');
                    Route::post('customers/addServices', 'CustomerController@addService')->name('addServices');
                });
            });
        
            //supplier permissions
            Route::group(['prefix' => 'suppliers'], function () {
                //view
                Route::group(['as' => 'suppliers.'], function () {
                    Route::get('/', 'SupplierController@index')->name('index');
                    Route::get('/data', 'SupplierController@data')->name('data');
                    Route::get('/data/{product}', 'SupplierController@productData')->name('productData');
                    Route::get('/{supplier}', 'SupplierController@show')->name('show');
                });
                //admin
                Route::group(['as' => 'supplierAdmin.'], function () {
                    Route::get('suppliers/create', 'SupplierController@create')->name('create');
                    Route::get('/{supplier}/edit', 'SupplierController@edit')->name('edit');
                    Route::post('/store', 'SupplierController@store')->name('store');
                    Route::post('/{supplier}/update', 'SupplierController@update')->name('update');    
                });
            });

            //category permissions
            Route::group(['prefix' => 'categories'], function () {
                //view
                Route::group(['as' => 'categories.'], function () {
                    Route::get('/', 'CategoryController@index')->name('index');
                    Route::get('categories/data', 'CategoryController@data')->name('data');
                    Route::get('categories/{category}', 'CategoryController@show')->name('show');
                });
                //admin
                Route::group(['as' => 'categoryAdmin.'], function () {
                    Route::get('/create', 'CategoryController@create')->name('create');
                    Route::get('/{category}/edit', 'CategoryController@edit')->name('edit');
                    Route::post('/store', 'CategoryController@store')->name('store');
                    Route::post('/{category}/update', 'CategoryController@update')->name('update');
                });
            });

            //product permissions
            Route::group(['prefix' => 'products'], function () {
                //view
                Route::group(['as' => 'products.'], function () {
                    Route::get('products', 'ProductController@index')->name('index');
                    Route::get('products/data', 'ProductController@data')->name('data');
                    Route::get('products/data/{supplier}', 'ProductController@supplierData')->name('supplierData');
                    Route::get('products/dataCat/{category}', 'ProductController@categoryData')->name('categoryData');
                    Route::get('products/{product}', 'ProductController@show')->name('show');
                });
                //admin
                Route::group(['as' => 'productAdmin.'], function () {
                    Route::get('products/create', 'ProductController@create')->name('create');
                    Route::get('products/{product}/edit', 'ProductController@edit')->name('edit');
                    Route::post('products/store', 'ProductController@store')->name('store');
                    Route::post('products/{product}/update', 'ProductController@update')->name('update');
                });
            });

            //contact permissions
            Route::group(['prefix' => 'contacts'], function () {
                //view
                Route::group(['as' => 'contacts.'], function () {
                    Route::get('/{customer}', 'ContactController@index')->name('index');
                    Route::get('/all', 'ContactController@all')->name('all');
                    Route::get('/data/{customer}', 'ContactController@data')->name('data');
                    Route::get('/allData', 'ContactController@allData')->name('allData');  
                    Route::get('/{contact}', 'ContactController@show')->name('show');
                });
                //admin
                Route::group(['as' => 'contactAdmin.'], function () {           
                    Route::get('/create', 'ContactController@create')->name('create');
                    Route::get('/{contact}/edit', 'ContactController@edit')->name('edit');
                    Route::post('/store', 'ContactController@store')->name('store');
                    Route::post('/{contact}/update', 'ContactController@update')->name('update');
                    Route::get('/{customer}/create', 'ContactController@createWithCustomer')->name('contacts.createCustomer');
                });
            });
            
            //invoice permissions
            Route::group(['prefix' => 'invoice'], function () {
                //view
                Route::group(['as' => 'invoice.'], function () {
                    Route::get('/', 'InvoiceController@index')->name('index');
                    Route::post('/list', 'InvoiceController@paginate')->name('data');
                    Route::get('/details', 'InvoiceController@get_invoice_details_ajax')->name('get_invoice_details_ajax');
                    Route::get('/?id={invoice}', 'InvoiceController@index')->name('show_invoice_page');
                    Route::get('/get/payment/', 'InvoiceController@get_invoice_payments')->name('get_invoice_payments');
                    Route::get('/?id={invoice?}', 'InvoiceController@index')->name('invoice_link');
                    Route::post('/customer/unbilled/tasks', 'InvoiceController@get_unbilled_timesheets_and_expenses_by_customer_id')->name('get_unbilled_tasks_by_customer_id');
                    Route::post('/report', 'InvoiceController@report_paginate')->name('report_invoice');
                    Route::post('/item/report', 'InvoiceController@report_item_paginate')->name('report_item');
                    Route::post('/children', 'InvoiceController@get_child_invoices')->name('get_child_invoices');
                    Route::get('/recurring', 'InvoiceController@recurring_invoices')->name('recurring_invoices_list');
                    Route::post('/recurring', 'InvoiceController@paginate_recurring_invoices')->name('datatable_recurring_invoices');
                    Route::get('/invoices/download/{invoice?}', 'InvoiceController@download_invoice')->name('download_invoice');
                });
                //admin
                Route::group(['as' => 'invoiceAdmin.'], function () {
                    Route::get('/create', 'InvoiceController@create')->name('create');
                    Route::post('/store', 'InvoiceController@store')->name('store');
                    Route::get('/edit/{invoice?}', 'InvoiceController@edit')->name('edit');
                    Route::patch('/edit/{invoice}', 'InvoiceController@update')->name('update');
                    Route::get('/remove/{invoice?}', 'InvoiceController@destroy')->name('delete');
                    Route::post('/status/change', 'InvoiceController@change_status')->name('ajax_change_invoice_status');
                    Route::post('/send/email', 'InvoiceController@send_to_email')->name('invoice_send_to_email');
                    Route::get('/convert/proposal/{proposal_id?}', 'InvoiceController@convert_to_invoice_from_proposal')->name('convert_to_invoice_from_proposal');
                    Route::get('/convert/estimate/{estimate_id?}', 'InvoiceController@convert_to_invoice_from_estimate')->name('convert_to_invoice_from_estimate');
                    Route::get('/convert/expense/{expense_id?}', 'InvoiceController@convert_to_invoice_from_expense')->name('convert_to_invoice_from_expense');
                    Route::post('/payment/receive', 'InvoiceController@receive_payment')->name('receive_payment');
                    Route::post('/update/recurring/details', 'InvoiceController@update_recurring_invoice_setting')->name('update_recurring_invoice_setting');
                    Route::post('/create/for/project/{project}', 'InvoiceController@create_invoice_for_a_project')->name('create_invoice_for_a_project');
                 });  
            });
            
            //proposals permissions
            Route::group(['prefix' => 'proposals'], function () {
                //view
                Route::group(['as' => 'proposals.'], function () {
                    Route::get('/', 'ProposalController@index')->name('index');
                    Route::post('/list', 'ProposalController@paginate')->name('datatables_proposal');
                    Route::get('/?id={proposal}', 'ProposalController@index')->name('show_proposal_page');
                    Route::get('/details', 'ProposalController@get_proposal_details_ajax')->name('get_proposal_details_ajax');
                    Route::get('/items', 'ProposalController@get_proposal_items_ajax')->name('get_proposal_items_ajax');  
                    Route::get('/download/{proposal?}', 'ProposalController@download_proposal')->name('download_proposal');
                    Route::get('/view/{proposal?}/{url_slug}', 'ProposalController@customer_view')->name('proposal_customer_view');
                });
                //admin
                Route::group(['as' => 'proposalAdmin.'], function () {
                    Route::get('/create', 'ProposalController@create')->name('add_proposal_page');
                    Route::post('/create', 'ProposalController@store')->name('post_proposal');
                    Route::get('/edit/{proposal?}', 'ProposalController@edit')->name('edit_proposal_page');
                    Route::patch('/edit/{proposal}', 'ProposalController@update')->name('patch_proposal');
                    Route::get('/remove/{proposal?}', 'ProposalController@destroy')->name('delete_proposal');
                    Route::get('/related', 'ProposalController@related_component')->name('related_component');
                    Route::get('/products/list', 'ProposalController@search_product')->name('proposal_search_product');
                    Route::post('/save/content', 'ProposalController@save_proposal_content')->name('save_proposal_content');
                    Route::post('/status/change', 'ProposalController@change_status')->name('ajax_change_proposal_status');
                    Route::post('/send/email', 'ProposalController@send_to_email')->name('proposal_send_to_email');
                });
            });

            //estimate permissions
            Route::group(['prefix' => 'estimates'], function () {
                //view
                Route::group(['as' => 'estimates.'], function () {
                    Route::get('/', 'EstimateController@index')->name('index');
                    Route::post('/list', 'EstimateController@paginate')->name('datatables_estimate');
                    Route::get('/details', 'EstimateController@get_estimate_details_ajax')->name('get_estimate_details_ajax');
                    Route::get('/?id={estimate}', 'EstimateController@index')->name('show_estimate_page');
                    Route::get('/view/{estimate}/{url_slug}', 'EstimateController@customer_view')->name('estimate_customer_view');
                    Route::get('/download/{estimate?}', 'EstimateController@download_estimate')->name('download_estimate');
                });
                //admin
                Route::group(['as' => 'estimateAdmin.'], function () {
                    Route::get('/create', 'EstimateController@create')->name('add_estimate_page');
                    Route::post('/create', 'EstimateController@store')->name('post_estimate');
                    Route::get('/edit/{estimate?}', 'EstimateController@edit')->name('edit_estimate_page');
                    Route::patch('/edit/{estimate}', 'EstimateController@update')->name('patch_estimate');
                    Route::get('/remove/{estimate?}', 'EstimateController@destroy')->name('delete_estimate');
                    Route::post('/send/email', 'EstimateController@send_to_email')->name('estimate_send_to_email');
                    Route::post('/status/change', 'EstimateController@change_status')->name('ajax_change_estimate_status');
                    Route::get('/convert/proposal/{proposal_id?}', 'EstimateController@convert_to_estimate_from_proposal')->name('convert_to_estimate_from_proposal');
                    Route::post('/accept/{estimate}', 'EstimateController@accept_estimate')->name('accept_estimate');
                    Route::post('/decline/{estimate}', 'EstimateController@decline_estimate')->name('decline_estimate');
                });
               //terms and conditions
               //TODO maybe?
                Route::get('/settings', 'EstimateController@settings')->name('settings_estimate_page');
                Route::patch('/settings/update', 'EstimateController@update_settings')->name('patch_settings_estimate');
            });
            
            //payment permissions
            Route::group(['prefix' => 'payments'], function () {
                //view
                Route::group(['as' => 'payments.'], function () {
                    Route::get('/', 'PaymentController@index')->name('index');
                    Route::post('/list', 'PaymentController@paginate')->name('datatables_payment');
                    Route::get('/{payment}', 'PaymentController@show')->name('show_payment_page');
                    Route::get('/receipt/download/pdf/{payment}', 'PaymentController@download_receipt_pdf')->name('download_receipt');
                });
                //admin
                Route::group(['as' => 'paymentAdmin.'], function () {
                    Route::get('/create', 'PaymentController@create')->name('add_payment');
                    Route::post('/create', 'PaymentController@store')->name('post_payment');
                    Route::get('/edit/{payment}', 'PaymentController@edit')->name('edit_payment_page');
                    Route::patch('/{payment}', 'PaymentController@update')->name('patch_payment');
                    Route::get('/remove/{payment}', 'PaymentController@destroy')->name('delete_payment_page');  
                });
                //Not in code - in micro
                Route::get('/edit', 'PaymentController@edit')->name('edit_payment_page_js_link');
                Route::post('/report', 'PaymentController@report_paginate')->name('report_payment');
            });

            //credit note permissions
            Route::group(['prefix' => 'creditnotes'], function () {
                //view
                Route::group(['as' => 'creditnotes.'], function () {
                    Route::get('/', 'CreditNoteController@index')->name('index');
                    Route::post('/credit-note/list', 'CreditNoteController@paginate')->name('datatables_credit_note');
                    Route::get('/credit-note/details', 'CreditNoteController@get_credit_note_details_ajax')->name('get_credit_note_details_ajax');
                    Route::get('/credit-note/?id={credit_note}', 'CreditNoteController@index')->name('show_credit_note_page');
                    Route::get('/download/{credit_note}', 'CreditNoteController@download_credit_note')->name('download_credit_note');
                    Route::post('/invoices', 'CreditNoteController@get_invoices_applied_to')->name('credit_note_get_invoices');
                });
                //admin
                Route::group(['as' => 'creditnoteAdmin.'], function () {
                    Route::get('/create', 'CreditNoteController@create')->name('add_credit_note_page');
                    Route::post('/create', 'CreditNoteController@store')->name('post_credit_note');
                    Route::get('/edit/{credit_note?}', 'CreditNoteController@edit')->name('edit_credit_note_page');
                    Route::patch('/edit/{credit_note}', 'CreditNoteController@update')->name('patch_credit_note');
                    Route::get('/remove/{credit_note?}', 'CreditNoteController@destroy')->name('delete_credit_note');
                    Route::post('/status/change', 'CreditNoteController@change_status')->name('ajax_change_credit_note_status');
                    Route::post('/credit-note/send/email', 'CreditNoteController@send_to_email')->name('credit_note_send_to_email');
                    Route::post('/by/customer', 'CreditNoteController@get_available_credit_notes_by_customer_id')->name('get_available_credit_notes_by_customer_id');
                    Route::post('/apply', 'CreditNoteController@apply_credit_to_invoice')->name('apply_credit_to_invoice');
                });                  
            });

            //item permissions
            Route::group(['prefix' => 'items'], function () {
                //view
                Route::group(['as' => 'items.'], function () {
                    Route::get('/', 'ItemController@index')->name('index');
                    Route::post('/list', 'ItemController@paginate')->name('datatables_items');
                });
                //admin
                Route::group(['as' => 'itemAdmin.'], function () {
                    Route::get('/create', 'ItemController@create')->name('add_item');
                    Route::post('/create', 'ItemController@store')->name('post_item');
                    Route::get('/edit/{item}', 'ItemController@edit')->name('edit_item_page');
                    Route::patch('/edit/{item}', 'ItemController@update')->name('patch_item');
                    Route::get('/remove/{item}', 'ItemController@destroy')->name('delete_item_page');
                });                  
            });

            //task permissions
            Route::group(['prefix' => 'tasks'], function () {
                //view
                Route::group(['as' => 'tasks.'], function () {
                    Route::get('/', 'TaskController1@index')->name('index');
                    Route::get('/data', 'TaskController1@data')->name('task_data');
                    Route::get('/kanban', 'TaskController1@kanban_view')->name('task_canban_view');
                    Route::post('/taskslist', 'TaskController1@paginate')->name('datatables_tasks');
                    Route::get('/show/{task}', 'TaskController1@show')->name('show_task_page');
                    Route::get('/related', 'TaskController1@task_related')->name('task_related');
                    Route::get('/parent/list', 'TaskController1@parent_tasks')->name('get_parent_tasks');
                    Route::post('/comments/{task}', 'TaskController1@comments')->name('datatable_tasks_comments');
                    Route::get('/show/{task}?comment={comment_id}', 'TaskController1@show')->name('show_task_comment');
                    Route::get('/show/{task}/change/status/{status_id}', 'TaskController1@change_status')->name('task_change_status');
                    Route::post('/change/status', 'TaskController1@change_status')->name('task_change_status_ajax');
                });
                //admin
                Route::group(['as' => 'taskAdmin.'], function () {
                    Route::get('/create', 'TaskController1@create')->name('add_task_page');
                    Route::post('tasks/create', 'TaskController1@store')->name('post_task');
                    Route::get('tasks/edit/{task}', 'TaskController1@edit')->name('edit_task_page');
                    Route::patch('tasks/edit/{task?}', 'TaskController1@update')->name('patch_task');
                    Route::get('tasks/remove/{task}', 'TaskController1@destroy')->name('delete_task');
                    Route::post('/comment/{task}', 'TaskController1@post_task_comment')->name('post_task_comment');
                    Route::patch('/comment/{task}/{comment}', 'TaskController1@update_task_comment')->name('patch_task_comment');
                    Route::get('//comment/delete/{comment}', 'CommentController@destroy')->name('delete_comment');
                    Route::post('/update/milestone', 'TaskController1@update_task_milestone')->name('task_update_milestone');
                    Route::post('/assign/{task}', 'TaskController1@assign_task')->name('assign_task');
                    Route::get('/convert/ticket/{ticket_comment_thread_id}', 'TaskController1@convert_ticket_to_task')->name('convert_ticket_to_task');
                    // Route::get('/component', 'TaskController1@tasks_by_component_id')->name('tasks_by_component_id');
                });       
                //not in yet
                //TODO - maybe
                //Route::post('/upload/attachment', 'TaskController1@upload_attachment')->name('upload_task_attachment');
                // Route::post('/component/{component}/{id}', 'TaskController1@tasks_by_component_id_paginate')->name('datatable_tasks_by_component_id');
            });

            //lead permissions
            Route::group(['prefix' => 'leads'], function () {
                //view
                Route::group(['as' => 'leads.'], function () {
                    Route::get('/', 'LeadController@index')->name('index');
                    Route::post('/list', 'LeadController@paginate')->name('datatables_leads');
                    Route::get('/show/{lead}', 'LeadController@show')->name('show_lead_page');
                    Route::post('/note/create/{lead}', 'LeadController@add_note')->name('lead_add_note');
                    Route::post('/log/touch/{lead}', 'LeadController@log_touch')->name('post_log_touch');
                    Route::post('/report/conversion/by/month', 'LeadController@get_report_conversion_by_month_for_graph')->name('get_report_conversion_by_month_for_graph');
                });
                //admin
                Route::group(['as' => 'leadAdmin.'], function () {
                    Route::get('/create', 'LeadController@create')->name('add_lead_page');
                    Route::post('/create', 'LeadController@store')->name('post_lead');
                    Route::get('/edit/{lead}', 'LeadController@edit')->name('edit_lead_page');
                    Route::patch('/edit/{lead}', 'LeadController@update')->name('patch_lead');
                    Route::get('/remove/{lead}', 'LeadController@destroy')->name('delete_lead');
                    Route::get('/import/download/sample', 'LeadController@download_sample_lead_import_file')->name('download_sample_lead_import_file'); 
                    Route::get('/import', 'LeadController@import_page')->name('import_lead_page');
                    Route::get('/mark/junk/{lead}', 'LeadController@mark_as_junk')->name('mark_as_junk');
                    Route::get('/mark/lost/{lead}', 'LeadController@mark_as_lost')->name('mark_as_lost');
                    Route::post('/mark/important/{lead}', 'LeadController@mark_as_important')->name('mark_as_important');
                    Route::post('/import', 'LeadController@import')->name('import_lead');                      
                    Route::get('/customers/leadToCustomer/{lead}', 'CustomerController@leadToCustomer')->name('lead.to.customers');
                    Route::get('/customers/create/{lead?}', 'CustomerController@create')->name('add_customer_page');
                    Route::post('/save/smart-summary/{lead}', 'LeadController@save_smart_summary')->name('post_smart_summary');
                    Route::post('/remove/smart-summary/{lead}', 'LeadController@remove_smart_summary')->name('remove_smart_summary');
                    Route::post('/save/social-link/{lead}', 'LeadController@save_social_link')->name('post_social_link');
                    Route::post('/remove/social-link/{lead}', 'LeadController@remove_social_link')->name('remove_social_link');
                });                         
            });           
         
            //impersonate permissions
            Route::group(['prefix' => 'impersonate'], function () {
                //view
                Route::group(['as' => 'impersonate.'], function () {
                    Route::get('/customer/{customer}', 'UsersController@impersonate')->name('impersonate');
                    Route::get('/stopImpersonate', 'UsersController@stopImpersonate')->name('stopImpersonate');
                });                         
            });
            
            //document permissions
            Route::group(['prefix' => 'documents'], function () {
                //view
                Route::group(['as' => 'documents.'], function () {
                    Route::get('document/view/{document}', 'DocumentController@view')->name('view');
                    Route::get('/getDocs', 'PlannerController@getDocs')->name('planner.getDocs');
                    //didn't have name before
                    Route::get('/generateReport', 'DocumentController@generateReport')->name('generateReport');
                    Route::get('/siteDocs/{site}', 'DocumentController@siteDocs')->name('document.siteDocs');
                    Route::get('/tabDocs/{site}/{tab}', 'DocumentController@tabDocs')->name('document.tabDocs');
                    Route::get('/vehicleDocs/{vehicle}', 'DocumentController@vehicleDocs')->name('document.vehicleDocs');
                    Route::get('/customerdocs/{customer}', 'DocumentController@customerDocs')->name('document.customerDocs');
                    Route::get('/{document}/versions', 'DocumentController@versions')->name('document.versions');
                    Route::get('/{id}/verionData', 'DocumentController@versionData')->name('document.versionData');
                    Route::get('/{id}/siteLogs', 'DocumentController@siteLogs')->name('document.siteLogs');
                    Route::get('/{id}/{siteID}/tabLogs', 'DocumentController@tabLogs')->name('document.tabLogs');
                    Route::get('/{id}/logData', 'DocumentController@siteLogData')->name('document.siteLogData');
                    Route::get('/{id}/{siteID}/tabLogData', 'DocumentController@tabLogData')->name('document.tabLogData');
                });
                //admin
                Route::group(['as' => 'documentAdmin.'], function () {
                    Route::post('/saveDocument', 'DocumentController@saveDocument')->name('save');
                    Route::post('/uploadSiteDoc', 'DocumentController@uploadSiteDoc')->name('document.uploadSiteDoc');
                    Route::post('/uploadTabDoc', 'DocumentController@uploadTabDoc')->name('document.uploadTabDoc');
                    Route::post('/updateTab', 'DocumentController@updateTab')->name('document.updateTab');
                    Route::post('/uploadCustomerDoc', 'DocumentController@uploadCustomerDoc')->name('document.uploadCustomerDoc');
                    Route::post('/updateVersion', 'DocumentController@updateVersion')->name('document.updateVersion');            
                });           
            });  
              
            //settings permissions
            Route::group(['prefix' => 'admin'], function () {
                //admin
                Route::group(['as' => 'admin.'], function () {
                    Route::get('/', 'AdminController@index')->name('index');
                    //groups
                    Route::get('/groups/{group}/permissions', 'GroupsController@permissions')->name('groups.permissions');
                    Route::post('/groups/{group}/updatePermissions', 'GroupsController@updatePermissions')->name('groups.updatePermissions');
                    //custom fields
                    Route::get('/customfields/', 'CustomfieldsController@index')->name('customfields.index');
                    Route::get('/customfields/data', 'CustomfieldsController@data')->name('customfields.data');
                    Route::get('/customfield/{model}', 'CustomfieldsController@show')->name('customfields.show');
                    Route::get('/customfields/{customfield}/edit', 'CustomfieldsController@edit')->name('customfields.edit');
                    Route::post('/customfields/store', 'CustomfieldsController@store')->name('customfields.store');
                    Route::post('/customfields/storeLabel', 'CustomfieldsController@storeLabel')->name('customfields.storeLabel');
                    Route::post('/customfields/update', 'CustomfieldsController@update')->name('customfields.update');
                    Route::get('/customfields/deleteLabel', 'CustomfieldsController@deleteLabel')->name('customfields.deleteLabel');
                    //tabs
                    Route::get('/customfieldtabs/tabsData', 'CustomfieldsController@tabsData')->name('customfields.tabsData');
                    Route::get('/customfieldtabs/', 'CustomfieldsController@showTabs')->name('customfields.tabs');
                    Route::get('/customfieldtabs/create', 'CustomfieldsController@createTab')->name('customfields.createTab');
                    Route::get('/customfieldtabs/{tab}/edit', 'CustomfieldsController@editTab')->name('customfields.editTab');
                    Route::post('/customfieldtabs/store', 'CustomfieldsController@storeTab')->name('customfields.storeTab');
                    Route::post('/customfieldtabs/{tab}/update', 'CustomfieldsController@updateTab')->name('customfields.updateTab');
                    Route::post('/customfieldtabs/{tab}/confirm-delete', 'CustomfieldsController@getModalDelete')->name('customfields.confirm-delete-tab');
                    Route::get('/customfieldtabs/{tab}/deleteTab', 'CustomfieldsController@deleteTab')->name('customfields.deleteTab');
                    //themes 
                    Route::get('/themes/', 'ThemeController@index')->name('themes.index');
                    Route::get('/themes/setDefault', 'ThemeController@setDefault')->name('themes.setDefault');
                    Route::post('/themes/save', 'ThemeController@save')->name('themes.save');
                    //services 
                    Route::get('/services/data', 'ServiceController@data')->name('services.data');
                    Route::get('/services/delete', 'ServiceController@delete')->name('services.delete');
                    Route::post('/services/store', 'ServiceController@store')->name('services.store');
                    Route::post('/services/update', 'ServiceController@update')->name('services.update');
                    Route::get('/serviceLevels/data', 'ServiceController@levelData')->name('serviceLevels.levelData');
                    Route::get('/serviceLevels/{serviceLevel}/delete', 'ServiceController@levelDelete')->name('serviceLevels.delete');
                    Route::post('/serviceLevels/store', 'ServiceController@levelStore')->name('serviceLevels.store');
                    Route::post('/serviceLevels/update', 'ServiceController@levelUpdate')->name('serviceLevels.update');
                    Route::get('/serviceLevel/confirmDelete', 'ServiceController@getModalDelete')->name('serviceLevel.confirm.delete.serviceLevel');
                    //ticketblocks
                    Route::post('/tickets/storeBlock', 'TicketController@storeBlock')->name('tickets.storeBlock');
                    Route::post('/tickets/deleteBlock', 'TicketController@deleteBlock')->name('tickets.deleteBlock');
                });           
            });  
       
            //project permissions
            Route::group(['prefix' => 'projects'], function () {
                //view
                Route::group(['as' => 'projects.'], function () {
                    Route::get('/', 'ProjectsController@index')->name('index');
                    Route::post('/paginated/list', 'ProjectsController@paginate')->name('datatables_projects');
                    Route::get('/view/{project}', 'ProjectsController@show')->name('show_project_page');
                    Route::post('/milestones/{project}', 'MilestoneController@paginate')->name('get_project_milestones');
                    Route::post('/attachment/create/{project}', 'ProjectsController@add_attachment')->name('project_add_attachment');
                    Route::post('/attachments/get/{project}', 'ProjectsController@get_attachments')->name('project_attachment_datatable');
                    Route::post('/milestone/edit', 'MilestoneController@edit')->name('get_milestone_information');
                    Route::get('/invoice/modal/{project}', 'ProjectsController@invoice_project_modal_content')->name('get_invoice_project_modal_content');
                    Route::post('/change/status/{project}', 'ProjectsController@change_status')->name('change_project_status');

                });   
                //admin
                Route::group(['as' => 'projectAdmin.'], function () {
                    Route::get('/create', 'ProjectsController@create')->name('add_projects');
                    Route::post('/save', 'ProjectsController@store')->name('post_project');
                    Route::get('/edit/{project}', 'ProjectsController@edit')->name('edit_project_page');
                    Route::patch('/save/{project}', 'ProjectsController@update')->name('patch_project');
                    Route::get('/remove/{project}', 'ProjectsController@destroy')->name('delete_project');
                    Route::get('/milestones', 'ProjectsController@get_milestones_by_project_id')->name('get_milestones_by_project_id');
                    Route::get('/details/by/customer', 'ProjectsController@get_project_by_customer_id')->name('get_project_by_customer_id');
                    Route::get('/details/by/customer/contact', 'ProjectsController@get_project_by_customer_contact_id')->name('get_project_by_customer_contact_id');
                    //milestone
                    Route::post('/milestone/add', 'MilestoneController@store')->name('add_project_milestone');
                    Route::post('/milestone/save', 'MilestoneController@update')->name('update_project_milestone');
                    Route::get('/milestone/{milestone}', 'MilestoneController@destroy')->name('delete_project_milestone');
                });  
            });  
        });

        // Route::group(['prefix' => 'impersonate'], function () {
        //     //view
        //         Route::get('/stopImpersonate', 'UsersController@stopImpersonate')->name('stopImpersonate');
        // });

        Route::get('communications/{redirect?}', 'SupportPalController@login')->name('support-pal.login')->where('redirect', '.*');;

        Route::get('tickets/customerTickets/{customer}', 'TicketController@customerTickets')->name('tickets.customerTickets');
        Route::get('tickets', 'TicketController@index')->name('tickets.index');

        //timesheet
        Route::prefix('timesheets')->group(function (){
            Route::post('/list', 'TimeSheetController@paginate')->name('datatables_timesheet');
            Route::post('/create', 'TimeSheetController@store')->name('add_time_sheet');
            Route::post('/edit', 'TimeSheetController@edit')->name('get_time_sheet_information');
            Route::post('/save', 'TimeSheetController@update')->name('update_time_sheet');
            Route::get('/remove/{time_sheet}', 'TimeSheetController@destroy')->name('delete_time_sheet');
            Route::post('/report', 'TimeSheetController@report_paginate')->name('datatables_timesheet_report');
        });

        //nearby
        Route::get('nearby', 'NearbyController@index')->name('nearby.index');
        Route::post('nearby/customers', 'NearbyController@customers')->name('nearby.customers');  
      

        # User Management
        Route::group([ 'prefix' => 'users'], function () {
            Route::get('data', 'UsersController@data')->name('users.data');
            Route::get('/{user}#notifications', 'UsersController@show')->name('users.notifications');
            Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
            Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
            Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
            Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
        });
        Route::resource('users', 'UsersController');

        Route::resource('reports', 'ReportController');
 
        //sales
        Route::get('sales/', 'SalesController@index')->name('sales.index');

        //invoice
        Route::get('/invoice/view/{invoice?}/{url_slug}', 'InvoiceController@customer_view')->name('invoice_customer_view');

        Route::get('/search', 'CustomerController@search_customer')->name('search_customer');

        Route::prefix('payment/modes')->group(function (){
            Route::get('offline', 'PaymentModeController@offline_modes_index')->name('payment_modes_list');
            Route::post('offline', 'PaymentModeController@offline_modes_paginate')->name('datatables_payment_modes');
            Route::post('offline/create', 'PaymentModeController@offline_mode_store')->name('post_payment_mode');
            Route::post('offline/get', 'PaymentModeController@offline_mode_edit')->name('get_information_payment_mode');
            Route::post('offline/update', 'PaymentModeController@offline_mode_update')->name('patch_payment_mode');
            Route::get('offline/{mode}', 'PaymentModeController@offline_mode_destroy')->name('delete_payment_mode');
            Route::post('offline/change/status', 'PaymentModeController@offline_change_mode_status')->name('change_mode_status');
            Route::get('online', 'PaymentModeController@online_modes_main')->name('payment_modes_online_page');
            Route::post('online', 'PaymentModeController@store_online_payment_mode')->name('post_payment_modes_online');
        });

        Route::post('/attachment/profile/photo', 'AttachmentController@change_profile_photo')->name('change_profile_photo');

        Route::post('/contacts/fetch/emails/{customer}', 'CustomerController@contact_emails_by_customer_id')->name('get_contact_emails_by_customer_id');

        //notes
        Route::prefix('notes')->group(function (){
            Route::post('/update', 'NoteController@update')->name('patch_note');       
            Route::post('/destroy', 'NoteController@destroy')->name('delete_note');
        });

        // Reminders
        Route::prefix('reminders')->group(function (){
            Route::get('/', 'ReminderController@index')->name('reminder_list');
            Route::post('/list', 'ReminderController@paginate')->name('datatables_reminders');
            Route::post('/create', 'ReminderController@store')->name('post_reminder');
            Route::post('/information/', 'ReminderController@edit')->name('get_reminder_information');
            Route::post('/edit/{reminder?}', 'ReminderController@update')->name('patch_reminder');
            Route::get('/remove/{reminder}', 'ReminderController@destroy')->name('delete_reminder');
        });

        //vehicle
        Route::get('vehicles/data', 'VehicleController@data')->name('vehicles.data');
        Route::get('vehicles/data/{site}', 'VehicleController@siteData')->name('vehicles.siteData');
        Route::get('vehicles', 'VehicleController@index')->name('vehicles.index');
        Route::get('vehicles/{vehicle}', 'VehicleController@show')->name('vehicles.show');

        Route::get('workshop/{site}', 'WorkshopController@index')->name('workshop.index');

        Route::get('planner/{site?}', 'PlannerController@index')->name('planner.index');
        Route::get('vcalExport', 'PlannerController@vcalExport')->name('planner.vcalExport');
        Route::get('/getEvents', 'PlannerController@getEvents')->name('planner.getEvents');
        Route::get('/getResources', 'PlannerController@getResources')->name('planner.getResources');

        Route::get('doctype/data', 'DoctypeController@data')->name('doctype.data');
        Route::get('doctype/confirmDelete', 'DoctypeController@getModalDelete')->name('doctype.confirm.delete.doctype');
        Route::get('doctype/{doctype}/delete', 'DoctypeController@delete')->name('doctype.delete');
        Route::post('doctype/store', 'DoctypeController@store')->name('doctype.store');
        Route::post('doctype/update', 'DoctypeController@update')->name('doctype.update');

        Route::get('user/isAdmin', 'UsersController@isAdmin')->name('isAdmin');

        Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

        //attachment functionality
        Route::post('/attachment/upload', 'AttachmentController@upload')->name('cp_upload_attachment');
        Route::post('/attachment/temporary/remove', 'AttachmentController@delete_temporary_attachment')->name('cp_delete_temporary_attachment');
        Route::get('/attachment/download/{encrypted_url}', 'AttachmentController@download')->name('attachment_download_link');
        Route::get('/attachment/delete/{attachment}', 'AttachmentController@destroy')->name('remove_attachment');

        //notifications
        Route::post('/notifications/unread', 'UsersController@get_unread_notifications')->name('get_unread_notifications');
        Route::get('/notifications/members/profile/{member}?group=notifications', 'UsersController@notifications')->name('member_view_all_notifications');
        Route::post('/notifications/members/notifications', 'UsersController@notification_paginate')->name('datatable_member_notifications');
        Route::get('/notifications/redirect/{id}', 'UsersController@notification_redirect_url')->name('notification_redirect_url');
        Route::get('/notifications/mark/read/all', 'UsersController@mark_all_notification_as_read')->name('notification_all_mark_as_read');

        //expenses
        Route::prefix('expenses')->group(function (){  
            Route::get('/', 'ExpenseController@index')->name('expense_list');
            Route::post('/', 'ExpenseController@paginate')->name('datatables_expense');
            Route::get('/create', 'ExpenseController@create')->name('add_expense_page');
            Route::post('/create', 'ExpenseController@store')->name('post_expense');
            Route::get('/edit/{expense?}', 'ExpenseController@edit')->name('edit_expense_page');
            Route::patch('edit/{expense}', 'ExpenseController@update')->name('patch_expense');
            Route::get('/remove/{expense?}', 'ExpenseController@destroy')->name('delete_expense');
            Route::get('/details', 'ExpenseController@get_expense_details_ajax')->name('get_expense_details_ajax');
            Route::get('/download/receipt/{filename}', 'ExpenseController@download_attachment')->name('download_attachment_expense');
            Route::get('?id={expense}', 'ExpenseController@index')->name('show_expense_page');
        });

        Route::get('client/projects/view/{project}', 'ProjectsController@show')->name('cp_show_project_page');

        //user functoinality
        Route::get('/members/suggestion/list', 'UsersController@get_members_for_suggestion_list')->name('get_members_for_suggestion_list');

        //add to admin
        # Group Management
        Route::group(['prefix' => 'groups'], function () {
            Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
            Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
            Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
        });
        Route::resource('groups', 'GroupsController');

        //Route::get('{name?}', 'JoshController@showView');

        //Module group
        Route::group(['middleware' => ['module']], function () {
            Route::group(['prefix' => 'cabinet'], function () {
                //offsite backup
                Route::get('offsiteBackup', 'CabinetController@offsiteBackup')->name('cabinet.offsiteBackup');
                Route::get('offsiteBackup/data', 'CabinetController@offsiteBackupData')->name('offsiteBackup.data');
                Route::get('offsiteBackup/create', 'CabinetController@offsiteBackupCreate')->name('offsiteBackup.create');
                Route::get('offsiteBackup/{offsitebackup}/edit', 'CabinetController@offsiteBackupEdit')->name('offsiteBackup.edit');
                Route::post('offsiteBackup/store', 'CabinetController@offsiteBackupStore')->name('offsiteBackup.store');
                Route::post('offsiteBackup/{offsitebackup}/update', 'CabinetController@offsiteBackupUpdate')->name('offsiteBackup.update');

                //interface
                Route::get('interface', 'CabinetController@interface')->name('cabinet.interface');
                Route::get('interface/data', 'CabinetController@interfaceData')->name('interface.data');
                Route::get('interface/create', 'CabinetController@interfaceCreate')->name('interface.create');
                Route::get('interface/{interface}/edit', 'CabinetController@interfaceEdit')->name('interface.edit');
                Route::post('interface/store', 'CabinetController@interfaceStore')->name('interface.store');
                Route::post('interface/{interface}/update', 'CabinetController@interfaceUpdate')->name('interface.update');

                //firewall
                Route::get('firewall', 'CabinetController@firewall')->name('cabinet.firewall');
                Route::get('firewall/data', 'CabinetController@firewallData')->name('firewall.data');
                Route::get('firewall/create', 'CabinetController@firewallCreate')->name('firewall.create');
                Route::get('firewall/{firewall}/edit', 'CabinetController@firewallEdit')->name('firewall.edit');
                Route::post('firewall/store', 'CabinetController@firewallStore')->name('firewall.store');
                Route::post('firewall/{firewall}/update', 'CabinetController@firewallUpdate')->name('firewall.update');

                //vpn
                Route::get('vpn', 'CabinetController@vpn')->name('cabinet.vpn');
                Route::get('vpn/data', 'CabinetController@vpnData')->name('vpn.data');
                Route::get('vpn/create', 'CabinetController@vpnCreate')->name('vpn.create');
                Route::get('vpn/{vpn}/edit', 'CabinetController@vpnEdit')->name('vpn.edit');
                Route::post('vpn/store', 'CabinetController@vpnStore')->name('vpn.store');
                Route::post('vpn/{vpn}/update', 'CabinetController@vpnUpdate')->name('vpn.update');

                //licence
                Route::get('licence', 'CabinetController@licence')->name('cabinet.licence');
                Route::get('licence/data', 'CabinetController@licenceData')->name('licence.data');
                Route::get('licence/create', 'CabinetController@licenceCreate')->name('licence.create');
                Route::get('licence/{licence}/edit', 'CabinetController@licenceEdit')->name('licence.edit');
                Route::post('licence/store', 'CabinetController@licenceStore')->name('licence.store');
                Route::post('licence/{licence}/update', 'CabinetController@licenceUpdate')->name('licence.update');

                //admin account
                Route::get('adminAccount', 'CabinetController@adminAccount')->name('cabinet.adminAccount');
                Route::get('adminAccount/data', 'CabinetController@adminAccountData')->name('adminAccount.data');
                Route::get('adminAccount/create', 'CabinetController@adminAccountCreate')->name('adminAccount.create');
                Route::get('adminAccount/{adminAccount}/edit', 'CabinetController@adminAccountEdit')->name('adminAccount.edit');
                Route::post('adminAccount/store', 'CabinetController@adminAccountStore')->name('adminAccount.store');
                Route::post('adminAccount/{adminAccount}/update', 'CabinetController@adminAccountUpdate')->name('adminAccount.update');

                //3CX
                Route::get('threeCX', 'CabinetController@threeCX')->name('cabinet.threeCX');
                Route::get('threeCX/data', 'CabinetController@threeCXData')->name('threeCX.data');
                Route::get('threeCX/create', 'CabinetController@threeCXCreate')->name('threeCX.create');
                Route::get('threeCX/{threeCX}/edit', 'CabinetController@threeCXEdit')->name('threeCX.edit');
                Route::post('threeCX/store', 'CabinetController@threeCXStore')->name('threeCX.store');
                Route::post('threeCX/{threeCX}/update', 'CabinetController@threeCXUpdate')->name('threeCX.update');

                //cabinet
                Route::get('cabinet', 'CabinetController@cabinet')->name('cabinet.cabinet');
                Route::get('cabinet/data', 'CabinetController@cabinetData')->name('cabinet.data');
                Route::get('cabinet/create', 'CabinetController@cabinetCreate')->name('cabinet.create');
                Route::get('cabinet/{cabinet}/edit', 'CabinetController@cabinetEdit')->name('cabinet.edit');
                Route::post('cabinet/store', 'CabinetController@cabinetStore')->name('cabinet.store');
                Route::post('cabinet/{cabinet}/update', 'CabinetController@cabinetUpdate')->name('cabinet.update');
            });
        });

        Route::group(['middleware' => ['moduleAdmin']], function () {
                Route::get('modules', 'B2BModuleController@index')->name('modules.index');
                Route::post('modules/update', 'B2BModuleController@update')->name('modules.update');
        });

    });
});

# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually

Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
