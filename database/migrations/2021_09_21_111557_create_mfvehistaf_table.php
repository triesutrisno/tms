<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfvehistafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfvehistaf', function (Blueprint $table) {
            $table->string('vsstid',10)->primary();
            $table->string('vsvehid',10)->nullable();
            $table->string('vsrole',40)->nullable();
            $table->boolean('vsprim')->nullable();
            $table->boolean('vsactive')->nullable();
            $table->datetime('vseffd')->nullable();
            $table->datetime('vsexpd')->nullable();
            $table->datetime('vsexpd1')->nullable();
            $table->datetime('vsexpd2')->nullable();
            $table->datetime('vsexpd3')->nullable();
            $table->string('vsshift',3)->nullable();
            $table->string('vsbrun',10)->nullable();
            $table->string('vscrby',10)->nullable();
            $table->string('vsedby',10)->nullable();
            $table->string('vsdeBy',10)->nullable();
            $table->string('vsdefl',2)->nullable();
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
        Schema::dropIfExists('mfvehistaf');
    }
}
