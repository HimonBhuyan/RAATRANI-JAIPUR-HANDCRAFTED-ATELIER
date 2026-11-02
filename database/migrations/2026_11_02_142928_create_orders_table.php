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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_pincode');
            $table->string('shipping_country')->default('India');
            $table->string('shipping_method')->default('standard');
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->string('payment_method'); // 'cod', 'upi_card', 'whatsapp'
            $table->string('payment_status')->default('pending'); // 'pending', 'paid'
            $table->string('order_status')->default('pending'); // 'pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->string('coupon_code')->nullable();
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2);
            $table->text('notes')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('courier_partner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
