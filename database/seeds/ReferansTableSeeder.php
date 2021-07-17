<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referans')->insert(
            [
                [
                    "adi_soyadi" => "HALİL İBRAHİM AYTUĞ",
                    "tel_no" => "+905511105377"
                ],
                [
                    "adi_soyadi" => "İBRAHİM ŞEKER",
                    "tel_no" => "+905327875777"
                ],
                [
                    "adi_soyadi" => "MUHAMMET ALİ EŞMELİ",
                    "tel_no" => "+905059959545"
                ],
                [
                    "adi_soyadi" => "AHMET ZAKİR GÜNGÖR",
                    "tel_no" => "+905327439605"
                ],
                [
                    "adi_soyadi" => "YUNUS YAZGAN",
                    "tel_no" => "+905423351919"
                ],
                [
                    "adi_soyadi" => "HALİL TOPBAŞ",
                    "tel_no" => "+905333611865"
                ],
                [
                    "adi_soyadi" => "AHMET YILDIRIM",
                    "tel_no" => "+905075011466"
                ],
                [
                    "adi_soyadi" => "ABDULLAH HIDIR",
                    "tel_no" => "+905554632379"
                ],
                [
                    "adi_soyadi" => "SAMİ GÖKSÜN",
                    "tel_no" => "+905077952534"
                ],
                [
                    "adi_soyadi" => "FATİH GARCAN",
                    "tel_no" => "+905454636795"
                ],
                [
                    "adi_soyadi" => "MEHMET YAĞIR",
                    "tel_no" => "+905378299136"
                ],
                [
                    "adi_soyadi" => "MUHAMMED BIYIKLI",
                    "tel_no" => "+905511658719"
                ],
                [
                    "adi_soyadi" => "HALİL KAŞIKÇI",
                    "tel_no" => "+905326133772"
                ],
                [
                    "adi_soyadi" => "HÜSEYİN KARACA",
                    "tel_no" => "+905355456001"
                ],
                [
                    "adi_soyadi" => "MUSTAFA KILIÇ",
                    "tel_no" => "+905322665443"
                ],
                [
                    "adi_soyadi" => "TURGUT TOK",
                    "tel_no" => "+905327271441"
                ],
                [
                    "adi_soyadi" => "MUSTAFA KÜÇÜKAŞCI",
                    "tel_no" => "+905556416199"
                ],
                [
                    "adi_soyadi" => "YUNUS EŞMELİ",
                    "tel_no" => "+905321799850"
                ],
                [
                    "adi_soyadi" => "ENES BAL",
                    "tel_no" => "+905428365051"
                ],
                [
                    "adi_soyadi" => "KAPI MÜŞTERİSİ"
                ],
                [
                    "adi_soyadi" => "ALİ KOCAMAN",
                    "tel_no" => "+905052988962"
                ],
                [
                    "adi_soyadi" => "MALİK TAM",
                    "tel_no" => "+905051162897"
                ],
                [
                    "adi_soyadi" => "SAMİ ÇOKLAR",
                    "tel_no" => "+905334423542"
                ],
                [
                    "adi_soyadi" => "TALHA ŞENSOY",
                    "tel_no" => "+905462295461"
                ],
                [
                    "adi_soyadi" => "ÖMER SAMİ HIDIR",
                    "tel_no" => "+905556520333"
                ],
                [
                    "adi_soyadi" => "YUSUF GÜNAY",
                    "tel_no" => "+905419130695"
                ],
                [
                    "adi_soyadi" => "KEMAL ÇEVİKEL",
                    "tel_no" => "+905324135057"
                ],
                [
                    "adi_soyadi" => "EBUBEKİR DUTARKAN",
                    "tel_no" => "+905424693286"
                ],
                [
                    "adi_soyadi" => "MÜCAHİT BULUT",
                    "tel_no" => "+905380726957"
                ],
                [
                    "adi_soyadi" => "ABDULLAH KÜÇÜKAŞCI",
                    "tel_no" => "+905557655271"
                ],
                [
                    "adi_soyadi" => "MUSTAFA EFE",
                    "tel_no" => "+905322266566"
                ]

            ]
        );
    }
}