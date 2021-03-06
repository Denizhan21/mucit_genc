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
Route::group(['prefix'=>'mct','middleware'=>['teacher']],function () {

    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('logout','AdminController@logout')->name('admin.logout');

    //Kulüp İşlemleri
    Route::resource('clubs','ClubController');

    //Kulüp Öğrenci İşlemleri
    Route::resource('club_user','ClubUserController');

    //Kulübe Öğrenci Ekleme İşlemleri
    Route::get('club_student_create','AdminController@club_student_create')->name('club_student_create');
    Route::post('club_student_store','AdminController@club_student_store')->name('club_student_store');

    //Duyuru İşlemleri
    Route::resource('activities','ActivityController');

    //Okul İşlemleri
    Route::resource('schools','SchoolController');

    //Proje İşlemleri
    Route::get('project_index','AdminController@project_index')->name('projects.index');
    Route::get('all_project','AdminController@all_project')->name('projects.all');
    Route::get('projects/{id}','AdminController@project_details')->name('project_details');
    Route::put('project_edit/{id}','AdminController@project_edit')->name('project_edit');
    Route::put('student_comment/{id}','AdminController@student_comment')->name('student_comment');

    //Öğretmen Kulüpleri Sayfası
    Route::get('teacher_club','ClubController@teacher_club')->name('teacher_club');

    //Öğretmen Projeleri Sayfası
    Route::get('teacher_project','AdminController@teacher_project')->name('teacher_project');

    //Kulüp Rozetleri
    Route::get('club_rosette','AdminController@club_rosette')->name('club_rosette');
    Route::get('rosette_details/{id}','AdminController@rosette_details')->name('rosette_details');
    Route::get('rosette_create','AdminController@rosette_create')->name('rosette_create');
    Route::post('rosette_store', 'AdminController@rosette_store')->name('rosette_store');
    Route::get('rosette_student','AdminController@rosette_student')->name('rosette_student');
    Route::get('rosette_add','AdminController@rosette_add')->name('rosette_add');
    Route::post('rosette_add_store', 'AdminController@rosette_add_store')->name('rosette_add_store');
    Route::get('rosette_delete/{id}','AdminController@rosette_delete')->name('rosette_delete');
    Route::put('rosette_update/{id}','AdminController@rosette_update')->name('rosette_update');


    //Kulüp Platform Bilgileri
/*    Route::get('club_platform','AdminController@club_platform')->name('club_platform');
    Route::get('platform_details/{id}','AdminController@platform_details')->name('platform_details');
    Route::get('platform_create','AdminController@platform_create')->name('platform_create');
    Route::post('platform_store', 'AdminController@platform_store')->name('platform_store');
    Route::put('platform_update/{id}','AdminController@platform_update')->name('platform_update');*/

    //Kulüp Canlı Link Bilgileri
    Route::get('club_link','AdminController@club_link')->name('club_link');
    Route::get('link_details/{id}','AdminController@link_details')->name('link_details');
    Route::get('link_create','AdminController@link_create')->name('link_create');
    Route::post('link_store', 'AdminController@link_store')->name('link_store');
    Route::put('link_update/{id}','AdminController@link_update')->name('link_update');

    //Öğrenci Platform İşlemleri
    Route::get('platform','AdminController@platform')->name('platform');
    Route::get('platform_create','AdminController@platform_create')->name('platform_create');
    Route::post('platform_store', 'AdminController@platform_store')->name('platform_store');
    Route::get('platform_details/{id}','AdminController@platform_details')->name('platform_details');
    Route::put('platform_update/{id}','AdminController@platform_update')->name('platform_update');


});

//Yönetici Route lar
Route::group(['prefix'=>'mct','middleware'=>'admin'],function () {

    //Kullanıcı İşlemleri
    Route::resource('users','UserController');

    //Gelen Mesaj İşlemleri
    Route::get('contact_index','AdminController@contact_index')->name('contact_index');
    Route::get('contact_edit/{id}','AdminController@contact_edit')->name('contact_edit');
    Route::get('contact_update/{id}','AdminController@contact_update')->name('contact_update');

    //Gündem İşlemleri
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

//Kulüp Platform Bilgileri Sayfası
Route::get('platform_club/{id}','HomeController@platform_club')->name('platform_club');

//Kulüp İletişim Sayfası
Route::get('club_contact/{id}','HomeController@club_contact')->name('club_contact');

//Kulüp Soru Gönderme
Route::post('club_contact_store', 'HomeController@club_contact_store')->name('club_contact_store');

//Rozetlerim Sayfası
Route::get('rosette', 'HomeController@rosette')->name('rosette');

//İletişim Sayfası
Route::get('contact','HomeController@contact')->name('contact');

//Form Gönderme
Route::post('contact_store', 'HomeController@contact_store')->name('contact_store');

//Yorum Gönderme İşlemleri
Route::post('comment_send', 'HomeController@comment_send')->name('comment_send');

//Like Gönderme İşlemleri
Route::post('rating_send', 'HomeController@rating_send')->name('rating_send');
Route::get('rating_send_update/{id}','HomeController@rating_send_update')->name('rating_send_update');

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


//Sosyal Medya
Route::get('social','HomeController@social')->name('social');

//Duyuru Onaylama ve Onay Kaldırma İşlemleri
Route::get('activity_onayla/{id}','AdminController@activity_onayla')->name('activity_onayla');
Route::get('activity_onaykaldir/{id}','AdminController@activity_onaykaldir')->name('activity_onaykaldir');


//Öğrenciye Yorum Hakkı verme ve Kaldırma İşlemleri
Route::get('onayla/{id}','UserController@onayla')->name('users.onayla');
Route::get('onaykaldir/{id}','UserController@onaykaldir')->name('users.onaykaldir');

//Gündem Detay Sayfası
Route::get('news/{id}','HomeController@news_details')->name('news_details');

//Proje Onaylama ve Onay Kaldırma İşlemleri
Route::get('project_onayla/{id}','AdminController@project_onayla')->name('project_onayla');
Route::get('project_onaykaldir/{id}','AdminController@project_onaykaldir')->name('project_onaykaldir');



Route::get('deneme','HomeController@deneme')->name('deneme');

Route::post('deneme_gonder','HomeController@deneme_gonder')->name('deneme_gonder');


/*javascript: let crns=[10708, 10709, 10712, 10617, 10637, 10707, 10160, 10103];
let inputs = document.querySelectorAll("input[type=number]");
for (let i = 0; i < crns.length; i++) {
    inputs[i].value = crns[i];
    inputs[i].dispatchEvent(new Event('input'));
}
let form = document.querySelector('form');
form.dispatchEvent(new Event('submit'));
new Promise((resolve) => setTimeout(resolve, 100)).then(() => {
    let button = document.querySelector('.card-footer button.btn-success');
    button.dispatchEvent(new Event('click'));
})*/
