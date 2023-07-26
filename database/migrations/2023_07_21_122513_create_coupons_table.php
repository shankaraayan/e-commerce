<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('appliable_on')->nullable();
            $table->string('price')->nullable();
            $table->text('applicable_country')->nullable();
            $table->string('user_limit_use')->default(0);
            $table->string('specific_user')->default(0);
            $table->text('user_id')->nullable();
            $table->string('limit_use')->default(0);
            $table->timestamp('expiry_date')->nullable();
            $table->string('min_order')->nullable();
            $table->text('exclude_category')->nullable();
            $table->text('exclude_product')->nullable();
            $table->string('status')->default(1);
            $table->string('used')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
}
