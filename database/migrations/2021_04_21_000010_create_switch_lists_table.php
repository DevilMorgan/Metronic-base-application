<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchListsTable extends Migration
{
    public function up()
    {
        Schema::create('switch_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('switch_name')->nullable();
            $table->string('switch_ip_address')->nullable();
            $table->string('switch_marka')->nullable();
            $table->string('switch_port_sayisi')->nullable();
            $table->string('switch_status')->nullable();
            $table->boolean('switch_api_izin')->default(0)->nullable();
            $table->string('switch_notlar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
