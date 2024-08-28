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
        Schema::create('work_statuses', function (Blueprint $table) {
            $table->bigIncrements('worker_id');
            $table->string('user_id',20)->nullable();
            $table->string('task_name',200)->nullable();
            $table->string('curent_date',200)->nullable();
            $table->string('start_time',20)->nullable();
            $table->string('ending_time',20)->nullable();
            $table->text('description')->nullable();
            $table->integer('unique_id')->default(1);
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
