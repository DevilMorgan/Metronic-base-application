<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasManagersTable extends Migration
{
    public function up()
    {
        Schema::create('nas_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nas_name');
            $table->string('nas_username')->nullable();
            $table->string('nas_password')->nullable();
            $table->string('nas_marka_model')->nullable();
            $table->string('mikrotik_api_version')->nullable();
            $table->integer('nas_ssh_port')->nullable();
            $table->integer('nas_api_port')->nullable();
            $table->boolean('nas_permission_yonet')->default(0)->nullable();
            $table->string('nas_status')->nullable();
            $table->boolean('ap_monitor')->default(0)->nullable();
            $table->string('auto_backup')->nullable();
            $table->string('nas_ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
