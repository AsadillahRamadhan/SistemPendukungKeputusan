<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectreCriteriasTable extends Migration
{
    public function up()
    {
        Schema::create('electre_criterias', function (Blueprint $table) {
            $table->id('id_criteria');
            $table->string('criteria', 100);
            $table->float('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('electre_criterias');
    }
};

