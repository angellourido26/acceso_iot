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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 70);
            $table->string('correo', 100)->unique();
            $table->text('password_hash');
            $table->string('tipo_documento', 50);
            $table->string('numero_documento', 11);
            $table->boolean('estado')->default(1);
            $table->string('telefono', 20);
            $table->rememberToken();

            $table->foreignId('rol_id')->nullable()->constrained('roles')->onDelete('set null');
            $table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('set null');

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
        Schema::dropIfExists('usuarios');
    }
};
