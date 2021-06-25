<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('station_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station_name')->nullable();
            $table->string('station_status');
            $table->float('avarage_ping_1_day', 7, 3)->nullable();
            $table->string('last_ping')->nullable();
            $table->string('monitor_status')->nullable();
            $table->string('station_connection_type')->nullable();
            $table->string('station_port_speed')->nullable();
            $table->string('station_capacity_speed')->nullable();
            $table->integer('station_max_ap')->nullable();
            $table->integer('station_max_cpe')->nullable();
            $table->integer('station_max_pppoe')->nullable();
            $table->string('station_device_type')->nullable();
            $table->integer('station_switch_port_number')->nullable();
            $table->string('station_maps_latitude')->nullable();
            $table->string('station_maps_longitude')->nullable();
            $table->date('station_installation')->nullable();
            $table->string('station_contact_person')->nullable();
            $table->integer('station_contact_phone')->nullable();
            $table->string('station_alici_ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
