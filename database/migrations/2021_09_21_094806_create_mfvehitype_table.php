<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfvehitypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfvehitype', function (Blueprint $table) {
            $table->string('vtvtyp',10)->primary()->unique();
            $table->string('vtdesc',50)->nullable();
            $table->string('vtmot',10)->nullable();
            $table->string('vtwuom',3)->nullable();
            $table->decimal('vteweight',15,3)->nullable();
            $table->decimal('vtcweight',15,3)->nullable();
            $table->string('vtvuom',3)->nullable();
            $table->decimal('vtcvolume',15,3)->nullable();
            $table->string('vtpuom',3)->nullable();
            $table->decimal('vtcpiece',15,3)->nullable();
            $table->smallInteger('vtnaxl')->nullable();
            $table->string('vtcrby',10)->nullable();
            $table->string('vtedby',10)->nullable();
            $table->string('vtdeBy',10)->nullable();
            $table->string('vtdefl',2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mfvehitype');
    }
}
