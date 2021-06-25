<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStationManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('station_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3693566')->references('id')->on('teams');
            $table->unsignedBigInteger('station_nas_id')->nullable();
            $table->foreign('station_nas_id', 'station_nas_fk_3695308')->references('id')->on('nas_managers');
            $table->unsignedBigInteger('station_sube_id')->nullable();
            $table->foreign('station_sube_id', 'station_sube_fk_3695398')->references('id')->on('teams');
        });
    }
}
