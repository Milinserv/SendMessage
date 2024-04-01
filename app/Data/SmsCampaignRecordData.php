<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\RequiredIf;
use Spatie\LaravelData\Data;

class SmsCampaignRecordData extends Data
{
    public function __construct(
        public $mailingName,
        public $mailingText,
        #[RequiredIf('selectAllRecipient', 'false')]
        public $clientsForMailing,
        #[RequiredIf('clientsForMailing', 'null')]
        public $selectAllRecipient,
        public $selectedPeriod,
        #[RequiredIf('selectedPeriod', 'regularly')]
        public $regularity
    )
    {
    }

    public static function rules(): array
    {
        return [
            'mailingName' => ['required'],
            'mailingText' => ['required'],
            'selectedPeriod' => ['required'],
        ];
    }

    public static function messages(): array
    {
        return [
            'mailing_name.required' => 'Поле Название рассылки обязательно для заполнения',
            'mailing_text.required' => 'Поле Текст рассылки обязательно для заполнения',
            'mailing_period.required' => 'Поле Запустить рассылку обязательно для заполнения',
        ];
    }
}
