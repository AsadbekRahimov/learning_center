<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address');
            $table->integer('source_id');
            $table->integer('branch_id');
            $table->integer('registered_id');
            $table->date('come_date');
            $table->text('comment')->nullable();
            $table->text('hobbies')->nullable();
            $table->integer('balance')->default(0);
            $table->string('status')->default('accepted');
            $table->tinyInteger('privilege');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
