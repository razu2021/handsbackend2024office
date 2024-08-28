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
        Schema::create('addwork_places', function (Blueprint $table) {
            $table->bigIncrements('Creator_id');
            $table->string('user_id',20)->nullable();
            $table->string('organization_name')->nullable();
            $table->string('curent_position',50)->nullable();
            $table->string('starting_date',20)->nullable();
            $table->string('ending_date',20)->nullable();
            $table->text('job_des')->nullable();
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
        Schema::create('addwork_places', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};
