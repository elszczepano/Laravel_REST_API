<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CommentValidator.
 *
 * @package namespace App\Validators;
 */
class CommentValidator extends LaravelValidator
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
          'post_id' => 'required|exists:posts,id|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'content' => 'required',
          'user_id' => 'exists:users,id|integer',
          'post_id' => 'exists:posts,id|integer'
        ],
    ];
}
