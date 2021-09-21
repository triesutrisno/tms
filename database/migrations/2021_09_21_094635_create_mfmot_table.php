<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfmotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfmot', function (Blueprint $table) {
            $table->string('mtmot',10)->primary()->unique();
            $table->string('mtdesc',40)->nullable();
            $table->string('mtcrby',10)->nullable();
            $table->string('mtedby',10)->nullable();
            $table->string('mtdeBy',10)->nullable();
            $table->string('mtdefl',2)->nullable();
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
        Schema::dropIfExists('mfmot');
    }
}
