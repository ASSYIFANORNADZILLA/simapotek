<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->string('nomor_faktur')->primary();
            $table->string('kode_obat');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kode_obat')->references('kode_obat')->on('obats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
