<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectreEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('electre_evaluations', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_alternative');
            $table->unsignedTinyInteger('id_criteria');
            $table->float('value');
            $table->primary(['id_alternative', 'id_criteria']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('electre_evaluations');
    }
}

