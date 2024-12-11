<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2); // Price of the subscription
            $table->enum('duration', ['1_week', '1_month', '6_months'])->default('1_month'); // Subscription duration
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active'); // Subscription status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
