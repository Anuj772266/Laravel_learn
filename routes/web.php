<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\http\controllers\StudentController;
use App\http\controllers\TestController;
use App\http\controllers\EmployeeController;
use App\Http\Controllers\File_uploadeController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


// function getUser(){
//     return [
//         ['name' => 'Ashish', 'email' => 'ashish@gmail.com', 'phone' => '9404945043', 'city' => 'Jaipur'],
//         ['name' => 'Anuj', 'email' => 'anuj@gmail.com', 'phone' => '0904945043', 'city' => 'Patna'],
//         ['name' => 'Sonu', 'email' => 'sonu@gmail.com', 'phone' => '8989945043', 'city' => 'Odisha'],
//         ['name' => 'Rajnish', 'email' => 'rajnish@gmail.com', 'phone' => '0004945043', 'city' => 'Chhapra'],
//         ['name' => 'Govind', 'email' => 'govind@gmail.com', 'phone' => '123945043', 'city' => 'Nepal']
//     ];
// }

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/home', function () {
    return view('newBlog');
})->name('home');

Route::controller(StudentController::class)->group(function(){
    Route::get('/student/{id}',  'student')->name('student.show');
    Route::get('/blog','showBlog')->name('blog');
});

Route::get('/test', TestController::class);

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employee', 'show')->name('home');
    //Route::get('/employee/{id}', [App\Http\Controllers\employeeController::class, 'singleEmploy'])->name('view.employee');
    Route::get('/employee/{id}', 'singleEmploy')->name('view.employee');

    Route::post('/add', 'create')->name('create');
    Route::put('/update/{id}', 'update')->name('update.employee');
    Route::get('/updatepage/{id}',  'updatepage')->name('update.page');
    Route::get('/delete/{id}', 'delete')->name('delete.employee');
    //Route::get('/Update/{id}', 'update')->name('update.employee');
});

Route::view('newemployee', '/addEmployee');

Route::get('/testing', function () {
    return view('anuj');
})->name('mypost');

Route::redirect('/about', '/testing');

Route::get('post/{id}', function(string $id){
    return "<h1>Post Id No: $id</h1>";
});

Route::get('/post/{id?}/comment/{commentid?}', function (string $id = null, string $comment = null) {
    if($id){
        return "<h1> Post Id : $id </h1> <h3>This is first comment : $comment</h3>";
    }else{
    return "<h1>Not Found</h1>";
    }
});
//
// Route::get('/post/{id}', function (string $id) {
//         if($id){
//             return "<h1> Post Id : $id </h1> ";
//         }else{
//         return "<h1>Not Found</h1>";
//         }
//     })->whereNumber('id');

//     Route::get('/alpha/{val}', function(string $val){
//         if($val){
//             return "<h2>Post Value : $val</h2>";
//         }
//     })->whereAlpha('val');

//     Route::get('alphaNo/{valno}', function($valno){
//         if($valno){
//             return "<h2>Post Alpha value : $valno </h2>";
//         }
//     })->whereAlphaNumeric('valno');

//     Route::get('post/{let}', function($let){
//         if($let){
//             return "<h2>Post Special Char : $let</h2>";
//         }
//     })->whereIn('let',['song', 'video', 'painting']);

//     Route::get('special/{spclet}', function($spclet){
//         if($spclet){
//             return "<h2> This is Spacial char: $spclet</h2>";
//         }
//     })->where('spclet', '[a-zA-Z0-9]+');


//     Route::get('/post/{id}/comment/{commentid}', function(string $id, string $comment){
//         if($id){
//             return "<h2>Post Id: $id & Comment : $comment</h2>";
//         }
//     })->where('id', '[0-use App\Http\Controllers\UserController;
// // Route::resource('/table_students', TableStudentsController::class, 'index');

// //Route::view('/testing', 'anuj');

// Route::view('/demopage', 'Demo');

// Route::view('/test', 'php_script');

// Route::view('/subpage/sub_url', 'Demo_one');

// Route::view('/home_data', 'home');

// Route::get('/userData', function(){
// $address = getUser();

// Route::resource('/companies', CompanyController::class)->names([
//     'create' => 'companies.build',
//     'show' => use App\Http\Controllers\UserController;
Route::resource('/users', UserController::class);
Route::resource('/file-upload', File_uploadeController::class);


    //$pass_route = 'Happy New Year';
    //return view('user_pass', ['user' => $pass_route, 'city' => 'jaipur']);

    // return view('user_pass')->with('user', $pass_route)->with('city', 'jaipur');

    //return view('user_pass')->withUser($pass_route)->withCity('Delhi');

    //return view('user_pass')->withUser($address);

// });

// Route::get('/userData/{key}', function($key){
//     $users = getUser();
//     abort_if(!isset($users[$key]), 404);
//     $user = $users[$key];
//     return view('newUser',['key' => $user]);
// })->name('view.user');

// Route::view('/users', 'users',
// ['user' => 'Happy Users']);

Route::fallback(function(){
    return "<h1>Page Not Found<h1>";
});

Route::get('/showStudent', [StudentController::class, 'showStudent']);
Route::get('/union', [StudentController::class, 'union']);
Route::get('/whenData', [StudentController::class, 'whenData']);
Route::get('/chunk', [StudentController::class, 'chunkData']);

// Route::GET('/company', [CompanyController::class, 'index'])->name('company');





