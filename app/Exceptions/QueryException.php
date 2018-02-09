<?php
/**
 * Created by PhpStorm.
 * User: tatevik
 * Date: 1/12/18
 * Time: 3:26 PM
 */

namespace App\Exceptions;

use App\Http\Resources\NotFoundException as NotFoundExceptionResource;

class QueryException extends \Exception
{
    public function render($request)
    {
        return new QueryExceptionResource((object)['message' => 'something went wrong']);
    }
}
