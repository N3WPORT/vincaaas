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
        Schema::create('mothers', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Engine
            |--------------------------------------------------------------------------
            */

            $table->engine = 'InnoDB';

            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relasi ke users
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('user_id')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Data pribadi ibu
            |--------------------------------------------------------------------------
            */

            $table->string('nik')
                ->unique();

            $table->string('name');

            $table->string('phone')
                ->nullable();

            $table->string('email')
                ->nullable();

            $table->date('birth_date')
                ->nullable();

            $table->enum('blood_type', [
                'A',
                'B',
                'AB',
                'O'
            ])->nullable();

            /*
            |--------------------------------------------------------------------------
            | Alamat
            |--------------------------------------------------------------------------
            */

            $table->text('address')
                ->nullable();

            $table->string('village')
                ->nullable();

            $table->string('district')
                ->nullable();

            $table->string('city')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Data kesehatan
            |--------------------------------------------------------------------------
            */

            $table->decimal('height', 5, 2)
                ->nullable();

            $table->decimal('weight', 5, 2)
                ->nullable();

            $table->text('medical_history')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_pregnant')
                ->default(false);

            $table->boolean('is_active')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Foreign Key
            |--------------------------------------------------------------------------
            */

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};