<?php

namespace App\Validators;

use Illuminate\Validation\Validator;

class CustomRules extends Validator
{
    private $custom_messages = [

        "alpha_num_dots" => "The :attribute may only contain letters, numbers and dots.",
    ];

    public function __construct( $translator, $data, $rules, $messages = [], $customAttributes = [] )
    {

        parent::__construct( $translator, $data, $rules, $messages, $customAttributes );

        $this->set_custom_messages();
    }


    protected function set_custom_messages() {

        $this->setCustomMessages( $this->custom_messages );
    }

    protected function validateAlphaNumDots( $attribute, $value ) {

        return preg_match( "/^[A-Za-z0-9\.]+$/", $value );
    }
}
