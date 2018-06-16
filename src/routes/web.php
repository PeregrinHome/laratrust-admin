<?php
//composer dump-autoload

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');

    Route::delete('permissions', 'PermissionsController@actionsDestroy')->name('permissions.actions.destroy');
    Route::delete('roles', 'RolesController@actionsDestroy')->name('roles.actions.destroy');

//    Route::group(['middleware' => ['permission:users__roles--update']], function () {
        Route::patch('users/{user}/roles/update', 'UsersController@rolesUpdate')->name('users.roles.update');
        Route::get('users/{user}/roles', 'UsersController@roles')->name('users.roles');
//    });
//    Route::group(['middleware' => ['permission:roles__permissions--update']], function () {
        Route::patch('roles/{role}/permissions/update', 'RolesController@permissionsUpdate')->name('roles.permissions.update');
        Route::get('roles/{role}/permissions', 'RolesController@permissions')->name('roles.permissions');
//    });

});

