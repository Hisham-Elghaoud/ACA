<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateYearlyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearly_reports', function (Blueprint $table) {
            $table->string('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('name');
            $table->string('year');
            $table->string('report_num');
            $table->string('date')->nullable();
            $table->string('summary')->nullable();
            $table->string('path');
            $table->string('state')->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yearly_reports');
    }
}
