Route::get('/logout',[
'uses' => 'UserController@getLogout',
'as' => 'user.logout'
]);