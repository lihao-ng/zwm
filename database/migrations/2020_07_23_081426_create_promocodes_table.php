<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->integer('offer_id');
            $table->integer('transaction_item_id');
            $table->string('code')->unique();
            $table->boolean('redeemed')->default(false);
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
        Schema::dropIfExists('promocodes');
    }
}
