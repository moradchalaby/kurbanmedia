<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKucukbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kucukbas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrent();
            $table->integer('sira_no')->nullable();
            $table->integer('kesilme_no')->nullable();
            $table->integer('gun')->nullable();
            $table->integer('hisse_no')->nullable();
            $table->string('saat')->nullable();
            $table->string('adi_soyadi')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('referans')->nullable();
            $table->enum('vekalet_durum', ['0', '1'])->default('0');
            /*
            vekalet=1
            gelecek=0
            */
            $table->string('kayit_log')->nullable();
            $table->enum('kesilme_durum', ['0', '1'])->default('0');
            /*,
            kesilmedi = 0
            kesildi= 1
            */
            $table->enum('arama_islem', ['0', '1', '10', '11', '12', '13'])->default('0');
            /*arama -------
                aranmadı=0
                arandı=1
                ulaşılamadı=10
                numara yanlış =11
                referans arandı=12
                iletişim kurulamadı=13*/
            $table->enum('video_islem', ['0', '10', '11', '12', '5'])->default('0');
            /*
                    video-----

                    video gönderilmedi=0
                    herhangi bir messanger programı yok=5
                    video gönderildi =wp- 10
                    tlgrm 11
                    bip 12
                    */

            $table->integer('islem_log')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kucukbas');
    }
}