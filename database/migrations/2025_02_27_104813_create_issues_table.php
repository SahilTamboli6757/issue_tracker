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
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');

            $table->string('time_taken')->nullable();
            $table->string('time_required')->nullable();
            $table->string('time_worked')->nullable();
            $table->string('status')->default(0);

            $table->unsignedBigInteger('assigned_to');
            $table->foreign('assigned_to')->references('id')->on('users');

            $table->unsignedBigInteger('assigned_by');
            $table->foreign('assigned_by')->references('id')->on('users');

            $table->unsignedBigInteger('reported_to');
            $table->foreign('reported_to')->references('id')->on('users');

            $table->unsignedBigInteger('raised_by');
            $table->foreign('raised_by')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
