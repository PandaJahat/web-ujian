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
    return view('welcome');
});

Auth::routes();
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::middleware('auth')->group(function () {
  Route::namespace('User')->group(function () {
    // User Route

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('exam')->group(function() {
      Route::get('/', 'ExamController@index')->name('exam');
      Route::get('/detail', 'ExamController@detail')->name('exam.detail');
      Route::get('/{id}', 'ExamController@show')->name('exam.show');
    });

    Route::prefix('user')->group(function() {
        Route::get('/profile', 'UserController@profile')->name('user.profile');
    });

  });
});

Route::prefix('admin')->group(function() {
  Route::namespace('Auth')->group(function () {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
  });

  Route::middleware('auth:admin')->group(function () {
    Route::namespace('Admin')->group(function () {
      // Admin Route

      Route::get('/', 'AdminController@index')->name('admin.dashboard');

      Route::prefix('class')->group(function() {
        Route::get('/', 'ClassController@index')->name('admin.class');
        Route::get('/data', 'ClassController@data')->name('admin.class.data');
        Route::get('/{id}/detail', 'ClassController@detail')->name('admin.class.detail');

        Route::post('/create', 'ClassController@create')->name('admin.class.create.submit');

        Route::patch('/{id}/update', 'ClassController@update')->name('admin.class.update.submit');

        Route::delete('/delete', 'ClassController@delete')->name('admin.class.delete.submit');

        Route::prefix('{id}/user')->group(function() {
          Route::get('/list', 'ClassController@userList')->name('admin.class.user.list');

          Route::post('/create', 'ClassController@userCreate')->name('admin.class.user.create.submit');
        });

        Route::prefix('{id}/exam')->group(function() {
          Route::get('/', 'ClassController@exam')->name('admin.class.exam');
          Route::get('/data', 'ClassController@examData')->name('admin.class.exam.data');
          Route::get('/list', 'ClassController@examList')->name('admin.class.exam.list');

          Route::post('/select', 'ClassController@examSelect')->name('admin.class.exam.select');
          Route::delete('/remove', 'ClassController@examRemove')->name('admin.class.exam.remove');

          Route::get('/change', 'ClassController@examChangeModal')->name('admin.class.exam.change');
          Route::patch('/change', 'ClassController@examChange')->name('admin.class.exam.change.submit');
        });

      });

      Route::prefix('question')->group(function() {
        Route::get('/', 'QuestionController@index')->name('admin.question');
        Route::get('/data', 'QuestionController@data')->name('admin.question.data');

        Route::post('/create', 'QuestionController@create')->name('admin.question.submit');
        Route::get('/update', 'QuestionController@formUpdate')->name('admin.question.update');

        Route::patch('/update', 'QuestionController@update')->name('admin.question.update.submit');

        Route::post('/detail', 'QuestionController@detail')->name('admin.question.detail');

        Route::delete('/delete', 'QuestionController@delete')->name('admin.question.delete');
      });

      Route::prefix('exam')->group(function() {
        Route::get('/', 'ExamController@index')->name('admin.exam');
        Route::get('/data', 'ExamController@data')->name('admin.exam.data');
        Route::get('/create', function (){ return view('admin.exam.create'); })->name('admin.exam.create');
        Route::get('{id}/detail', 'ExamController@detail')->name('admin.exam.detail');
        Route::get('{id}/update', 'ExamController@updateForm')->name('admin.exam.update');

        Route::post('/create', 'ExamController@create')->name('admin.exam.create.submit');
        Route::patch('{id}/update', 'ExamController@update')->name('admin.exam.update.submit');
        Route::delete('/delete', 'ExamController@delete')->name('admin.exam.delete.submit');

        Route::prefix('{id}/question')->group(function() {
          Route::get('/', 'ExamController@question')->name('admin.exam.question');          
          Route::post('/', 'ExamController@questionCreate')->name('admin.exam.question.create.submit');
          Route::get('/data', 'ExamController@questionData')->name('admin.exam.question.data');
          Route::delete('/remove', 'ExamController@questionRemove')->name('admin.exam.question.remove');
          
          Route::get('/list', 'ExamController@questionList')->name('admin.exam.question.list');
          Route::post('/select', 'ExamController@questionSelect')->name('admin.exam.question.select');          
        });

      });

      Route::prefix('user')->group(function() {
        Route::get('/', 'UserController@index')->name('admin.user');
        Route::get('/data', 'UserController@data')->name('admin.user.data');

        Route::delete('{id}/delete', 'UserController@delete')->name('admin.user.delete');

        Route::post('/username', 'UserController@checkUsername')->name('admin.user.checkUsername');
      });

      Route::prefix('data')->group(function() {
        Route::namespace('Data')->group(function () {
          Route::prefix('education')->group(function() {
            Route::get('/', function () {
              return view('admin.data.education');
            })->name('admin.data.education');

            Route::get('/data', 'EducationController@data')->name('admin.data.education.data');

            Route::post('/status', 'EducationController@changeStatus')->name('admin.data.education.status');
            Route::post('/create', 'EducationController@create')->name('admin.data.education.create.submit');

            Route::post('/update', 'EducationController@formUpdate')->name('admin.data.education.update');
            Route::post('/{id}/update', 'EducationController@update')->name('admin.data.education.update.submit');
          });

          Route::prefix('program')->group(function() {
            Route::get('/', function () {
              return view('admin.data.program');
            })->name('admin.data.program');

            Route::get('/data', 'ProgramController@data')->name('admin.data.program.data');

            Route::post('/create', 'ProgramController@create')->name('admin.data.program.create.submit');

            Route::post('/update', 'ProgramController@updateForm')->name('admin.data.program.update');
            Route::patch('/update', 'ProgramController@update')->name('admin.data.program.update.submit');
            Route::delete('/delete', 'ProgramController@delete')->name('admin.data.program.delete');
          });

        });
      });

    });
  });

});
