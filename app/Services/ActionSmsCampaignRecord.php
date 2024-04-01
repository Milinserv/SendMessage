<?php

namespace App\Services;

use App\Data\ClientData;
use App\Models\Guest;
use App\Models\SmsCampaignRecord;
use Carbon\Carbon;
use DateTime;
use Psy\Util\Json;

class ActionSmsCampaignRecord extends Service
{
    public function make($request)
    {
        $name = $request->mailingName;
        $clients = ($request->selectAllRecipient === true)
            ? ClientData::collect(Guest::all())->pluck('id')
            : array_map(function ($el) {
                return $el['id'];
            }, $request->clientsForMailing);
        $text = $request->mailingText;
        $period = $request->selectedPeriod;

        $time = Carbon::create($request->regularity['selectedTime'])->format('h:i');
        $periodTime = ($request->selectedPeriod === 'regularly') ? [
            'frequency' => $request->regularity['frequency']['name'],
            'time' => $time
        ] : null;

        SmsCampaignRecord::create([
            'mailing_name' => $name,
            'mailing_text' => $text,
            'recipient_id' => ($request->selectAllRecipient === true)
                ? $clients
                : implode(', ', $clients),
            'mailing_period' => $period,
            'mailing_period_time' => json_encode($periodTime)
        ]);

        return [
            'mailingName' => $name,
            'mailingText' => $text,
            'clients' => $clients,
            'period' => $period,
            'periodTime' => $periodTime
        ];
    }
}
