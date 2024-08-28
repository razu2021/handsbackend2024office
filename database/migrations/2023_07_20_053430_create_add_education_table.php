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
        Schema::create('add_education', function (Blueprint $table) {
            $table->bigIncrements('education_id');
            $table->string('user_id',20)->nullable();
            $table->string('collage_name',200)->nullable();
            $table->string('subject_name',200)->nullable();
            $table->string('starting_date',20)->nullable();
            $table->string('ending_date',20)->nullable();
            $table->string('session_date',20)->nullable();
            $table->string('degree_name',50)->nullable();
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
        Schema::create('add_education', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};
