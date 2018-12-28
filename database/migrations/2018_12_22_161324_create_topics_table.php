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
            $table->integer('user_id')->unsigned()->index();
            $table->string('a0_item',181);
            $table->string('a1_item',181);
            $table->string('a2_item',181);
            $table->string('a3_item',181);
            $table->string('a4_item',181);
            $table->string('b0_item',181);
            $table->string('b1_item',181);
            $table->string('b2_item',181);
            $table->string('b3_item',181);
            $table->string('b4_item',181);

            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
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
