<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pegawais', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nama');
        $table->string('jenis_kelamin');
        $table->string('alamat', 100);
        $table->string('no_hp', 15);
        $table->integer('umur');
        $table->timestamps();
        $table->softDeletes();
    });

    DB::table('pegawais')->insert(
        [
            [
                'nama' => 'Faisal',
                'jenis_kelamin' => 'Pria',
                'alamat' => 'Banjarmasin',
                'no_hp' => '082191949376',
                'umur' => 26,
            ],
            [
                'nama' => 'Nida',
                'jenis_kelamin' => 'Wanita',
                'alamat' => 'Banjarmasin',
                'no_hp' => '082154619823',
                'umur' => 24,
            ]
        ]
    );
}

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
