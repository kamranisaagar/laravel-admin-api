<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Helpers\CountryHelper;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function getCustomersCountriesStatistics()
    {
        $items = DB::table('users')
            ->select(DB::raw('count(*) as total, country_code'))
            ->whereNotNull('country_code')
            ->groupBy('country_code')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        $data = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => '# of Customers',
                    'data' => [],
                    'backgroundColor' => '#f87979'
                ]
            ]
        ];

        foreach ($items as $item) {
            $data['labels'][] = CountryHelper::getCountryName($item->country_code);
            $data['datasets'][0]['data'][] = $item->total;
        }

        return $data;
    }
}
