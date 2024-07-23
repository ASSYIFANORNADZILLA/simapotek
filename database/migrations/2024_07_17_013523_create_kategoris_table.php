<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->string('kode_kategori')->primary();
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
