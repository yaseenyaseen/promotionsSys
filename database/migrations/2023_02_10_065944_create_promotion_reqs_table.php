<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_reqs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('promotion')->nullable();// list of 4 elements
            $table->boolean('status')->nullable();// done or not
            $table->integer('Pro_OrderNo')->nullable();
            $table->timestamp('Pro_OrderDate')->nullable();
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
        Schema::dropIfExists('promotion_reqs');
    }
}
