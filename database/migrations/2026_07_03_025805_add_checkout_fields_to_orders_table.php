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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('receiver_name');
$table->string('receiver_phone');
$table->text('receiver_address');

$table->string('city');
$table->string('province');
$table->string('postal_code');

$table->string('shipping_method');
$table->integer('shipping_cost')->default(0);

$table->string('payment_method');

$table->text('notes')->nullable();
        });
    }
};
