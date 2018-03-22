<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SupportValidator.
 *
 * @package namespace App\Validators;
 */
class SupportValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'content' => 'required',
          'email' => 'required|email',
          'attachment' => 'image'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'email' => 'email',
          'attachment' => 'image'
        ],
    ];
}
