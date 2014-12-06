<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



    # Behavioral Econ *********************************************************

Route::get('/', function()
{
	return View::make('behavior/landing');
});

Route::get('/behavior', function(){
	return View::make('/behavior/landing');
});

Route::get('/behavior/review', function(){
	return View::make('/behavior/book-reviews');
});

Route::get('/behavior/list', function(){
	return View::make('/behavior/reading-list');
});

Route::get('/behavior/forum', function(){
	return View::make('/behavior/forum');
});

Route::get('/behavior/signup', array('before' => 'guest', function() {
    return View::make('/behavior/signup');
}));

Route::post('/behavior/signup', array('before' => 'csrf', function() {

            $user = new User;
            $user->name = Input::get('name');
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/behavior/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/behavior');

        }
    )
);


Route::get('/behavior/login', array('before' => 'guest', function() {
    return View::make('/behavior/login');
}));

Route::post('/behavior/login', array('before' => 'csrf', function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/behavior')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/behavior/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('/behavior/login');
        }
    )
);

Route::get('/behavior/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/behavior');

});

Route::get('/behavior/post_create', function()
{
    return View::make('behavior/post_create');
});

Route::post('/behavior/create-post', 'PostController@postCreate');

Route::get('/behavior/book_create', function()
{
    return View::make('behavior/book_create');
});

Route::post('/behavior/create-book', 'BookController@postCreate');

Route::get('/behavior/post/{id}', 'PostController@postRead');

Route::get('/behavior/comment_create/{id}', array('before' => 'user', function($id){
    return View::make('behavior/comment_create')->with('id', $id);
}));

Route::post('/behavior/create-comment/{id}', 'CommentController@postCreate');

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    var_dump($results);

});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


