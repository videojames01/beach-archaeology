<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    public function up()
    {


        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->text('picture')->nullable();
            $table->string('gps_location');
            $table->timestamp('date_time');
            $table->boolean('donate')->default(false);
            $table->text('extra_remarks')->nullable();
            $table->float('weight')->nullable();
            $table->string('measurements')->nullable();
            $table->string('material')->nullable();
            $table->string('timeperiod')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
