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
        Schema::create('circulars', function (Blueprint $table) {
            $table->id();

            $table->integer("category_id")->unsigned();
            $table->foreign("category_id")->references("id")->on("categories");

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
        Schema::dropIfExists('circulars');
    }
};
