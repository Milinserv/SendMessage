<?php

namespace App\Services;

use App\Data\ClientData;
use App\Models\Guest;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MailingProcessing extends Service
{
    public string $urlNowMessage = 'https://smsc.ru/sys/send.php?';
    public string $urlForPlanMailing = 'https://smsc.ru/sys/jobs.php?add=1';
    public function makeMailing($props): string
    {
        $name = $props['mailingName'];
        $text = $props['mailingText'];
        $res = '';

        $time = $props['period'] === 'regularly' ? str_replace([':'], '', $props['periodTime']['time']) : '';
        $frequency = $props['period'] === 'regularly' ? $props['periodTime']['frequency'] : '';

        foreach ($props['clients'] as $clientId) {
            $client = Guest::where('id', $clientId)->first();

            $birthday = DateTime::createFromFormat('Y-m-d', $client->birthday);
            $birthday->sub(new DateInterval('P7D'));
            $date = str_replace(['-'], '', $birthday->format('Y-m-d'));

            $phones = $client->tel;

            $res = $props['period'] === 'regularly'
                ? $this->planMakeMailing($name, $text, $date, $time, $frequency, $phones)
                : $this->nowMakeMailing($text, $phones);
        }
        return $res;
    }

    private function nowMakeMailing($text, $phones)
    {
        return Http::get($this->urlNowMessage
            . '&login=' . env('SMSC_LOGIN')
            . '&psw='. env('SMSC_PASSWORD')
            . '&phones=' . $phones
            . '&mes=' . $text
        )->status();
    }

    private function planMakeMailing($name, $text, $date, $time, $frequency, $phone)
    {
        return Http::get($this->urlForPlanMailing
            . '&login=' . env('SMSC_LOGIN')
            . '&psw='. env('SMSC_PASSWORD')
            . '&name=' . $name
            . '&phones=' . $phone
            . '&mes=' . $text
            . '&time=' . $date . $time . ',0,0'
            . '&rpt=' . $frequency
            . '&tz=0'
        )->status();

    }
}

