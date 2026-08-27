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
        Schema::create('checkout', function (Blueprint $table) {
           $table->id();

            // ربط المستخدم
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // معلومات الشراء من الفورم
            $table->string('name');
            $table->string('email');
            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
           

            // السعر الإجمالي
            $table->decimal('total_price', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
