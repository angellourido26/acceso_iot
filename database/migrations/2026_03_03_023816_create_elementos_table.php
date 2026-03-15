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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);

            $table->foreignId('tipo_id')->nullable()->constrained('tipos_elemento')->onDelete('set null');
            $table->foreignId('ambiente_id')->nullable()->constrained('ambientes')->onDelete('set null');

            $table->string('estado', 30)->nullable();
            $table->string('serial_placa_sena', 30);

            $table->timestamps();
            $table->timestamp('disable_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('disable_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
