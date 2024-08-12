<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Gender;
use App\Enums\Specie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', Gender::values());
            $table->enum('specie', Specie::values());
            $table->string('race');
            $table->float('height', 8, 2)->nullable();
            $table->float('weight', 8, 2)->nullable();
            $table->boolean('castrated')->default(false);
            $table->date('birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
