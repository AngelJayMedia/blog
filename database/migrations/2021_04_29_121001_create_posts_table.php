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
            $table->string('cover_image');
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->text('meta_description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(0);

            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

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
