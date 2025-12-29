<?php

namespace Modules\Platform\Auth\Application\Errors;

class AuthError
{
    public const INVALID_CREDENTIALS = 'AUTH_INVALID_CREDENTIALS';
    public const USER_INACTIVE = 'AUTH_USER_INACTIVE';
    public const EMAIL_ALREADY_EXISTS = 'AUTH_EMAIL_ALREADY_EXISTS';
    public const REFRESH_TOKEN_INVALID = 'REFRESH_TOKEN_INVALID';
    public const REFRESH_TOKEN_EXPIRED = 'REFRESH_TOKEN_EXPIRED';
}
