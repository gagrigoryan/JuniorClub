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

use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('main.main');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('admin/users', 'AdminController@getUsers')->name('admin.users');
    Route::get('admin/get-all-users', 'AdminController@getAllUsers');
    Route::get('admin/products', 'AdminController@changeProducts')->name('admin.products');
    Route::delete('admin/delete/product/{id}', 'ProductController@destroy');
    Route::post('admin/update/product/{id}', 'ProductController@update');
    Route::delete('admin/delete/user/{user}', 'UserController@destroy');
    Route::post('admin/update/user/{id}', 'UserController@updateId');
    Route::get('admin/orders', 'AdminController@showOrders')->name('admin.orders');
    Route::get('admin/get-orders', 'OrderController@getOrders');
    Route::post('admin/activate/order/{order}', 'OrderController@activateOrder')->name('order.activate');


    Route::get('/admin/image/upload', 'UploadController@uploadPage')->name('admin.upload');
    Route::post('/admin/image/upload-image', 'UploadController@upload')->name('image.upload');
});



Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/{user}/students', 'StudentController@index')->name('students');
    Route::post('/student/add', 'StudentController@store')->name('student.add');
    Route::post('/student/change/{id}', 'StudentController@update')->name('student.edit');
    Route::delete('/student/delete/{student}/', 'StudentController@destroy')->name('student.delete');
    Route::get('/my-subjects', 'ProductController@index')->name('subjects');
    Route::get('/{user}/choose/product', 'ProductController@choose')->name('product.choose');
    Route::post('/add/order/', 'OrderController@store')->name('add.order');
    Route::delete('/delete/order/{order}/', 'OrderController@destroy')->name('delete.order');
    Route::post('/profile', 'UserController@updateAvatar')->name('update.avatar');



    Route::post('add-product', 'AdminController@store');

    Route::get('/get-user', 'UserController@getUser');
    Route::post('/update-user/', 'UserController@update');


    Route::get('/get-students/{user}', 'UserController@getStudents');
    Route::get('/get-students-orders/{user}', 'UserController@getStudentsOrders');
    Route::get('/get-students-products/', 'UserController@getStudentsProducts');

    Route::post('/pay', 'PaymentController@pay')->name('pay.order');
    Route::get('/pay-page/{order}', 'PaymentController@payPage')->name('pay.page');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teachers', 'TeacherController@index')->name('teachers');
Route::get('/subjects', 'ProductController@mainSubjects')->name('main.subjects');
Route::get('/contacts', 'ContactsController@showContacts')->name('contacts');
Route::get('get-all-products', 'AdminController@getAllProducts');
Route::post('/request/user/', 'MailController@requestUser')->name('request.user');
Route::get('/gallery', function () {
    return view('main.gallery');
})->name('gallery');

