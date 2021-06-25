<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolManagementRadiusTable extends Migration
{
    public function up()
    {
        Schema::create('pool_management_radius', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('radius_pool_name')->nullable();
            $table->string('ip_ranges')->nullable();
            $table->string('ip_radius_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
