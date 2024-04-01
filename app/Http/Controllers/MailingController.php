<?php

namespace App\Http\Controllers;

use App\Data\SmsCampaignRecordData;
use App\Services\ActionSmsCampaignRecord;
use App\Services\MailingProcessing;
use Inertia\Inertia;

class MailingController extends Controller
{
    public function store(SmsCampaignRecordData $request,
                          ActionSmsCampaignRecord $serviceAddMailingEntry,
                          MailingProcessing $serviceSendMailing)
    {
        $mailingAttributes = $serviceAddMailingEntry->make($request);

        $stateCode = $serviceSendMailing->makeMailing($mailingAttributes);

        return Inertia::render('mailings', ['state' => $stateCode]);
    }
}
