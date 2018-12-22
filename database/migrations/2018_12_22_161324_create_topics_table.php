<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',60);
            $table->integer('user_id')->unsigned()->index(); // user = a_user = トピック作成者
//            $table->integer('content_id')->unsigned()->index(); //追加時はTopic.phpのfillableにも追加
//            $table->string('a0_item',60); //追加時はTopic.phpのfillableにも追加
//            $table->string('a1_item',60); //TopicsController@storeに各itemも追加
//            $table->string('a2_item',60); 
//            $table->string('a3_item',60); 
//            $table->string('a4_item',60); 
//            $table->string('b0_item',60); 
//            $table->string('b1_item',60); 
//            $table->string('b2_item',60); 
//            $table->string('b3_item',60); 
//            $table->string('b4_item',60); 
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('content_id')->references('id')->on('contents');
//            $table->foreign('a0_item')->references('a0_item')->on('contents');
//            $table->foreign('a1_item')->references('a1_item')->on('contents');
//            $table->foreign('a2_item')->references('a2_item')->on('contents');
//            $table->foreign('a3_item')->references('a3_item')->on('contents');
//            $table->foreign('a4_item')->references('a4_item')->on('contents');
//            $table->foreign('b0_item')->references('b0_item')->on('contents');
//            $table->foreign('b1_item')->references('b1_item')->on('contents');
//            $table->foreign('b2_item')->references('b2_item')->on('contents');
//            $table->foreign('b3_item')->references('b3_item')->on('contents');
//            $table->foreign('b4_item')->references('b4_item')->on('contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
