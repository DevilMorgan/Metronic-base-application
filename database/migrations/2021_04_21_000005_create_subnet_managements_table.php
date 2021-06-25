<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubnetManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('subnet_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subnet_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
