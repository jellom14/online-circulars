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
        Schema::create('circular_attachments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("circular_id")->unsigned();
            $table->foreign("circular_id")->references("id")->on("circulars");

            $table->string("name");
            $table->integer("number");
            $table->date("date");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circular_attachments');
    }
};
