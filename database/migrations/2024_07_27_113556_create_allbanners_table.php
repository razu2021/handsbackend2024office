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
        Schema::create('allbanners', function (Blueprint $table) {
            $table->bigIncrements('banner_id');
            $table->string('page_unique_name')->nullable();
            $table->string('banner_title',255)->nullable();
            $table->string('banner_heading',255)->nullable();
            $table->text('banner_caption')->nullable();
            $table->string('banner_button1',255)->nullable();
            $table->string('banner_button_url1',255)->nullable();
            $table->string('banner_button2',255)->nullable();
            $table->string('banner_button_url2',255)->nullable();
            $table->string('banner_bg_image',255)->nullable();
            $table->string('banner_image',255)->nullable();
            $table->string('slug',50)->nullable();
            $table->string('creator',50)->nullable();
            $table->string('editor',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('post_status')->default(2);
            $table->integer('order_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('allbanners', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};
