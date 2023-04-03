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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('user_id');
            $table->string('category_id');
            $table->string('description');
            $table->string('responsibilities');
            $table->string('requirements');
            $table->string('remuneration');
            $table->date('deadline');
            $table->enum('status',['pending','approved'])->default('pending');
            $table->boolean('publish')->default(false);
            $table->string('cover_letter')->nullable();

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
        Schema::dropIfExists('jobs');
    }
};
