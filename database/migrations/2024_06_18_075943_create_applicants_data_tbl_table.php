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
        Schema::create('applicants_data_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('rank')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('qlr')->nullable();
            $table->string('badge_number')->nullable();
            $table->string('unit')->nullable();
            $table->string('purpose')->nullable();
            $table->string('specific_purpose')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('status')->nullable();
            $table->string('reason')->nullable();
            $table->string('ctrl_no')->nullable();
            $table->integer('series')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants_data_tbl');
    }
};
