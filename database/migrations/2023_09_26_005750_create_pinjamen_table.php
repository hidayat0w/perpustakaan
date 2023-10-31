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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggal_pinjam');
            $table->integer('lama_pinjam');
            $table->text('keterangan');
            $table->integer('anggota_id');
            $table->integer('user_id');
            $table->enum('status', ['sudah kembali', 'belum kembali']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjamen');
    }
};
