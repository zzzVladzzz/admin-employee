<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->integer('phone');
            $table->string('address', 255);
            $table->timestamp('contract_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->time('contract_expiration_date');
            $table->string('file_contract',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
