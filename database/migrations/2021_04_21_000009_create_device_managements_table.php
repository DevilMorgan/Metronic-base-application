<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('device_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ap_mikrotik_default_username')->nullable();
            $table->string('ap_mikrotik_default_password')->nullable();
            $table->string('mikrotik_api_default_port')->nullable();
            $table->string('ap_mikrotik_default_ssh')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
