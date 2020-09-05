<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Schema::dropIfExists('video_votes');
        // Schema::table('video_vote', function (Blueprint $table) {
        //     $table->dropColumn('video_id');
        //     $table->dropColumn('user_id');
        //     $table->dropColumn('vote');
        //     $table->dropColumn('video_id')->constrained();
        //     $table->dropColumn('user_id')->constrained();
        // });
        Schema::create('video_votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('vote');
            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('video_votes');
    }
}
