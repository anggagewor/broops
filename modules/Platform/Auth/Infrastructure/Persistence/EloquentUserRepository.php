<?php

namespace Modules\Platform\Auth\Infrastructure\Persistence;

use App\Models\User as UserModel;
use Modules\Platform\Auth\Domain\Contracts\UserRepository;
use Modules\Platform\Auth\Domain\Entities\User;

class EloquentUserRepository implements UserRepository
{
    public function findByEmail(string $email): ?User
    {
        $model = UserModel::where('email', $email)->first();

        return $model ? $this->mapToDomain($model) : null;
    }

    public function create(string $email, string $passwordHash, string $name): User
    {
        $model = UserModel::create([
            'email' => $email,
            'password' => $passwordHash,
            'name' => $name,
            'is_active' => true,
        ]);

        return $this->mapToDomain($model);
    }

    public function findById(int $id): ?User
    {
        $model = UserModel::find($id);

        return $model ? $this->mapToDomain($model) : null;
    }

    private function mapToDomain(UserModel $model): User
    {
        return new User(
            id: $model->id,
            email: $model->email,
            passwordHash: $model->password,
            name: $model->name,
            isActive: (bool) $model->is_active
        );
    }


}
