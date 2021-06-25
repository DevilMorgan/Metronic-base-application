<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('sube_name')->nullable();
            $table->string('nas_prefix')->nullable();
            $table->string('ip_block_prfeix')->nullable();
            $table->string('ticket_prefix')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
