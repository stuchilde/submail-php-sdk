<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/18
 * Time: 10:28 AM
 */
/**
 * Class Facade.
 */
namespace Eckoo\SDK\Facades;

use Illuminate\Support\Facades\Facade;

class Message extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Submail::class;
    }
}
