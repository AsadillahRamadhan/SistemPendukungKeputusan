<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectreAlternativesTable extends Migration
{
    public function up()
    {
        Schema::create('electre_alternatives', function (Blueprint $table) {
            $table->id('id_alternative');
            $table->string('name', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('electre_alternatives');
    }
}

