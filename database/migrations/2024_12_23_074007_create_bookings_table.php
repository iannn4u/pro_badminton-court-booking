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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id("id_booking");
            $table->unsignedBigInteger("id_pelanggan")->nullable();
            $table->string("name_booking");
            $table->string("name_made_booking");
            $table->date("date_booking");
            $table->string("court_booking");
            $table->string("time_booking");
            $table->string("price_booking");
            $table->integer("status_delete_booking")->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
