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
        Schema::create('temporary_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('number');
            $table->integer('subject_id');
            $table->integer('source_id');
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
        Schema::dropIfExists('temporary_groups');
    }
};
