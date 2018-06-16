Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'Users\UserController');
    //    Route::resource('posts', 'PostController');
    Route::resource('roles', 'Users\RoleController');
    Route::resource('permissions', 'Users\PermissionController');

    Route::delete('permissions', 'Users\PermissionController@actionsDestroy')->name('permissions.actions.destroy');
    Route::delete('roles', 'Users\RoleController@actionsDestroy')->name('roles.actions.destroy');

    //    Route::group(['middleware' => ['permission:users__roles--update']], function () {
    Route::patch('users/{user}/roles/update', 'Users\UserController@rolesUpdate')->name('users.roles.update');
    Route::get('users/{user}/roles', 'Users\UserController@roles')->name('users.roles');
    //    });
    //    Route::group(['middleware' => ['permission:roles__permissions--update']], function () {
    Route::patch('roles/{role}/permissions/update', 'Users\RoleController@permissionsUpdate')->name('roles.permissions.update');
    Route::get('roles/{role}/permissions', 'Users\RoleController@permissions')->name('roles.permissions');
    //    });
});