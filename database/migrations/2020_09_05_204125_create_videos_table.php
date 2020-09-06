<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 600)->nullable();
            $table->string('sub_title')->nullable();
            $table->string('image')->nullable();
            $table->string('director')->nullable();
            $table->string('details')->nullable();
            $table->string('kind_movie')->nullable();
            $table->string('release_city')->nullable();
            $table->string('release_year')->nullable();
            $table->string('length_time_show')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_link_kind')->default('youtube');
            $table->string('video_link_id')->nullable();
            $table->dateTime('show_available_at')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
