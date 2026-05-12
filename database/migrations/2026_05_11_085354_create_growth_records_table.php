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
        Schema::create('growth_records', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relasi ke Anak
            |--------------------------------------------------------------------------
            */

            $table->foreignId('child_id')
                ->constrained()
                ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | Data Pertumbuhan
            |--------------------------------------------------------------------------
            */

            $table->decimal('weight', 5, 2);

            $table->decimal('height', 5, 2);

            $table->date('measurement_date');

            $table->text('notes')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Timestamp
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('growth_records');
    }
};