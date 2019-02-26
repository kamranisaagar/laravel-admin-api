<?php
namespace App\Transformer;

use App\Models\Event;
use League\Fractal;
use App\Helpers\CountryHelper;

class EventTransformer extends Fractal\TransformerAbstract
{
    public function transform(Event $event)
    {
        return [
            'id' => $event->id,
            'name' => $event->name,
            'plan_date' => $event->plan_date,
            'country_code' => $event->country_code,
            'country' => CountryHelper::getCountryName($event->country_code),
        ];
    }
}
