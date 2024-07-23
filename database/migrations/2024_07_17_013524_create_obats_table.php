<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->string('kode_obat')->primary();
            $table->string('nama_obat');
            $table->string('kode_kategori');
            $table->string('supplier');
            $table->integer('stok');
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->date('tanggal_expired');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategoris')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
