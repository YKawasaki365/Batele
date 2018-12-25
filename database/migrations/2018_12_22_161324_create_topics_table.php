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
            $table->string('a0_item')->unique();
            $table->string('a1_item')->unique();
            $table->string('a2_item')->unique();
            $table->string('a3_item')->unique();
            $table->string('a4_item')->unique();
            $table->string('b0_item')->unique();
            $table->string('b1_item')->unique();
            $table->string('b2_item')->unique();
            $table->string('b3_item')->unique();
            $table->string('b4_item')->unique();
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
