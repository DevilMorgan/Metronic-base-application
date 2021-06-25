<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNasManagersTable extends Migration
{
    public function up()
    {
        Schema::table('nas_managers', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3695096')->references('id')->on('teams');
            $table->unsignedBigInteger('nas_sube_id')->nullable();
            $table->foreign('nas_sube_id', 'nas_sube_fk_3695384')->references('id')->on('teams');
        });
    }
}
