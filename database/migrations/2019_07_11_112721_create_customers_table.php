<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->Biginteger('franchisee_id')->unsigned();
            $table->foreign('franchisee_id')->references('id')->on('franchisees')->onDelete('cascade');
            $table->string('name');
            $table->Biginteger('contact');
            $table->string('email');
            $table->string('address');
            $table->string('remark');
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
        Schema::dropIfExists('customers');
    }
}
