<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMazadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mazads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->double('minprice');
            $table->date('starttime');
            $table->date('endtime');
            $table->string('published');
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
        Schema::dropIfExists('mazads');
    }
}
