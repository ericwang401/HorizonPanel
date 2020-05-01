<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->string('subscription_type', '60');
            $table->unsignedDecimal('overdue_amount')->default('0');
            $table->timestamp('last_payment')->nullable();
            $table->timestamps();

            $table->foreign(['user_id', 'package_id'])
                ->references(['id', 'id'])
                ->on(['users', 'packages'])
                ->onDelete(['cascade', 'cascade']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
