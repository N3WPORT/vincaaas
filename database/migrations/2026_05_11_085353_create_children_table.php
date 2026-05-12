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
        Schema::create('children', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel mothers
            $table->foreignId('mother_id')
                ->constrained()
                ->onDelete('cascade');

            // Data anak
            $table->string('nik')->nullable()->unique();

            $table->string('name');

            $table->enum('gender', [
                'L',
                'P'
            ]);

            $table->date('birth_date');

            // Data lahir
            $table->decimal('birth_weight', 5, 2)
                ->nullable();

            $table->decimal('birth_height', 5, 2)
                ->nullable();

            // Informasi tambahan
            $table->string('blood_type')
                ->nullable();

            $table->text('notes')
                ->nullable();

            // Status
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};