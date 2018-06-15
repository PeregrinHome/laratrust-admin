<?php
/**
 * Created by PhpStorm.
 * User: cvaize
 * Date: 16.06.2018
 * Time: 0:33
 */

namespace LaratrustAdmin;

use Illuminate\Support\Facades\Facade;

class LaratrustAdminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LaratrustAdmin';
    }
}

