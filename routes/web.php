<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers',function(){
	$begin = memory_get_usage();
    $faker = Faker\Factory::create();

    $limit = 10000;

    $users=App\User::all();

    // for ($i = 0; $i < $limit; $i++) {
    //     App\User::create([
    //     		'name'=>$faker->name,
    //     		'email'=>$faker->unique()->email,
    //     		'phone'=>$faker->phoneNumber
    //     	]);
    // }

    // foreach ($users->chunk(100) as $user_chunk) {
    // 	foreach ($user_chunk as $user) {
    // 		echo $user->name.'<br>';
    // 	}
    // }

return view('sample',compact('users'));

});

Auth::routes();

Route::get('/home', 'HomeController@index');
