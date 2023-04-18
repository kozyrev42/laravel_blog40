<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            // инднексируем поля
            // 'post_id' - поле которое индексируем
            // 'post_tag_post_index' - наименование индекса
            $table->index('post_id','post_tag_post_index');
            $table->index('tag_id','post_tag_tag_index');

            // связываем поле с таблицей
            $table->foreign('post_id','post_tag_post_fk')->on('posts')->references('id');
            $table->foreign('tag_id','post_tag_tag_fk')->on('tags')->references('id');

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
        Schema::dropIfExists('post_tags');
    }
}
