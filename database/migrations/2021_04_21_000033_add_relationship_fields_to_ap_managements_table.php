<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('ap_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3693567')->references('id')->on('teams');
            $table->unsignedBigInteger('ap_station_id')->nullable();
            $table->foreign('ap_station_id', 'ap_station_fk_3695309')->references('id')->on('station_managements');
        });
    }
}
