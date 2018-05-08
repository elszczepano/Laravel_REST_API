<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class JoinRequestsValidator extends LaravelValidator
{
  protected $rules = [
      ValidatorInterface::RULE_CREATE => [
        'user_id' => 'required|exists:users,id|integer',
        'group_id' => 'required|exists:groups,id|integer'
      ],
      ValidatorInterface::RULE_UPDATE => [
        'user_id' => 'exists:users,id|integer',
        'group_id' => 'exists:groups,id|integer'
      ],
  ];
}
