<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoolManagementRadiusTable extends Migration
{
    public function up()
    {
        Schema::table('pool_management_radius', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3694125')->references('id')->on('teams');
            $table->unsignedBigInteger('radius_ip_nas_id')->nullable();
            $table->foreign('radius_ip_nas_id', 'radius_ip_nas_fk_3728785')->references('id')->on('nas_managers');
        });
    }
}
