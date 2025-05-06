<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('title');
            $table->text('content');
            $table->text('description');
            $table->dateTime('date');
            $table->integer('price');
            $table->integer('number_of_tickets');
            $table->text('venue');
            $table->text('address');
            $table->longText('picture_1');
            $table->longText('picture_2');
            $table->longText('picture_3');
            $table->text('sponsor_name');
            $table->text('mail_address');
            $table->text('insta_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('x_url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
