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
        Schema::create('allprojects', function (Blueprint $table) {
            $table->bigIncrements('allprojects_id');
            $table->string('pro_status',255)->nullable();
            $table->string('category_as',255)->nullable();
            $table->string('pro_name',255)->nullable();
            $table->string('pro_title',255)->nullable();
            $table->string('pro_heading',255)->nullable();
            $table->string('pro_location',255)->nullable();
            $table->string('pro_start',255)->nullable();
            $table->string('pro_end',255)->nullable();
            $table->integer('target_amount')->nullable();
            $table->integer('raised_amount')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('people')->nullable();
            $table->text('pro_purpuse')->nullable();
            $table->text('pro_des')->nullable();
            $table->string('service_image',255)->nullable();
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
        Schema::create('allprojects', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};
