<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'name' => 'required|max:255',
          'surname' => 'max:255',
          'email' => 'required|unique:users,email|max:255|email',
          'birth_date' => 'date|date_format:Y-m-d|before:tomorrow',
          'background_image' => 'image',
          'password' => 'required|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'name' => 'max:255',
          'surname' => 'max:255',
          'email' => 'unique:users,email|max:255|email',
          'birth_date' => 'date|date_format:Y-m-d|before:tomorrow',
          'background_image' => 'image',
          'password' => 'max:255'
        ],
    ];
}
