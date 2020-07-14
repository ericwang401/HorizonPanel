<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewayCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateway_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();

            $table->foreign('payment_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gateway_credentials');
    }
}
