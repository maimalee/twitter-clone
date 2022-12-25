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
        Schema::create('friends', function (Blueprint $table) {
            $table->bigInteger('friend_id')
                ->unsigned()
                ->autoIncrement();
            $table->foreignId('u_id')
                ->constrained('users', 'user_id')
                ->cascadeOnDelete();
            $table->foreignId('f_id')
                ->constrained('users','user_id')
                ->cascadeOnDelete();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('friends');
    }
};
