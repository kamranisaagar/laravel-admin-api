<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Helpers\CountryHelper;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function index()
    {
        return CountryHelper::$countryList;
    }
}
