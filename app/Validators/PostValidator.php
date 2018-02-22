<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidator.
 *
 * @package namespace App\Validators;
 */
class PostValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'content' => 'required',
          'user_id' => 'required|exists:users,id|integer',
          'group_id' => 'required|exists:groups,id|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'content' => 'required',
          'user_id' => 'exists:users,id|integer',
          'group_id' => 'exists:groups,id|integer'
        ],
    ];
}
