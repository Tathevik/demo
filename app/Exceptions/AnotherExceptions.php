<?php
/**
 * Created by PhpStorm.
 * User: tatevik
 * Date: 1/12/18
 * Time: 5:37 PM
 */
namespace App\Exceptions;

use App\Http\Resources\OtherException;
use Throwable;

class AnotherExceptions extends \Exception
{

    protected $_token;

    public function __construct($_token)
    {
        $this->_token = $_token;
    }

    public function render($request)
    {
        return new OtherException((object)['message' => 'Internal Server Error', 'token' =>  $this->_token]);
    }
}
