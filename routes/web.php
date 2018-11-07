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

Route::get('/', 'HomeController@accueil');
Auth::routes();




Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['admin']], function () {
        Route::get('manag-user', 'HomeController@managUser')->name('manag-user');
        Route::get('Messages/{user_id}', 'MessageController@messageView')->name('Messages');
        Route::get('manag-order', 'HomeController@listOrder')->name('manag-order');
        Route::get('settings', 'HomeController@index')->name('settings');
        Route::get('see-all-waiting-payment', 'HomeController@index')->name('see-all-waiting-payment');
        Route::get('see-bidding-orders', 'HomeController@index')->name('see-bidding-orders');
        Route::post('change-etat', 'OrderController@changeStatus')->name('change-etat');

        Route::post('change-role', 'HomeController@changeRole')->name('change-role');
        Route::get('edit-user/{id}', 'HomeController@editUserForm')->name('edit-user');
        Route::post('save-updated-user', 'HomeController@saveProfileAdmin')->name('save-updated-user');
        Route::post('admin-send-message', 'MessageController@sendMessageAdmin')->name('admin-send-message');
        Route::post('get-last-message-user', 'MessageController@getLastMessageUser')->name('get-last-message-user');
        Route::post('charger-msg-user', 'MessageController@chargerMessageUser')->name('charger-msg-user');

        Route::get('manag-discount', 'HomeController@ManageDiscount')->name('manag-discount');
        Route::get('manag-prices', 'HomeController@ManagePriceView')->name('manag-prices');
        Route::get('static-setting', 'HomeController@settingView')->name('static-setting');


        Route::post('update-typepaper', 'HomeController@updateTypePaper')->name('update-typepaper');
        Route::post('add-typepaper', 'HomeController@addTypePaper')->name('add-typepaper');
        Route::post('delete-typepaper', 'HomeController@deleteTypePaper')->name('delete-typepaper');

        Route::post('update-subject', 'HomeController@updateSubject')->name('update-subject');
        Route::post('add-subject', 'HomeController@addSubject')->name('add-subject');
        Route::post('delete-subject', 'HomeController@deleteSubject')->name('delete-subject');

        Route::post('update-deadline', 'HomeController@updateStandardDeadline')->name('update-deadline');
        Route::post('add-deadline', 'HomeController@addStandardDeadline')->name('add-deadline');
        Route::post('delete-deadline', 'HomeController@deleteStandardDeadline')->name('delete-deadline');

        Route::post('update-typeformat', 'HomeController@updateTypeFormat')->name('update-typeformat');
        Route::post('add-typeformat', 'HomeController@addTypeFormat')->name('add-typeformat');
        Route::post('delete-typeformat', 'HomeController@deleteTypeFormat')->name('delete-typeformat');

        Route::post('update-typeofwork', 'HomeController@updateTypeOfWork')->name('update-typeofwork');
        Route::post('add-typeofwork', 'HomeController@addTypeOfWork')->name('add-typeofwork');
        Route::post('delete-typeofwork', 'HomeController@deleteTypeOfWork')->name('delete-typeofwork');

        Route::post('update-wordpage', 'HomeController@updateWordPage')->name('update-wordpage');
        Route::post('add-wordpage', 'HomeController@addWordPage')->name('add-wordpage');
        Route::post('delete-wordpage', 'HomeController@deleteWordPage')->name('delete-wordpage');

        Route::post('update-academiclevel', 'HomeController@updateAcademicLevel')->name('update-academiclevel');
        Route::post('add-academiclevel', 'HomeController@addAcademicLevel')->name('add-academiclevel');
        Route::post('delete-academiclevel', 'HomeController@deleteAcademicLevel')->name('delete-academiclevel');

        Route::post('update-price', 'HomeController@updatePrice')->name('update-price');

        Route::post('update-structure', 'HomeController@updateStructure')->name('update-structure');

        Route::post('update-bonreduction', 'HomeController@updateBon')->name('update-bonreduction');
        Route::post('add-bonreduction', 'HomeController@addBon')->name('add-bonreduction');
        Route::post('delete-bonreduction', 'HomeController@deleteBon')->name('delete-bonreduction');


        Route::get('edit-term', 'HomeController@modifyTerm')->name('edit-term');
        Route::post('save-term', 'HomeController@saveTerm')->name('save-term');

        Route::post('new-user', 'HomeController@newUser')->name('new-user');
        Route::post('delete-user', 'HomeController@deleteUser')->name('delete-user');
        Route::post('existe-code', 'BonreductionController@bonExiste')->name('existe-code');

    });


    //
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('order', 'OrderController@saveOrder')->name('order');
    Route::get('view-detail-order/{id}', 'OrderController@viewDetailOrder')->name('view-detail-order');


    Route::get('see-order/{id}', 'OrderController@seeOrder')->name('see-order');


    Route::get('pay-for-order/{amount}/{amount_max}', 'OrderController@payForOrder')->name('pay-for-order');
    Route::post('pay-for-order', 'OrderController@makePaymentForOrder')->name('pay-for-order-post');


    Route::get('my-orders', 'OrderController@myOrder')->name('my-orders');
    Route::get('my-payments', 'OrderController@myPayments')->name('my-payments');

    Route::get('my-messages', 'OrderController@myMessages')->name('my-messages');
    Route::post('send-message', 'MessageController@sendMessageUser')->name('send-message');
    Route::post('get-last-message', 'MessageController@getLastMessage')->name('get-last-message');

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('save-profile', 'UserController@saveProfile')->name('save-profile');

    Route::get('/payment/success', 'OrderController@retourPayalSuccess')->name('retourPayalSuccess');
    Route::get('/payment/error', 'OrderController@retourPayalError')->name('retourPayalError');

    Route::get('note-order/{id}', 'OrderController@formNoter')->name('note-order');

    Route::post('uploadFile', 'OrderController@uploadFile')->name('uploadFile');

    Route::get('seo-setting', 'HomeController@seoView')->name('seo-setting');
    Route::post('seo-setting', 'HomeController@seoUpdate')->name('seo-setting');





    /*
     * payment route
     */
    Route::get('pay-for-order/{amount}/{amount_max}', 'OrderController@payForOrder')->name('pay-for-order');
    Route::post('send-payment-nonce', 'OrderController@receivePaymentNonce')->name('send-payment-nonce');

});






