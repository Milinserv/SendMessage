<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sms_campaign_records', function (Blueprint $table) {
            $table->id();
            $table->string('mailing_name');
            $table->text('mailing_text');
            $table->string('recipient_id');
            $table->string('mailing_period');
            $table->json('mailing_period_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_campaign_records');
    }
};
