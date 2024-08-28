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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->bigIncrements('Creator_id');
            $table->string('user_id',20)->nullable();
            $table->string('user_name',100)->nullable();
            $table->string('website',200)->nullable();
            $table->string('facebook',200)->nullable();
            $table->string('twitter',200)->nullable();
            $table->string('linkedin',200)->nullable();
            $table->string('instagram',200)->nullable();
            $table->string('family_member',11)->nullable();
            $table->string('father_name',200)->nullable();
            $table->string('father_ocupation',100)->nullable();
            $table->string('father_phone',20)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('mother_ocupation',50)->nullable();
            $table->string('mother_phone',20)->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanet_address')->nullable();
            $table->string('birth_date',100)->nullable();
            $table->string('birth_place',100)->nullable();
            $table->string('relationship',50)->nullable();
            $table->string('blood',100)->nullable();
            $table->string('language',50)->nullable();
            $table->string('hobies',200)->nullable();
            $table->text('other_activitis')->nullable();
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
        Schema::create('basic_infos', function (Blueprint $table)  {
            //
            $table->dropSoftDeletes();
        });
    }
};
