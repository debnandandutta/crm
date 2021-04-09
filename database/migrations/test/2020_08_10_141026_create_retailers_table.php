<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('address');
            $table->string('mobile');
            $table->string('region');
            $table->string('area');
            $table->string('territory');
            $table->string('town');
            $table->integer('status')->default(1)->comment('0 => InActive, 1=> Active');
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
        Schema::dropIfExists('retailers');
    }
}
