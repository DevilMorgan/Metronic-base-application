<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoolManagementMikrotiksTable extends Migration
{
    public function up()
    {
        Schema::table('pool_management_mikrotiks', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3694290')->references('id')->on('teams');
        });
    }
}
