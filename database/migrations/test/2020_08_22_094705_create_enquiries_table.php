<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->string('enquiry_id')->unique();
            $table->string('title');
            $table->string('shop');
            $table->string('mobileOne');
            $table->string('mobileTwo');
            $table->string('address');
            $table->integer('region');
            $table->integer('area');
            $table->integer('territory');
            $table->integer('town');
            $table->timestamp('expiry');
            $table->integer('tm');
            $table->text('description');
            $table->integer('callType');
            $table->integer('complainType');
            $table->string('storeType');
            $table->string('dsr_name');
            $table->boolean('preferrence');
            $table->string('status');
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
        Schema::dropIfExists('enquiries');
    }
}
