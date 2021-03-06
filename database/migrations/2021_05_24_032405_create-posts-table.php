<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->index()->nullable();
            $table->string('slug')->unique()->index()->nullable();
            $table->string('title')->index();
            $table->text('summary');
            $table->text('body');
            $table->string('primary_image')->default('/img/lightbulb.png');
            $table->boolean('active')->default(0);
            $table->datetime('published_at')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
