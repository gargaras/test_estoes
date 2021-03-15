<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_info');
            $table->text('description');
            $table->bigInteger('fk_idproject_manager')->unsigned()->comment('Team leader');
            $table->bigInteger('fk_idassigned_to')->unsigned()->comment('Dev');
            $table->bigInteger('fk_idstatus')->unsigned()->comment('Status Project');
/*
            $table->foreign('fk_idproject_manager')->references('id')->on('managers');
            $table->foreign('fk_idassigned_to')->references('id')->on('employes');
            $table->foreign('fk_idstatus')->references('id')->on('project_status');
*/
            $table->timestamps('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
