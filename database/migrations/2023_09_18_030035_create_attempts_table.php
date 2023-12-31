<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();

            $table->string('version');
            $table->text('status');
            $table->decimal('grade', 3,2)->nullable();
            $table->decimal('grade_override', 3, 3)->nullable();
            $table->longText('quiz_data')->nullable();
            $table->foreignId('quiz_id');
            $table->foreignId('enrollment_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attempts');
    }
};
