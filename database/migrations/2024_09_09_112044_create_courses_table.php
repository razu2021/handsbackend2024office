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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('provider_name',255)->nullable();
            $table->string('course_title',255)->nullable();
            $table->string('course_location',255)->nullable();
            $table->string('course_type',255)->nullable();
            $table->string('course_price',255)->nullable();
            $table->string('app_instruction',255)->nullable();
            $table->string('app_target',255)->nullable();
            $table->string('app_deadline',255)->nullable();
            $table->string('app_reased',255)->nullable();
            $table->string('app_education',255)->nullable();
            $table->string('app_gender',255)->nullable();
            $table->string('course_duration',255)->nullable();
            $table->string('course_start',255)->nullable();
            $table->string('course_end',255)->nullable();
            $table->string('class_duration',255)->nullable();
            $table->string('class_start',255)->nullable();
            $table->string('class_end',255)->nullable();
            $table->string('total',255)->nullable();
            $table->string('certificate',255)->nullable();
            $table->string('note',255)->nullable();
            $table->text('caption')->nullable();
            $table->text('service_image')->nullable();
            $table->text('service_bg_image')->nullable();
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
        Schema::create('courses', function (Blueprint $table)  {
            $table->dropSoftDeletes();
        });
    }
};
