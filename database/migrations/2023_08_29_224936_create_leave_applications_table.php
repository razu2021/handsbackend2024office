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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->bigIncrements('application_id');
            $table->string('user_id',20)->nullable();
            $table->string('ref_id',20)->nullable();
            $table->string('app_date',100)->nullable();
            $table->string('app_subject',100)->nullable();
            $table->text('app_diclaration')->nullable();
            $table->string('starting_date',100)->nullable();
            $table->string('ending_date',100)->nullable();
            $table->string('leave_details',100)->nullable();
            $table->string('leave_reason',100)->nullable();
            $table->text('additional_comment')->nullable();
            $table->text('dpt_comment')->nullable();
            $table->string('ap_s_date',100)->nullable();
            $table->string('ap_e_date',100)->nullable();
            $table->text('note')->nullable();
            $table->text('instraction')->nullable();
            $table->string('request_days',11)->nullable();
            $table->string('aproved_days',11)->nullable();
            $table->string('uniqe_id')->default(1);
            $table->string('slug',50)->nullable();
            $table->integer('status')->default(1);
            $table->integer('post_status')->default(2);
            $table->integer('creator')->nullable();
            $table->integer('editor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('leave_applications', function (Blueprint $table){
            //
            $table->dropSoftDeletes();
        });
    }
};
