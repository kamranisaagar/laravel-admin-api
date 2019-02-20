<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformer\UserTransformer;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'permission:access-customers']);
    }

    public function getUsers()
    {
        return fractal(User::role('customer')->get(), new UserTransformer())->respond();
    }
}
