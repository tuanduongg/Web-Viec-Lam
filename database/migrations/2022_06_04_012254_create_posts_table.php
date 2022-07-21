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
            $table->string('job_tittle');
            $table->string('city');
            $table->boolean('remote')->nullable();
            $table->boolean('parttime')->nullable();
            $table->integer('salary');
            $table->string('language');
            $table->text('description');
            $table->integer('number_applicants');
            $table->smallInteger('status')->default(2);
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('posts');
    }
}
