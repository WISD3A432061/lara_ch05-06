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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
//練習一
Route::get('student/{student_no}',function($student_no){
    return "學號：".$student_no;
});
Route::get('student/{student_no}/score',function($student_no){
    return "學號：".$student_no."的所有成績";
});


//練習二
Route::get('student/{student_no}/score/{subject}', function ($student_no,$subject) {
    return '學號：' . $student_no . '的' . $subject . '成績';
});


//練習三
Route::get('student/{student_no}/score/{subject}',function($student_no,$subject=null){
        return "學號：".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
 });


//練習四
Route::get('student/{student_no}',function($student_no){
        return "學號：".$student_no;
 }) ->where (['student_no'=>'s[0-9]{10}']);
Route::get('student/{student_no}/score/{subject?}',function($student_no,$subject = null){
        return "學號：".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
 })->where(['student_no'=>'s[0-9]{10}','subject'=>'(chinese | english | math']);

//練習五
Route::pattern('student_no','s[0-9]{10}');
Route::get('student/{student_no}',function($student_no) {
        return "學號：" . $student_no;
 });
Route::get('student/{student_no}/score/{subject?}',function($student_no,$subject = null){
        return "學號：".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
 })->where(['subject'=>'(chinese | english | math']);

//練習六
Route::pattern('student_no','s[0-9{10}');
Route::group(['prefix'=>'student',function(){
        Route::get('{student_no}',function($student_no){
                return " 學號：".$student_no;
     });
        Route::get('{student_no}/score/{subject?}',function($student_no,$subject = null)
     {
         return "學號：" . $student_no . "的" . ((is_null($subject))? "所有科目": $subject)."成績";
     })->where(['subject'=>'(chinese | english | math)']);
 }]);

*/
/*
//練習七
Route::pattern('student_no','s[0-9]{10}');
Route::group(['prefix'=>'student'],function() {
        Route::get('{student_no}',[
         'as'=>'student',
         'users'=>function($student_no){
                    return "學號：".$student_no;
         }
     ]);
     Route::get('{student_no}/score/{subject?}',[
         'as'=>'student.score',
         'users'=>function($student_no,$subject=null){
                    return "學號：".$student_no.' 的'.((is_null($subject))?'所有科目':$subject).'成績';
         }
     ])->where(['subject'=>'(chinese | english | math']);
 });
*/

//練習八
Route::get('/','HomeController@index');

//練習九
Route::pattern('student_no','s[0-9]{10}');

Route::group(['prefix' => 'student'],function(){
    Route::get('{student_no}',['as' => 'student', 'uses' => 'StudentController@getStudentData']);

        Route::get('{student_no}/score/{subject?}',[
                'as' => 'student.score',
                'uses' => 'StudentController@getStudentScore'])->where(['subject' => '(chinese|english|math)']);
});
