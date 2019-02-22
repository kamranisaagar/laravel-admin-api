<?php
namespace App\Transformer;

use App\Models\User;
use League\Fractal;

class UserDetailTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
            'company' => $user->company,
            'country_code' => $user->country_code,
            'country' => $user->country,
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->map(function($permission) {
                return $permission->name;
            })
        ];
    }
}
