<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // lead_id relation to leads table
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->date('tgl_jatuh_tempo')->nullable();
            $table->string('status_payment')->nullable();
            $table->date('tgl_payment')->nullable();
            // file 1-3 for file upload
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            // progress fu 1-3 for text progres pengerjaan
            $table->string('progress_fu1')->nullable();
            $table->string('progress_fu2')->nullable();
            $table->string('progress_fu3')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
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
