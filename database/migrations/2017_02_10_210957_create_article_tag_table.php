<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->on('articles')->references('id');

            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->on('tags')->references('id');
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
        Schema::table('article_tag', function (Blueprint $table) {
            $table->dropForeign('article_tag_article_id_foreign');
            $table->dropForeign('article_tag_tag_id_foreign');
        });

        Schema::dropIfExists('article_tag');
    }
}
