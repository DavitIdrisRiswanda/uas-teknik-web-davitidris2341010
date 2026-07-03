<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('receiver_name')->after('buyer_id');

            $table->string('receiver_phone')->after('receiver_name');

            $table->text('receiver_address')->after('receiver_phone');

            $table->string('city')->after('receiver_address');

            $table->string('province')->after('city');

            $table->string('postal_code')->after('province');

            $table->string('shipping_method')->after('postal_code');

            $table->integer('shipping_cost')->default(0);

            $table->string('payment_method')->after('shipping_cost');

            $table->text('notes')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([

                'receiver_name',
                'receiver_phone',
                'receiver_address',
                'city',
                'province',
                'postal_code',
                'shipping_method',
                'shipping_cost',
                'payment_method',
                'notes'

            ]);

        });
    }
};