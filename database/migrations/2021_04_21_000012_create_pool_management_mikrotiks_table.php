<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolManagementMikrotiksTable extends Migration
{
    public function up()
    {
        Schema::create('pool_management_mikrotiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mikrotik_pool_name')->nullable();
            $table->string('mikrotik_pool_range')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
