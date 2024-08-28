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
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->bigIncrements('Portfolio_id');
            $table->string('user_id',20)->nullable();
            $table->string('name1',50)->nullable();
            $table->string('image1',50)->nullable();
            $table->string('name2',50)->nullable();
            $table->string('image2',50)->nullable();
            $table->string('name3',50)->nullable();
            $table->string('image3',50)->nullable();
            $table->string('name4',50)->nullable();
            $table->string('image4',50)->nullable();
            $table->string('slug',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('post_status')->default(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('portfolio_images', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};
