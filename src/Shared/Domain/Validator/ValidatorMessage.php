<?php

declare(strict_types=1);

namespace App\Shared\Domain\Validator;

class ValidatorMessage
{
    public const INVALID_MESSAGE = 'validation.invalid_message';
    public const NOT_NULL_CONSTRAINT = 'validation.not_null';
    public const NOT_BLANK_CONSTRAINT = 'validation.not_blank';
    public const STRING_TYPE_CONSTRAINT = 'validation.string_type_constraint';
    public const MIN_LENGTH_CONSTRAINT = 'validation.min_length_constraint';
    public const MAX_LENGTH_CONSTRAINT = 'validation.max_length_constraint';
    public const REPEATED_FIELD_CONSTRAINT = 'validation.repeated_field_constraint';
    public const PASSWORDS_DO_NOT_MATCH = 'validation.passwords_do_not_match';
    public const EMAIL_TYPE_CONSTRAINT = 'validation.email_type_constraint';
    public const VALUE_OBJECT_CONSTRAINT = 'validation.value_object_constraint';
    public const MUST_AGREE_CONSTRAINT = 'validation.must_agree_constraint';
    public const TYPE_CONSTRAINT = 'validation.type_constraint';
    public const IS_TRUE_CONSTRAINT = 'validation.is_true_constraint';
    public const UNIQUE_EMAIL_CONSTRAINT = 'validation.unique_email_constraint';
    public const UNIQUE_USERNAME_CONSTRAINT = 'validation.unique_username_constraint';
    public const NOT_COMPROMISED_PASSWORD_CONSTRAINT = 'validation.not_compromised_password_constraint';
    public const TOO_MANY_LOGIN_ATTEMPTS = 'validation.too_many_login_attempts';
    public const BAD_CREDENTIALS = 'validation.bad_credentials';
    public const SECURE_PASSWORD_CONSTRAINT = 'validation.secure_password_constraint';
    public const INVALID_MARKET = 'validation.invalid_market';
}
