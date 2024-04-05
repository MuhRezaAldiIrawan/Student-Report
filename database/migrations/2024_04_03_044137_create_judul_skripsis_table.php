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
        Schema::create('judul_skripsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul');
            $table->text('deskripsi');
            $table->foreignId('pbb_1_dosen_id')->constrained('dosens');
            $table->foreignId('pbb_2_dosen_id')->constrained('dosens');
            $table->string('file')->nullable();
            $table->enum('status', ['Pengajuan', 'Diterima', 'Ditolak'])->default('Pengajuan');
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
        Schema::dropIfExists('judul_skripsis');
    }
};
