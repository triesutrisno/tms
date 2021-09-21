<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfvehildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfvehild', function (Blueprint $table) {
            $table->string('vlvehid',10)->primary();
            $table->string('vllictype',10)->nullable();
            $table->datetime('vleffd')->nullable();
            $table->datetime('vlexpd')->nullable();
            $table->datetime('vlward')->nullable();
            $table->boolean('vlisman')->nullable();
            $table->string('vlagency',10)->nullable();
            $table->string('vldesc',40)->nullable();
            $table->string('vlcrby',10)->nullable();
            $table->string('vledby',10)->nullable();
            $table->string('vldeBy',10)->nullable();
            $table->string('vldefl',2)->nullable();
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
        Schema::dropIfExists('mfvehild');
    }
}
