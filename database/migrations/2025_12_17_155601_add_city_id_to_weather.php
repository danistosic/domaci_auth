<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            // 1) uklanjamo stari stupac "city"
            $table->dropColumn('city');

            // 2) dodajemo novi stupac city_id
            $table->unsignedBigInteger('city_id');

            // 3) foreign key -> cities.id
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
        });
    }

    public function down(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->string('city');
        });
    }
};
