<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('ap_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ap_name');
            $table->string('ap_username')->nullable();
            $table->string('ap_password')->nullable();
            $table->string('ap_marka_model')->nullable();
            $table->string('mikrotik_api_version')->nullable();
            $table->integer('ap_ssh_port')->nullable();
            $table->integer('ap_api_port')->nullable();
            $table->boolean('ap_permission_yonet')->default(0)->nullable();
            $table->string('ap_status')->nullable();
            $table->boolean('ap_monitor')->default(0)->nullable();
            $table->float('ap_avarage_1_day', 7, 3)->nullable();
            $table->float('ap_last_ping', 7, 3)->nullable();
            $table->string('ap_port_speed')->nullable();
            $table->integer('last_frequency')->nullable();
            $table->string('auto_backup')->nullable();
            $table->integer('ap_vlan')->nullable();
            $table->integer('ap_max_wlan_register')->nullable();
            $table->integer('ap_max_pppoe')->nullable();
            $table->integer('ap_switch_port_number')->nullable();
            $table->date('ap_installation_date')->nullable();
            $table->string('ap_ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
