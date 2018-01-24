<?php
/**
 * Created by PhpStorm.
 * User: tatevik
 * Date: 1/18/18
 * Time: 5:40 PM
 */
namespace App\Repositories;

use App\User;
use App\Contracts\UserInterface;

class CheckAuthToken implements UserInterface
{

    private $data;


    public function __set($key, $vlue)
    {

        $this->data[$key] = $vlue;
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->data)){

            return $this->data[$key];
        }

        return null;

    }



}