<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfstafldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfstafld', function (Blueprint $table) {
            $table->string('slstcode',10)->primary();
            $table->string('sllictype',10)->nullable();
            $table->datetime('sleffd')->nullable();
            $table->datetime('slexpd')->nullable();
            $table->datetime('slward')->nullable();
            $table->boolean('slisman')->nullable();
            $table->string('slagency',10)->nullable();
            $table->string('sldesc',40)->nullable();
            $table->string('slcrby',10)->nullable();
            $table->string('sledby',10)->nullable();
            $table->string('sldeBy',10)->nullable();
            $table->string('sldefl',2)->nullable();
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
        Schema::dropIfExists('mfstafld');
    }
}
