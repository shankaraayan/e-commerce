<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gatways', function (Blueprint $table) {
            $table->id();
            $table->string('mode')->default('sandbox');
            $table->string('app_name')->nullable();
            $table->string('app_id')->nullable();
            $table->string('PAYPAL_CURRENCY')->nullable();
            $table->string('API_USERNAME')->nullable();
            $table->string('API_PASSWORD')->nullable();
            $table->string('API_SECRET')->nullable();
            $table->string('API_KEY')->nullable();
            $table->string('PAYPAL_API_CERTIFICATE')->nullable();
            $table->string('PAYPAL_SUCCESS_URL')->nullable();
            $table->string('PAYPAL_FAILED_URL')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gatways');
    }
}
