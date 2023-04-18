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
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable()->comment('много постов может принадлежать одной категории');
            $table->timestamps();

            // индексируем поле
            $table->index('category_id','post_category_idx');

            // создаём внешний ключ, указываем что category_id, будет связывать эту таблицу с таблицей "categories"
            // связываем таблицы на уровне базы
            $table->foreign('category_id','post_category_fk')->on('categories')->references('id');
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
