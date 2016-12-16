<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {

            $table->unsignedInteger('problem_id');
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('body');
            $table->unsignedInteger('upvotes');
            //TODO: add language support
            $table->timestamps();

            $table->unique(['problem_id','user_id'],'users_solution');
            $table->primary(['problem_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
