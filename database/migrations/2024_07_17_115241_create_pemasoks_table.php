<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreatePemasoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasoks', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama_pemasok', 100);
                $table->string('alamat', 100);
                $table->string('kota', 100);
                $table->string('no_hp', 15);
                $table->timestamps();
                $table->softDeletes();
            });
           
            DB::table('pemasoks')->insert(

                [
                    [
                        'nama_pemasok' => 'Assyifa',
                        'alamat' => 'Jl.Hksn komp amd',
                        'kota' => 'Banjarmasin',
                        'no_hp' => '0821595158',
                    ],
                    [
                       
                        'nama_pemasok' => 'Nornadzilla',
                        'alamat' => 'Jl.Perdagangan',
                        'kota' => 'Bandung',
                        'no_hp' => '082889900',
                    ]
                ]
            );
        }
    

    public function down()
    {
        Schema::dropIfExists('pemasoks');
    }
}
