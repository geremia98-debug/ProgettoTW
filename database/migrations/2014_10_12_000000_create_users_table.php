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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->timestamps();

            $table->string('username');
            $table->string('password');
            $table->enum('role', ['client', 'staff', 'admin'])->default('client');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('residence');
            $table->date('birthdate');
            $table->enum('job', ['Cassiere di supermercato','Infermiere ospedaliero','Muratore edile','Insegnante elementare','Cuoco ristorante','Camionista','Segretario amministrativo','Addetto alle risorse umane','Elettricista','Commesso di negozio','Disoccupato','Altro']);
            
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
