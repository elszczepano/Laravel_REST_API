<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserGroupsValidator.
 *
 * @package namespace App\Validators;
 */
class UserGroupsValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'user_id' => 'required|exists:users,id|integer',
          'group_id' => 'required|exists:groups,id|integer',
          'role_id' => 'exists:roles,id|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'user_id' => 'exists:users,id|integer',
          'group_id' => 'exists:groups,id|integer',
          'role_id' => 'exists:roles,id|integer'
        ],
    ];
}
