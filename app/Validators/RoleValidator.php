<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RoleValidatorValidator.
 *
 * @package namespace App\Validators;
 */
class RoleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'name' => 'required|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'name' => 'required|max:255'
        ],
    ];
}
