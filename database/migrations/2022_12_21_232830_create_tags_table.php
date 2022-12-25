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
        Schema::create('tags', function (Blueprint $table) {
            $table->bigInteger('tag_id')
                ->unsigned()
                ->autoIncrement();

            $table->foreignId('post_owner')
                ->constrained('users', 'user_id')
                ->cascadeOnDelete();

            $table->foreignId('post_id')
                ->constrained('posts', 'post_id')
                ->cascadeOnDelete();

            $table->foreignId('tagged_friend')
                ->constrained('users', 'user_id')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('tags');
    }
};
