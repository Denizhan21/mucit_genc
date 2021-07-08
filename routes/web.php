<?php

use Illuminate\Support\Facades\Route;

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

//Öğretmen ve Yönetici ortak Route lar
Route::group(['prefix'=>'mct_gnc_admin','middleware'=>['teacher']],function () {

    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('logout','AdminController@logout')->name('admin.logout');

    //Kulüp İşlemleri
    Route::resource('clubs','ClubController');

    //Kulüp Öğrenci İşlemleri
    Route::resource('club_user','ClubUserController');

    //Proje İşlemleri
    Route::get('project_index','AdminController@project_index')->name('projects.index');
    Route::get('all_project','AdminController@all_project')->name('projects.all');
    Route::get('projects/{id}','AdminController@project_details')->name('project_details');
    Route::put('project_edit/{id}','AdminController@project_edit')->name('project_edit');
    Route::put('student_comment/{id}','AdminController@student_comment')->name('student_comment');




});

//Yönetici Route lar
Route::group(['prefix'=>'mct_gnc_admin','middleware'=>'admin'],function () {

    //Kullanıcı İşlemleri
    Route::resource('users','UserController');

    //Okul İşlemleri
    Route::resource('schools','SchoolController');

    //Etkinlik İşlemleri
    Route::resource('activities','ActivityController');

    //Haber İşlemleri
    Route::resource('news','NewsController');

    //Yorum İşlemleri
    Route::resource('comments','CommentController');

    //Log Kayıtları
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

    //Excel İşlemleri
    Route::get('importExportView', 'MyController@importExportView');
    Route::get('export', 'MyController@export')->name('export');
    Route::post('import', 'MyController@import')->name('import');

});

Auth::routes();

//Anasayfa
Route::get('/', 'HomeController@index')->name('homepage');

//Çıkış İşlemleri
Route::get('logout','HomeController@logout')->name('homepage.logout');

//Tüm Duyurular Sayfası
Route::get('activity_view','HomeController@activity_view')->name('activity_view');

//Duyru Detay Sayfası
Route::get('activities/{id}','HomeController@activity_details')->name('activity_details');

//Proje Gönderme Sayfası
Route::get('project_send/{code}','HomeController@project_send')->name('project_send');

//Proje Post Etme İşlemi
Route::post('project_store','HomeController@project_store')->name('project_store');

//Öğretmen Yorum Gönderme İşlemleri
Route::post('teacher_comment','HomeController@teacher_comment')->name('teacher_comment');

//Öğretmen Yorum Güncelleme
Route::put('teacher_comment_update/{id}','HomeController@teacher_comment_update')->name('teacher_comment_update');

//Tüm Projeler Sayfası
Route::get('project_view','HomeController@project_view')->name('project_view');

//Proje Detay Sayfası
Route::get('projects/{id}','HomeController@projects_details')->name('projects_details');

//Tüm Kulüpler Sayfası
Route::get('club_view','HomeController@club_view')->name('club_view');

//Kulüp Detay Sayfası
Route::get('clubs/{id}','HomeController@clubs_details')->name('clubs_details');

//Kulüp İletişim Sayfası
Route::get('club_contact/{id}','HomeController@club_contact')->name('club_contact');

//Kulüp Soru Gönderme
Route::post('club_contact_store', 'HomeController@club_contact_store')->name('club_contact_store');

//İletişim Sayfası
Route::get('contact','HomeController@contact')->name('contact');

//Form Gönderme
Route::post('contact_store', 'HomeController@contact_store')->name('contact_store');

//Yorum Gönderme İşlemleri
Route::post('comment_send', 'HomeController@comment_send')->name('comment_send');

//Like Gönderme İşlemleri
Route::post('like_send', 'HomeController@like_send')->name('like_send');
Route::put('like_send_update/{id}','HomeController@like_send_update')->name('like_send_update');

//Kulübe Katılma İşlemleri
Route::get('club_join/{code}','HomeController@club_join')->name('club_join');
Route::post('club_join_store', 'HomeController@club_join_store')->name('club_join_store');

//Dosya Yöneticisi İşlemleri
Route::group(['prefix' => 'laravel-filemanager','middleware'=>['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('intervention-resizeImage',['as'=>'intervention.getresizeimage','uses'=>'FileController@getResizeImage']);
Route::post('intervention-resizeImage',['as'=>'intervention.postresizeimage','uses'=>'FileController@postResizeImage']);

Route::get('view-cache-clear', function (){
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return '';
})->name('clear.view.cache');


Route::get('migrate', function () {
     Artisan::call('migrate:fresh');
    return 'migrate gerçekleşti';
});

