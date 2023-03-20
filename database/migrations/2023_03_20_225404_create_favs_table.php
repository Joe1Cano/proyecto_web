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
        Schema::create('favs', function (Blueprint $table) {
            $table->id();
            $table->string("nombre",50);
            $table->string("autor",50);
            $table->string("archivo_au",300);
            $table->string("foto",300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favs');
    }
};
