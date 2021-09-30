<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMfvehiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfvehi', function (Blueprint $table) {
            $table->bigIncrements('vmvehid')->primary()->unique();
            $table->string('vmvnum',10)->nullable();
            $table->string('vmdesc',40)->nullable();
            $table->string('vmsernum',40)->nullable();
            $table->string('vmplate',20)->nullable();
            $table->string('vmpltype',10)->nullable();
            $table->string('vmennum',40)->nullable();
            $table->string('vmbrand',30)->nullable();
            $table->string('vmvown',10)->nullable();
            $table->string('vmbrun',10)->nullable();
            $table->string('vmmfyr',4)->nullable();
            $table->string('vmaqyr',4)->nullable();
            $table->string('vmvtyp',10)->nullable();
            $table->string('vmhanac',10)->nullable();
            $table->string('vmwuom',3)->nullable();
            $table->decimal('vmeweight',15,3)->nullable();
            $table->decimal('vmcweight',15,3)->nullable();
            $table->string('vmvuom',3)->nullable();
            $table->decimal('vmcvolume',15,3)->nullable();
            $table->string('vmpuom',3)->nullable();
            $table->decimal('vmcpiece',15,3)->nullable();
            $table->string('vmdpool',10)->nullable();
            $table->string('vmdcarrier',10)->nullable();
            $table->string('vmouts',3)->nullable();
            $table->decimal('vmtaxrate',15,3)->nullable(); 
            $table->datetime('vmexpd1')->nullable();
            $table->datetime('vmexpd2')->nullable();
            $table->datetime('vmexpd3')->nullable();
            $table->string('vmcrby',10)->nullable();
            $table->string('vmedby',10)->nullable();
            $table->string('vmdeBy',10)->nullable();
            $table->string('vmdefl',2)->nullable();
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
        Schema::dropIfExists('mfvehi');
    }
}
