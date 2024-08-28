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
        Schema::create('leave_reasons', function (Blueprint $table) {
            $table->bigIncrements('reason_id');
            $table->string('user_id',20)->nullable();
            $table->string('reason_name',200)->nullable();
            $table->string('unique_id')->default(1);
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
        Schema::create('leave_reasons', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};
