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
        Schema::create('whatsnews', function (Blueprint $table) {
            $table->bigIncrements('whatsnew_id');
            $table->string('top_heading',255)->nullable();
            $table->string('title',255)->nullable();
            $table->string('service_image',255)->nullable();
            $table->string('button',255)->nullable();
            $table->string('button_url',255)->nullable();
            $table->string('slug',50)->nullable();
            $table->string('creator',50)->nullable();
            $table->string('editor',50)->nullable();
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
        Schema::create('whatsnews', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};