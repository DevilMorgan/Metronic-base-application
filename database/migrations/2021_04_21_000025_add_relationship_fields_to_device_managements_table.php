<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeviceManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('device_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3693569')->references('id')->on('teams');
        });
    }
}
