<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsCampaignRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'mailing_name',
        'mailing_text',
        'recipient_id',
        'mailing_period',
        'mailing_period_time'
    ];
}
