<?php

namespace Modules\Platform\Auth\Domain\Contracts;

use Modules\Platform\Auth\Domain\Entities\RefreshToken;
use Modules\Platform\Auth\Domain\Entities\User;

interface TokenIssuer
{
    public function issue(User $user): array;
    public function issueRefreshToken(User $user): RefreshToken;
    public function issueAccessToken(User $user): string;
}
