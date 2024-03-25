<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    /**
     * up
     * Crear la taula dels articles amb el titol, la descripció
     * i una foreign key que fa referencia als ids dels usuaris
     * @return void
     */
    public function up(): void
    {
        Schema::create('projectes', function (Blueprint $table) {
            $table->id();
            $table->string('titol');
            $table->text('descripcio');
            $table->unsignedBigInteger('id_usuari')->nullable();
            $table->timestamps();

            $table->foreign('id_usuari')->references('id')->on('users');
        });
        DB::table('projectes')->insert([
            ['titol' => 'P1', 'descripcio' => "Projecte 1"],
            ['titol' => 'P2', 'descripcio' => "Projecte 2"],
            ['titol' => 'P3', 'descripcio' => "Projecte 3"],
            ['titol' => 'P4', 'descripcio' => "Projecte 4"],
            ['titol' => 'P5', 'descripcio' => "Projecte 5"],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projectes');
    }
};
