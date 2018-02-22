<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class VoteValidator.
 *
 * @package namespace App\Validators;
 */
class VoteValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'user_id' => 'required|boolean|exists:users,id',
          'post_id' => 'required|exists:posts,id',
          'voted' => 'required|boolean'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'user_id' => 'exists:users,id',
          'post_id' => 'exists:posts,id',
          'voted' => 'required|boolean'
        ],
    ];
}