Route::get('prices', 'DeadlineController@prices')->name('prices');

Route::get('blog', 'HomeController@viewBlog')->name('blog');


/*Route::get('/prices', function () {
    //return view('welcome');
    return view('front.prices');
});*/

Route::get('/calculate', function () {
    //return view('welcome');
    return view('front.calculate');
});


Route::get('order', 'OrderController@showForm')->name('order');
Route::post('apply-discount', 'BonreductionController@getBonDeReduction')->name('apply-discount');


Route::get('term', 'HomeController@term')->name('term');



Route::post('save-and-connect-user', 'UserController@saveAndConnect')->name('save-and-connect-user');
Route::post('login-user', 'UserController@loginUser')->name('login-user');
Route::post('register-user', 'UserController@registerUser')->name('register-user');












Route::resource('users', 'UserController');

Route::resource('pays', 'PaysController');

Route::resource('academiclevels', 'AcademiclevelController');

Route::resource('bonreductions', 'BonreductionsController');

Route::resource('deadlines', 'DeadlineController');

Route::resource('etats', 'EtatsController');

Route::resource('extratservices', 'ExtratserviceController');

Route::resource('files', 'FileController');

Route::resource('historiques', 'HistoriquesController');

Route::resource('orders', 'OrderController');

Route::resource('pays', 'PayController');

Route::resource('referencements', 'ReferencementController');

Route::resource('roles', 'RoleController');

Route::resource('roleUsers', 'Role_userController');

Route::resource('soldes', 'SoldeController');

Route::resource('structures', 'StructureController');

Route::resource('typeformats', 'TypeformatController');

Route::resource('typeofworks', 'TypeofworksController');

Route::resource('typepapers', 'TypepaperController');

Route::resource('userslevels', 'UserslevelController');

Route::resource('wordpages', 'WordpageController');

Route::resource('etats', 'EtatController');

Route::resource('typeofworks', 'TypeofworkController');

Route::resource('historiques', 'HistoriqueController');

Route::resource('bonreductions', 'BonreductionController');

Route::resource('subjects', 'SubjectController');

Route::resource('standarddeadlines', 'StandarddeadlineController');

Route::resource('operations', 'OperationController');

Route::resource('messages', 'MessageController');

Route::resource('terms', 'TermController');