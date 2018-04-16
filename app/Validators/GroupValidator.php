<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class GroupValidator.
 *
 * @package namespace App\Validators;
 */
class GroupValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
          'name' => 'required|max:255',
          'background_image' => 'image',
          'icon_id' => 'exists:icons,id|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
          'name' => 'max:255',
          'background_image' => 'image',
          'icon_id' => 'exists:icons,id|integer'
        ],
    ];
}
