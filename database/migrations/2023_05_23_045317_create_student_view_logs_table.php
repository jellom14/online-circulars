<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('student_view_logs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("student_log_id")->unsigned();
            $table->foreign("student_log_id")->references("id")->on("student_logs");

            
            $table->bigInteger("circular_id")->unsigned();
            $table->foreign("circular_id")->references("id")->on("circulars");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_view_logs');
    }
};
