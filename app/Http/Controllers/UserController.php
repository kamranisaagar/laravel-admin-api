<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformer\UserTransformer;
use App\Transformer\UserDetailTransformer;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'permission:access-customers']);
    }

    public function index()
    {
        return fractal(User::role('customer')->get(), new UserTransformer())->respond();
    }

    public function show(User $user)
    {
        return fractal($user, new UserDetailTransformer())->toArray();
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->save();
        return fractal($user, new UserDetailTransformer())->toArray();
    }
}
