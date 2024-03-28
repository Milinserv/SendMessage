<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ClientData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $tel,
        public string $email,
        public string $birthday
    )
    {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'email'],
            'birthday' => ['required']
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'Поле ФИО обязательно для заполнения',
            'tel.required' => 'Поле Номер телефона обязательно для заполнения',
            'email.required' => 'Поле Email обязательно для заполнения',
            'email.email' => 'Поле Email должно быть корректным email-адресом',
            'birthday.required' => 'Поле День рождения обязательно для заполнения',
        ];
    }
}
