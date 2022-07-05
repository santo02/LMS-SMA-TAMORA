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
        Schema::dropIfExists('forum_submissions');
        Schema::create('forum_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('id_subm')->references('id')->on('submissions')->onDelete('cascade');
            $table->string('nilai');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_submissins');
    }
};
