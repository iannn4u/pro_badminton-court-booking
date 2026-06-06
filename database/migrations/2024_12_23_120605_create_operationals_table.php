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
        Schema::create('operationals', function (Blueprint $table) {
            $table->id("id_operational");
            $table->string("name_biodata");
            $table->string("address_biodata");
            $table->string("link_address_biodata");
            $table->string("wa_biodata");
            $table->string("link_wa_biodata");
            $table->json("photos_place")->nullable();
            $table->boolean("preview1")->default(1);
            $table->boolean("preview2")->default(1);
            $table->string("time_open");
            $table->string("time_close");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operationals');
    }
};
