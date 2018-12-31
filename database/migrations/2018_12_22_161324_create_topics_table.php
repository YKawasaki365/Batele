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
            $table->string('title',30);
            $table->integer('user_id')->unsigned()->index();
            $table->string('a0_item',10);  // 10字制限
            $table->string('a1_item',10);
            $table->string('a2_item',60);  // 60字制限 
            $table->string('a3_item',60);
            $table->string('a4_item',60);
            $table->string('b0_item',10);
            $table->string('b1_item',10);
            $table->string('b2_item',60);
            $table->string('b3_item',60);
            $table->string('b4_item',60);

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
