<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function getCuaca()
    {
    	$data = curl_init();
        $url = "http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=12&NamaProv=JawaTimur";

        // setting CURL

        curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($data, CURLOPT_URL, $url);

        // menjalankan CURL untuk membaca isi file

        $hasil = curl_exec($data);

        curl_close($data);


		//membuat dom dokumen

        $dom = new \DOMDocument();


		//mengambil html dari kompas untuk di parse

        @$dom->loadHTML($hasil);

        $classname = "table-responsive";

		//mencari class memakai dom query

        $finder = new \DOMXPath($dom);

        $spaner = $finder->query("//*[contains(@class, '$classname')]");

        $span = $spaner->item(0);

		// mengambil semua tag td//

        $kota = $span->getElementsByTagName('td');


        $data = array();
        $response = array();
        $response["error"] = true;

		// td no 24,25,26,27//

//==============================================///
        if (strcasecmp($kota->item(24)->nodeValue, "jember") == 0) {
            $response["error"] = false;

            $data[] = array(
                'kota' => $kota->item(24)->nodeValue,
                'cuaca' => $kota->item(25)->nodeValue,
                'cuaca2' => "None",
                'cuaca3' => "None",
                'cuaca4' => "None",
                'suhu' => $kota->item(26)->nodeValue,
                'kelembaban' => $kota->item(27)->nodeValue
            );


            foreach ($data as $value) {
                $response["kota"] = $value['kota'];
                $response["waktu"] = "Dini hari";
                $response["waktu2"] = "";
                $response["waktu3"] = "";
                $response["waktu4"] = "";
                $response["cuaca"] = $value['cuaca'];
                $response["suhu"] = $value['suhu'];
                $response["cuaca2"] = $value['cuaca2'];
                $response["cuaca3"] = $value['cuaca3'];
                $response["cuaca4"] = $value['cuaca4'];
                $response["kelembaban"] = $value['kelembaban'];

                //== EXPLODE ==//
                $response["suhuYG"] = explode("- ", $response["suhu"]);
                $response["kelembabanYG"] = explode("- ", $response["kelembaban"]);

                //== MAX MIN SUHU ==//
                $response["suhuMIN"] = $response["suhuYG"][0]; 
                $response["suhuMAX"] = $response["suhuYG"][1]; 

                //== MAX MIN KELEMBABAN ==//
                $response["kelembabanMAX"] = $response["kelembabanYG"][0];
                $response["kelembabanMIN"] = $response["kelembabanYG"][1];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkakelembabanMIN"] = (int)$response["kelembabanMIN"];
                $response["AngkakelembabanMAX"] = (int)$response["kelembabanMAX"];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkasuhuMIN"] = (int)$response["suhuMIN"];
                $response["AngkasuhuMAX"] = (int)$response["suhuMAX"];

                //== NYARI CURAH HUJAN DARI CUACA ==//

                //== CURAH HUJAN CUACA-1 ==//

                if ($response["cuaca"]=="Cerah") {
                	$response["cuacaAngka1"] = 100;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Cerah Berawan") {
                	$response["cuacaAngka1"] = 150;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Udara Kabur") {
                	$response["cuacaAngka1"] = 200;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Kabut") {
                	$response["cuacaAngka1"] = 300;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Berawan") {
                	$response["cuacaAngka1"] = 400;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Hujan Lokal") {
                	$response["cuacaAngka1"] = 500;
                	$response["CountCuacaAngka1"] = 1;
                }

                //== CURAH HUJAN CUACA-2 ==//

                if ($response["cuaca2"]=="Cerah") {
                	$response["cuacaAngka2"] = 100;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Cerah Berawan") {
                	$response["cuacaAngka2"] = 150;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Udara Kabur") {
                	$response["cuacaAngka2"] = 200;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Kabut") {
                	$response["cuacaAngka2"] = 300;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Berawan") {
                	$response["cuacaAngka2"] = 400;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Hujan Lokal") {
                	$response["cuacaAngka2"] = 500;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="None") {
                	$response["cuacaAngka2"] = 0;
                	$response["CountCuacaAngka2"] = 0;
                }

                //== CURAH HUJAN CUACA-3 ==//

                if ($response["cuaca3"]=="Cerah") {
                	$response["cuacaAngka3"] = 100;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Cerah Berawan") {
                	$response["cuacaAngka3"] = 150;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Udara Kabur") {
                	$response["cuacaAngka3"] = 200;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Kabut") {
                	$response["cuacaAngka3"] = 300;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Berawan") {
                	$response["cuacaAngka3"] = 400;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Hujan Lokal") {
                	$response["cuacaAngka3"] = 500;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="None") {
                	$response["cuacaAngka3"] = 0;
                	$response["CountCuacaAngka3"] = 0;
                }

                //== CURAH HUJAN CUACA-4 ==//

                if ($response["cuaca4"]=="Cerah") {
                	$response["cuacaAngka4"] = 100;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Cerah Berawan") {
                	$response["cuacaAngka4"] = 150;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Udara Kabur") {
                	$response["cuacaAngka4"] = 200;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Kabut") {
                	$response["cuacaAngka4"] = 300;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Berawan") {
                	$response["cuacaAngka4"] = 400;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Hujan Lokal") {
                	$response["cuacaAngka4"] = 500;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="None") {
                	$response["cuacaAngka4"] = 0;
                	$response["CountCuacaAngka4"] = 0;
                }

                //== NYARI RATA-RATA CUACA ==//
                $response["cuacaAngkaTotal"] = ($response["cuacaAngka1"]+$response["cuacaAngka2"]+$response["cuacaAngka3"]+$response["cuacaAngka4"])/($response["CountCuacaAngka1"] + $response["CountCuacaAngka2"] + $response["CountCuacaAngka3"] + $response["CountCuacaAngka4"]);


                //== AVERAGE RATA-RATA ==//
				$response["suhuAVE"] = ($response["AngkasuhuMIN"]+$response["AngkasuhuMAX"])*0.5;
				$response["kelembabanAVE"] = ($response["AngkakelembabanMIN"]+$response["AngkakelembabanMAX"])*0.5;

				//== P A D I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 24) {
					$response["paramSuhu"] = 1;
				}else if($response["suhuAVE"] >= 24 && $response["suhuAVE"] <= 26){
					$response["paramSuhu"] = 2;
				}else if($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 29){
					$response["paramSuhu"] = 3;
				}else if($response["suhuAVE"] >= 29 && $response["suhuAVE"] <= 31){
					$response["paramSuhu"] = 4;
				}else if($response["suhuAVE"] >= 31 && $response["suhuAVE"] <= 33){
					$response["paramSuhu"] = 5;
				}

				//== J A G U N G ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu2"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu2"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu2"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu2"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu2"] = 5;
				}

				//== K E D E L A I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu3"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu3"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu3"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu3"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu3"] = 5;
				}

				//== T E M B A K A U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 32) {
					$response["paramSuhu4"] = 1;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 33){
					$response["paramSuhu4"] = 2;
				}else if($response["suhuAVE"] >= 33 && $response["suhuAVE"] <= 36){
					$response["paramSuhu4"] = 3;
				}else if($response["suhuAVE"] >= 36 && $response["suhuAVE"] <= 38){
					$response["paramSuhu4"] = 4;
				}else if($response["suhuAVE"] >= 38 && $response["suhuAVE"] <= 40){
					$response["paramSuhu4"] = 5;
				}

				//== T E B U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 30) {
					$response["paramSuhu5"] = 1;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 32){
					$response["paramSuhu5"] = 2;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 34){
					$response["paramSuhu5"] = 3;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu5"] = 4;
				}else if($response["suhuAVE"] <= 26){
					$response["paramSuhu5"] = 5;
				}

				//== PENENTUAN PARAMETER K-2 ==//
				//== P A D I ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 86) {
					$response["paramKelembaban"] = 1;
				}else if($response["kelembabanAVE"] >= 86 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban"] = 3;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban"] = 4;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== J A G O N G ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 83) {
					$response["paramKelembaban2"] = 1;
				}else if($response["kelembabanAVE"] >= 83 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban2"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban2"] = 3;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban2"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban2"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== K E D E L A I ==//
				if ($response["kelembabanAVE"] >= 75 && $response["kelembabanAVE"] <= 90) {
					$response["paramKelembaban3"] = 1;
				}else if($response["kelembabanAVE"] >= 90 && $response["kelembabanAVE"] <= 100){
					$response["paramKelembaban3"] = 2;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 75){
					$response["paramKelembaban3"] = 3;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 65){
					$response["paramKelembaban3"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban3"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E M B A K A U ==//
				if ($response["kelembabanAVE"] >= 60 && $response["kelembabanAVE"] <= 80) {
					$response["paramKelembaban4"] = 1;
				}else if($response["kelembabanAVE"] >= 80 && $response["kelembabanAVE"] <= 88){
					$response["paramKelembaban4"] = 2;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 60){
					$response["paramKelembaban4"] = 3;
				}else if($response["kelembabanAVE"] >= 88){
					$response["paramKelembaban4"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban4"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E B U ==//
				if ($response["kelembabanAVE"] >= 45 && $response["kelembabanAVE"] <= 65) {
					$response["paramKelembaban5"] = 1;
				}else if($response["kelembabanAVE"] >= 40 && $response["kelembabanAVE"] <= 45){
					$response["paramKelembaban5"] = 2;
				}else if($response["kelembabanAVE"] <= 40){
					$response["paramKelembaban5"] = 3;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== P A D I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 370){
					$response["paramCuaca"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 371 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 451 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== J A G U N G ==//
				if ($response["cuacaAngkaTotal"] >= 85 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca2"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 250){
					$response["paramCuaca2"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 251 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca2"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca2"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca2"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== K E D E L A I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 400) {
					$response["paramCuaca3"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca3"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 550){
					$response["paramCuaca3"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 551 && $response["cuacaAngkaTotal"] <= 650){
					$response["paramCuaca3"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 651 && $response["cuacaAngkaTotal"] <= 750){
					$response["paramCuaca3"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E M B A K A U ==//
				if ($response["cuacaAngkaTotal"] >= 125 && $response["cuacaAngkaTotal"] <= 167) {
					$response["paramCuaca4"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 168 && $response["cuacaAngkaTotal"] <= 200){
					$response["paramCuaca4"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 267){
					$response["paramCuaca4"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 268 && $response["cuacaAngkaTotal"] <= 350){
					$response["paramCuaca4"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 351 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca4"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E B U ==//
				if ($response["cuacaAngkaTotal"] >= 142 && $response["cuacaAngkaTotal"] <= 208) {
					$response["paramCuaca5"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 209 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca5"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca5"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 700){
					$response["paramCuaca5"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 701 && $response["cuacaAngkaTotal"] <= 800){
					$response["paramCuaca5"] = 5;
				}
				//== UTILITY DAN NORMALISASI ==//

				// $cmaxSuhu = 5;
				// $cminSuhu = 1;
				// $response["normalisasiSuhu"] = 0.2;
				// $response["utilitySuhu"] = ($cmaxSuhu-$response["paramSuhu"])/($cmaxSuhu-$cminSuhu);

				// $cmaxKelembaban = 5;
				// $cminKelembaban = 1;
				// $response["normalisasiKelembaban"] = 0.1;
				// $response["utilityKelembaban"] = ($cmaxKelembaban-$response["paramKelembaban"])/($cmaxKelembaban-$cminKelembaban);

				// $cmaxCuaca = 5;
				// $cminCuaca = 1;
				// $response["normalisasiCuaca"] = 0.3;
				// $response["utilityCuaca"] = ($cmaxCuaca-$response["paramCuaca"])/($cmaxCuaca-$cminCuaca);
				
            }

//==============================================///
        } else if (strcasecmp($kota->item(30)->nodeValue, "jember") == 0) {
            $response["error"] = false;


            $data[] = array(
                'kota' => $kota->item(30)->nodeValue,
                'cuaca' => $kota->item(31)->nodeValue,
                'cuaca2' => $kota->item(32)->nodeValue,
                'cuaca3' => "None",
                'suhu' => $kota->item(33)->nodeValue,
                'kelembaban' => $kota->item(34)->nodeValue
            );


            foreach ($data as $value) {
                $response["kota"] = $value['kota'];
                $response["waktu"] = "Malam";
                $response["waktu2"] = "Dini Hari";
                $response["cuaca"] = $value['cuaca'];
                $response["cuaca2"] = $value['cuaca2'];
                $response["cuaca3"] = $value['cuaca3'];
                $response["cuaca4"] = "None";
                $response["suhu"] = $value['suhu'];
                $response["kelembaban"] = $value['kelembaban'];


                //== EXPLODE ==//
                $response["suhuYG"] = explode("- ", $response["suhu"]);
                $response["kelembabanYG"] = explode("- ", $response["kelembaban"]);

                //== MAX MIN SUHU ==//
                $response["suhuMIN"] = $response["suhuYG"][0]; 
                $response["suhuMAX"] = $response["suhuYG"][1]; 

                //== MAX MIN KELEMBABAN ==//
                $response["kelembabanMAX"] = $response["kelembabanYG"][0];
                $response["kelembabanMIN"] = $response["kelembabanYG"][1];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkakelembabanMIN"] = (int)$response["kelembabanMIN"];
                $response["AngkakelembabanMAX"] = (int)$response["kelembabanMAX"];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkasuhuMIN"] = (int)$response["suhuMIN"];
                $response["AngkasuhuMAX"] = (int)$response["suhuMAX"];

                //== NYARI CURAH HUJAN DARI CUACA ==//

                //== CURAH HUJAN CUACA-1 ==//

                if ($response["cuaca"]=="Cerah") {
                	$response["cuacaAngka1"] = 100;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Cerah Berawan") {
                	$response["cuacaAngka1"] = 150;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Udara Kabur") {
                	$response["cuacaAngka1"] = 200;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Kabut") {
                	$response["cuacaAngka1"] = 300;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Berawan") {
                	$response["cuacaAngka1"] = 400;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Hujan Lokal") {
                	$response["cuacaAngka1"] = 500;
                	$response["CountCuacaAngka1"] = 1;
                }

                //== CURAH HUJAN CUACA-2 ==//

                if ($response["cuaca2"]=="Cerah") {
                	$response["cuacaAngka2"] = 100;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Cerah Berawan") {
                	$response["cuacaAngka2"] = 150;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Udara Kabur") {
                	$response["cuacaAngka2"] = 200;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Kabut") {
                	$response["cuacaAngka2"] = 300;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Berawan") {
                	$response["cuacaAngka2"] = 400;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Hujan Lokal") {
                	$response["cuacaAngka2"] = 500;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="None") {
                	$response["cuacaAngka2"] = 0;
                	$response["CountCuacaAngka2"] = 0;
                }

                //== CURAH HUJAN CUACA-3 ==//

                if ($response["cuaca3"]=="Cerah") {
                	$response["cuacaAngka3"] = 100;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Cerah Berawan") {
                	$response["cuacaAngka3"] = 150;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Udara Kabur") {
                	$response["cuacaAngka3"] = 200;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Kabut") {
                	$response["cuacaAngka3"] = 300;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Berawan") {
                	$response["cuacaAngka3"] = 400;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Hujan Lokal") {
                	$response["cuacaAngka3"] = 500;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="None") {
                	$response["cuacaAngka3"] = 0;
                	$response["CountCuacaAngka3"] = 0;
                }

                //== CURAH HUJAN CUACA-4 ==//

                if ($response["cuaca4"]=="Cerah") {
                	$response["cuacaAngka4"] = 100;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Cerah Berawan") {
                	$response["cuacaAngka4"] = 150;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Udara Kabur") {
                	$response["cuacaAngka4"] = 200;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Kabut") {
                	$response["cuacaAngka4"] = 300;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Berawan") {
                	$response["cuacaAngka4"] = 400;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Hujan Lokal") {
                	$response["cuacaAngka4"] = 500;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="None") {
                	$response["cuacaAngka4"] = 0;
                	$response["CountCuacaAngka4"] = 0;
                }

                //== NYARI RATA-RATA CUACA ==//
                $response["cuacaAngkaTotal"] = ($response["cuacaAngka1"]+$response["cuacaAngka2"]+$response["cuacaAngka3"]+$response["cuacaAngka4"])/($response["CountCuacaAngka1"] + $response["CountCuacaAngka2"] + $response["CountCuacaAngka3"] + $response["CountCuacaAngka4"]);


                //== AVERAGE RATA-RATA ==//
				$response["suhuAVE"] = ($response["AngkasuhuMIN"]+$response["AngkasuhuMAX"])/2;
				$response["kelembabanAVE"] = ($response["AngkakelembabanMIN"]+$response["AngkakelembabanMAX"])*0.5;

				//== P A D I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 24) {
					$response["paramSuhu"] = 1;
				}else if($response["suhuAVE"] >= 24 && $response["suhuAVE"] <= 26){
					$response["paramSuhu"] = 2;
				}else if($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 29){
					$response["paramSuhu"] = 3;
				}else if($response["suhuAVE"] >= 29 && $response["suhuAVE"] <= 31){
					$response["paramSuhu"] = 4;
				}else if($response["suhuAVE"] >= 31 && $response["suhuAVE"] <= 33){
					$response["paramSuhu"] = 5;
				}

				//== J A G U N G ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu2"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu2"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu2"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu2"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu2"] = 5;
				}

				//== K E D E L A I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu3"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu3"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu3"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu3"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu3"] = 5;
				}

				//== T E M B A K A U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 32) {
					$response["paramSuhu4"] = 1;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 33){
					$response["paramSuhu4"] = 2;
				}else if($response["suhuAVE"] >= 33 && $response["suhuAVE"] <= 36){
					$response["paramSuhu4"] = 3;
				}else if($response["suhuAVE"] >= 36 && $response["suhuAVE"] <= 38){
					$response["paramSuhu4"] = 4;
				}else if($response["suhuAVE"] >= 38 && $response["suhuAVE"] <= 40){
					$response["paramSuhu4"] = 5;
				}

				//== T E B U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 30) {
					$response["paramSuhu5"] = 1;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 32){
					$response["paramSuhu5"] = 2;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 34){
					$response["paramSuhu5"] = 3;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu5"] = 4;
				}else if($response["suhuAVE"] <= 26){
					$response["paramSuhu5"] = 5;
				}

				//== PENENTUAN PARAMETER K-2 ==//
				//== P A D I ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 86) {
					$response["paramKelembaban"] = 1;
				}else if($response["kelembabanAVE"] >= 86 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban"] = 3;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban"] = 4;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== J A G O N G ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 83) {
					$response["paramKelembaban2"] = 1;
				}else if($response["kelembabanAVE"] >= 83 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban2"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban2"] = 3;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban2"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban2"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== K E D E L A I ==//
				if ($response["kelembabanAVE"] >= 75 && $response["kelembabanAVE"] <= 90) {
					$response["paramKelembaban3"] = 1;
				}else if($response["kelembabanAVE"] >= 90 && $response["kelembabanAVE"] <= 100){
					$response["paramKelembaban3"] = 2;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 75){
					$response["paramKelembaban3"] = 3;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 65){
					$response["paramKelembaban3"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban3"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E M B A K A U ==//
				if ($response["kelembabanAVE"] >= 60 && $response["kelembabanAVE"] <= 80) {
					$response["paramKelembaban4"] = 1;
				}else if($response["kelembabanAVE"] >= 80 && $response["kelembabanAVE"] <= 88){
					$response["paramKelembaban4"] = 2;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 60){
					$response["paramKelembaban4"] = 3;
				}else if($response["kelembabanAVE"] >= 88){
					$response["paramKelembaban4"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban4"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E B U ==//
				if ($response["kelembabanAVE"] >= 45 && $response["kelembabanAVE"] <= 65) {
					$response["paramKelembaban5"] = 1;
				}else if($response["kelembabanAVE"] >= 40 && $response["kelembabanAVE"] <= 45){
					$response["paramKelembaban5"] = 2;
				}else if($response["kelembabanAVE"] <= 40){
					$response["paramKelembaban5"] = 3;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 5;
				}




				//== PENENTUAN PARAMETER K-3 ==//
				//== P A D I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 370){
					$response["paramCuaca"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 371 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 451 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== J A G U N G ==//
				if ($response["cuacaAngkaTotal"] >= 85 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca2"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 250){
					$response["paramCuaca2"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 251 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca2"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca2"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca2"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== K E D E L A I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 400) {
					$response["paramCuaca3"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca3"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 550){
					$response["paramCuaca3"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 551 && $response["cuacaAngkaTotal"] <= 650){
					$response["paramCuaca3"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 651 && $response["cuacaAngkaTotal"] <= 750){
					$response["paramCuaca3"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E M B A K A U ==//
				if ($response["cuacaAngkaTotal"] >= 125 && $response["cuacaAngkaTotal"] <= 167) {
					$response["paramCuaca4"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 168 && $response["cuacaAngkaTotal"] <= 200){
					$response["paramCuaca4"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 267){
					$response["paramCuaca4"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 268 && $response["cuacaAngkaTotal"] <= 350){
					$response["paramCuaca4"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 351 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca4"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E B U ==//
				if ($response["cuacaAngkaTotal"] >= 142 && $response["cuacaAngkaTotal"] <= 208) {
					$response["paramCuaca5"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 209 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca5"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca5"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 700){
					$response["paramCuaca5"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 701 && $response["cuacaAngkaTotal"] <= 800){
					$response["paramCuaca5"] = 5;
				}

				//== UTILITY DAN NORMALISASI ==//

				// $cmaxSuhu = 5;
				// $cminSuhu = 1;
				// $response["normalisasiSuhu"] = 0.2;
				// $response["utilitySuhu"] = ($cmaxSuhu-$response["paramSuhu"])/($cmaxSuhu-$cminSuhu);

				// $cmaxKelembaban = 5;
				// $cminKelembaban = 1;
				// $response["normalisasiKelembaban"] = 0.1;
				// $response["utilityKelembaban"] = ($cmaxKelembaban-$response["paramKelembaban"])/($cmaxKelembaban-$cminKelembaban);

				// $cmaxCuaca = 5;
				// $cminCuaca = 1;
				// $response["normalisasiCuaca"] = 0.3;
				// $response["utilityCuaca"] = ($cmaxCuaca-$response["paramCuaca"])/($cmaxCuaca-$cminCuaca);
            }
            //==============================================///
        } else if (strcasecmp($kota->item(36)->nodeValue, "jember") == 0) {
            $response["error"] = false;
            $data[] = array(
                'kota' => $kota->item(36)->nodeValue,
                'cuaca' => $kota->item(37)->nodeValue,
                'cuaca2' => $kota->item(38)->nodeValue,
                'cuaca3' => $kota->item(39)->nodeValue,
                'suhu' => $kota->item(40)->nodeValue,
                'kelembaban' => $kota->item(41)->nodeValue
            );


            foreach ($data as $value) {
                $response["kota"] = $value['kota'];
                $response["waktu"] = "Siang";
                $response["waktu2"] = "Malam";
                $response["waktu3"] = "Dini Hari";
                $response["waktu4"] = "None";
                $response["cuaca"] = $value['cuaca'];
                $response["cuaca2"] = $value['cuaca2'];
                $response["cuaca3"] = $value['cuaca3'];
                $response["cuaca4"] = "None";
                $response["suhu"] = $value['suhu'];
                $response["kelembaban"] = $value['kelembaban'];


                //== EXPLODE ==//
                $response["suhuYG"] = explode("- ", $response["suhu"]);
                $response["kelembabanYG"] = explode("- ", $response["kelembaban"]);


                //== MAX MIN SUHU ==//
                $response["suhuMIN"] = $response["suhuYG"][0]; 
                $response["suhuMAX"] = $response["suhuYG"][1]; 

                //== MAX MIN KELEMBABAN ==//
                $response["kelembabanMAX"] = $response["kelembabanYG"][0];
                $response["kelembabanMIN"] = $response["kelembabanYG"][1];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkakelembabanMIN"] = (int)$response["kelembabanMIN"];
                $response["AngkakelembabanMAX"] = (int)$response["kelembabanMAX"];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkasuhuMIN"] = (int)$response["suhuMIN"];
                $response["AngkasuhuMAX"] = (int)$response["suhuMAX"];
				            
                //== NYARI CURAH HUJAN DARI CUACA ==//

                //== CURAH HUJAN CUACA-1 ==//

                if ($response["cuaca"]=="Cerah") {
                	$response["cuacaAngka1"] = 100;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Cerah Berawan") {
                	$response["cuacaAngka1"] = 150;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Udara Kabur") {
                	$response["cuacaAngka1"] = 200;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Kabut") {
                	$response["cuacaAngka1"] = 300;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Berawan") {
                	$response["cuacaAngka1"] = 400;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Hujan Lokal") {
                	$response["cuacaAngka1"] = 500;
                	$response["CountCuacaAngka1"] = 1;
                }

                //== CURAH HUJAN CUACA-2 ==//

                if ($response["cuaca2"]=="Cerah") {
                	$response["cuacaAngka2"] = 100;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Cerah Berawan") {
                	$response["cuacaAngka2"] = 150;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Udara Kabur") {
                	$response["cuacaAngka2"] = 200;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Kabut") {
                	$response["cuacaAngka2"] = 300;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Berawan") {
                	$response["cuacaAngka2"] = 400;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Hujan Lokal") {
                	$response["cuacaAngka2"] = 500;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="None") {
                	$response["cuacaAngka2"] = 0;
                	$response["CountCuacaAngka2"] = 0;
                }

                //== CURAH HUJAN CUACA-3 ==//

                if ($response["cuaca3"]=="Cerah") {
                	$response["cuacaAngka3"] = 100;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Cerah Berawan") {
                	$response["cuacaAngka3"] = 150;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Udara Kabur") {
                	$response["cuacaAngka3"] = 200;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Kabut") {
                	$response["cuacaAngka3"] = 300;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Berawan") {
                	$response["cuacaAngka3"] = 400;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Hujan Lokal") {
                	$response["cuacaAngka3"] = 500;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="None") {
                	$response["cuacaAngka3"] = 0;
                	$response["CountCuacaAngka3"] = 0;
                }

                //== CURAH HUJAN CUACA-4 ==//

                if ($response["cuaca4"]=="Cerah") {
                	$response["cuacaAngka4"] = 100;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Cerah Berawan") {
                	$response["cuacaAngka4"] = 150;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Udara Kabur") {
                	$response["cuacaAngka4"] = 200;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Kabut") {
                	$response["cuacaAngka4"] = 300;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Berawan") {
                	$response["cuacaAngka4"] = 400;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Hujan Lokal") {
                	$response["cuacaAngka4"] = 500;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="None") {
                	$response["cuacaAngka4"] = 0;
                	$response["CountCuacaAngka4"] = 0;
                }

                //== NYARI RATA-RATA CUACA ==//
                $response["cuacaAngkaTotal"] = ($response["cuacaAngka1"]+$response["cuacaAngka2"]+$response["cuacaAngka3"]+$response["cuacaAngka4"])/($response["CountCuacaAngka1"] + $response["CountCuacaAngka2"] + $response["CountCuacaAngka3"] + $response["CountCuacaAngka4"]);



                //== AVERAGE RATA-RATA ==//

				$response["suhuAVE"] = ($response["AngkasuhuMIN"]+$response["AngkasuhuMAX"])*0.5;
				$response["kelembabanAVE"] = ($response["AngkakelembabanMIN"]+$response["AngkakelembabanMAX"])*0.5;

				//== P A D I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 24) {
					$response["paramSuhu"] = 1;
				}else if($response["suhuAVE"] >= 24 && $response["suhuAVE"] <= 26){
					$response["paramSuhu"] = 2;
				}else if($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 29){
					$response["paramSuhu"] = 3;
				}else if($response["suhuAVE"] >= 29 && $response["suhuAVE"] <= 31){
					$response["paramSuhu"] = 4;
				}else if($response["suhuAVE"] >= 31 && $response["suhuAVE"] <= 33){
					$response["paramSuhu"] = 5;
				}

				//== J A G U N G ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu2"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu2"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu2"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu2"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu2"] = 5;
				}

				//== K E D E L A I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu3"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu3"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu3"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu3"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu3"] = 5;
				}

				//== T E M B A K A U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 32) {
					$response["paramSuhu4"] = 1;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 33){
					$response["paramSuhu4"] = 2;
				}else if($response["suhuAVE"] >= 33 && $response["suhuAVE"] <= 36){
					$response["paramSuhu4"] = 3;
				}else if($response["suhuAVE"] >= 36 && $response["suhuAVE"] <= 38){
					$response["paramSuhu4"] = 4;
				}else if($response["suhuAVE"] >= 38 && $response["suhuAVE"] <= 40){
					$response["paramSuhu4"] = 5;
				}

				//== T E B U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 30) {
					$response["paramSuhu5"] = 1;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 32){
					$response["paramSuhu5"] = 2;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 34){
					$response["paramSuhu5"] = 3;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu5"] = 4;
				}else if($response["suhuAVE"] <= 26){
					$response["paramSuhu5"] = 5;
				}


				//== PENENTUAN PARAMETER K-2 ==//
				//== P A D I ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 86) {
					$response["paramKelembaban"] = 1;
				}else if($response["kelembabanAVE"] >= 86 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban"] = 3;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban"] = 4;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== J A G O N G ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 83) {
					$response["paramKelembaban2"] = 1;
				}else if($response["kelembabanAVE"] >= 83 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban2"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban2"] = 3;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban2"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban2"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== K E D E L A I ==//
				if ($response["kelembabanAVE"] >= 75 && $response["kelembabanAVE"] <= 90) {
					$response["paramKelembaban3"] = 1;
				}else if($response["kelembabanAVE"] >= 90 && $response["kelembabanAVE"] <= 100){
					$response["paramKelembaban3"] = 2;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 75){
					$response["paramKelembaban3"] = 3;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 65){
					$response["paramKelembaban3"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban3"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E M B A K A U ==//
				if ($response["kelembabanAVE"] >= 60 && $response["kelembabanAVE"] <= 80) {
					$response["paramKelembaban4"] = 1;
				}else if($response["kelembabanAVE"] >= 80 && $response["kelembabanAVE"] <= 88){
					$response["paramKelembaban4"] = 2;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 60){
					$response["paramKelembaban4"] = 3;
				}else if($response["kelembabanAVE"] >= 88){
					$response["paramKelembaban4"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban4"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E B U ==//
				if ($response["kelembabanAVE"] >= 45 && $response["kelembabanAVE"] <= 65) {
					$response["paramKelembaban5"] = 1;
				}else if($response["kelembabanAVE"] >= 40 && $response["kelembabanAVE"] <= 45){
					$response["paramKelembaban5"] = 2;
				}else if($response["kelembabanAVE"] <= 40){
					$response["paramKelembaban5"] = 3;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== P A D I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 370){
					$response["paramCuaca"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 371 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 451 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== J A G U N G ==//
				if ($response["cuacaAngkaTotal"] >= 85 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca2"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 250){
					$response["paramCuaca2"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 251 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca2"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca2"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca2"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== K E D E L A I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 400) {
					$response["paramCuaca3"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca3"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 550){
					$response["paramCuaca3"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 551 && $response["cuacaAngkaTotal"] <= 650){
					$response["paramCuaca3"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 651 && $response["cuacaAngkaTotal"] <= 750){
					$response["paramCuaca3"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E M B A K A U ==//
				if ($response["cuacaAngkaTotal"] >= 125 && $response["cuacaAngkaTotal"] <= 167) {
					$response["paramCuaca4"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 168 && $response["cuacaAngkaTotal"] <= 200){
					$response["paramCuaca4"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 267){
					$response["paramCuaca4"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 268 && $response["cuacaAngkaTotal"] <= 350){
					$response["paramCuaca4"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 351 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca4"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E B U ==//
				if ($response["cuacaAngkaTotal"] >= 142 && $response["cuacaAngkaTotal"] <= 208) {
					$response["paramCuaca5"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 209 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca5"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca5"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 700){
					$response["paramCuaca5"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 701 && $response["cuacaAngkaTotal"] <= 800){
					$response["paramCuaca5"] = 5;
				}

				//== UTILITY DAN NORMALISASI ==//

				$cmaxSuhu = 5;
				$cminSuhu = 1;
				$response["normalisasiSuhu"] = 0.2;
				$response["utilitySuhu"] = ($cmaxSuhu-$response["paramSuhu"])/($cmaxSuhu-$cminSuhu);
				// $response["utilitySuhu2"] = ($cmaxSuhu-$response["paramSuhu"])/($cmaxSuhu-$cminSuhu);

				$cmaxKelembaban = 5;
				$cminKelembaban = 1;
				$response["normalisasiKelembaban"] = 0.1;
				$response["utilityKelembaban"] = ($cmaxKelembaban-$response["paramKelembaban"])/($cmaxKelembaban-$cminKelembaban);


				$cmaxCuaca = 5;
				$cminCuaca = 1;
				$response["normalisasiCuaca"] = 0.3;
				$response["utilityCuaca"] = ($cmaxCuaca-$response["paramCuaca"])/($cmaxCuaca-$cminCuaca);

            }
            //==============================================///
        } else if (strcasecmp($kota->item(42)->nodeValue, "jember") == 0) {
            $response["error"] = false;
            $data[] = array(
                'kota' => $kota->item(42)->nodeValue,
                'cuaca' => $kota->item(43)->nodeValue,
                'cuaca2' => $kota->item(44)->nodeValue,
                'cuaca3' => $kota->item(45)->nodeValue,
                'cuaca4' => $kota->item(46)->nodeValue,
                'suhu' => $kota->item(47)->nodeValue,
                'kelembaban' => $kota->item(48)->nodeValue
            );


            foreach ($data as $value) {
                $response["kota"] = $value['kota'];
                $response["waktu"] = "Pagi";
                $response["waktu2"] = "Siang";
                $response["waktu3"] = "Malam";
                $response["waktu4"] = "Dini Hari";
                $response["cuaca"] = $value['cuaca'];
                $response["cuaca2"] = $value['cuaca2'];
                $response["cuaca3"] = $value['cuaca3'];
                $response["cuaca4"] = $value['cuaca4'];
                $response["suhu"] = $value['suhu'];
                $response["kelembaban"] = $value['kelembaban'];


                //== EXPLODE ==//
                $response["suhuYG"] = explode("- ", $response["suhu"]);
                $response["kelembabanYG"] = explode("- ", $response["kelembaban"]);

                //== MAX MIN SUHU ==//
                $response["suhuMIN"] = $response["suhuYG"][0]; 
                $response["suhuMAX"] = $response["suhuYG"][1]; 

                //== MAX MIN KELEMBABAN ==//
                $response["kelembabanMAX"] = $response["kelembabanYG"][0];
                $response["kelembabanMIN"] = $response["kelembabanYG"][1];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkakelembabanMIN"] = (int)$response["kelembabanMIN"];
                $response["AngkakelembabanMAX"] = (int)$response["kelembabanMAX"];

                //== MAX MIN SUHU CONVERT TO INT ==//
                $response["AngkasuhuMIN"] = (int)$response["suhuMIN"];
                $response["AngkasuhuMAX"] = (int)$response["suhuMAX"];

                //== NYARI CURAH HUJAN DARI CUACA ==//

                //== CURAH HUJAN CUACA-1 ==//

                if ($response["cuaca"]=="Cerah") {
                	$response["cuacaAngka1"] = 100;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Cerah Berawan") {
                	$response["cuacaAngka1"] = 150;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Udara Kabur") {
                	$response["cuacaAngka1"] = 200;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Kabut") {
                	$response["cuacaAngka1"] = 300;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Berawan") {
                	$response["cuacaAngka1"] = 400;
                	$response["CountCuacaAngka1"] = 1;
                }else if ($response["cuaca"]=="Hujan Lokal") {
                	$response["cuacaAngka1"] = 500;
                	$response["CountCuacaAngka1"] = 1;
                }

                //== CURAH HUJAN CUACA-2 ==//

                if ($response["cuaca2"]=="Cerah") {
                	$response["cuacaAngka2"] = 100;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Cerah Berawan") {
                	$response["cuacaAngka2"] = 150;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Udara Kabur") {
                	$response["cuacaAngka2"] = 200;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Kabut") {
                	$response["cuacaAngka2"] = 300;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Berawan") {
                	$response["cuacaAngka2"] = 400;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="Hujan Lokal") {
                	$response["cuacaAngka2"] = 500;
                	$response["CountCuacaAngka2"] = 1;
                }else if ($response["cuaca2"]=="None") {
                	$response["cuacaAngka2"] = 0;
                	$response["CountCuacaAngka2"] = 0;
                }

                //== CURAH HUJAN CUACA-3 ==//

                if ($response["cuaca3"]=="Cerah") {
                	$response["cuacaAngka3"] = 100;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Cerah Berawan") {
                	$response["cuacaAngka3"] = 150;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Udara Kabur") {
                	$response["cuacaAngka3"] = 200;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Kabut") {
                	$response["cuacaAngka3"] = 300;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Berawan") {
                	$response["cuacaAngka3"] = 400;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="Hujan Lokal") {
                	$response["cuacaAngka3"] = 500;
                	$response["CountCuacaAngka3"] = 1;
                }else if ($response["cuaca3"]=="None") {
                	$response["cuacaAngka3"] = 0;
                	$response["CountCuacaAngka3"] = 0;
                }

                //== CURAH HUJAN CUACA-4 ==//

                if ($response["cuaca4"]=="Cerah") {
                	$response["cuacaAngka4"] = 100;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Cerah Berawan") {
                	$response["cuacaAngka4"] = 150;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Udara Kabur") {
                	$response["cuacaAngka4"] = 200;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Kabut") {
                	$response["cuacaAngka4"] = 300;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Berawan") {
                	$response["cuacaAngka4"] = 400;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="Hujan Lokal") {
                	$response["cuacaAngka4"] = 500;
                	$response["CountCuacaAngka4"] = 1;
                }else if ($response["cuaca4"]=="None") {
                	$response["cuacaAngka4"] = 0;
                	$response["CountCuacaAngka4"] = 0;
                }

                //== NYARI RATA-RATA CUACA ==//
                $response["cuacaAngkaTotal"] = ($response["cuacaAngka1"]+$response["cuacaAngka2"]+$response["cuacaAngka3"]+$response["cuacaAngka4"])/($response["CountCuacaAngka1"] + $response["CountCuacaAngka2"] + $response["CountCuacaAngka3"] + $response["CountCuacaAngka4"]);

                //== AVERAGE RATA-RATA ==//
				$response["suhuAVE"] = ($response["AngkasuhuMIN"]+$response["AngkasuhuMAX"])*0.5;
				$response["kelembabanAVE"] = ($response["AngkakelembabanMIN"]+$response["AngkakelembabanMAX"])*0.5;

				//== P A D I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 24) {
					$response["paramSuhu"] = 1;
				}else if($response["suhuAVE"] >= 24 && $response["suhuAVE"] <= 26){
					$response["paramSuhu"] = 2;
				}else if($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 29){
					$response["paramSuhu"] = 3;
				}else if($response["suhuAVE"] >= 29 && $response["suhuAVE"] <= 31){
					$response["paramSuhu"] = 4;
				}else if($response["suhuAVE"] >= 31 && $response["suhuAVE"] <= 33){
					$response["paramSuhu"] = 5;
				}

				//== J A G U N G ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu2"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu2"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu2"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu2"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu2"] = 5;
				}

				//== K E D E L A I ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 23 && $response["suhuAVE"] <= 27) {
					$response["paramSuhu3"] = 1;
				}else if($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 23){
					$response["paramSuhu3"] = 2;
				}else if($response["suhuAVE"] >= 27 && $response["suhuAVE"] <= 30){
					$response["paramSuhu3"] = 3;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 34){
					$response["paramSuhu3"] = 4;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu3"] = 5;
				}

				//== T E M B A K A U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 21 && $response["suhuAVE"] <= 32) {
					$response["paramSuhu4"] = 1;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 33){
					$response["paramSuhu4"] = 2;
				}else if($response["suhuAVE"] >= 33 && $response["suhuAVE"] <= 36){
					$response["paramSuhu4"] = 3;
				}else if($response["suhuAVE"] >= 36 && $response["suhuAVE"] <= 38){
					$response["paramSuhu4"] = 4;
				}else if($response["suhuAVE"] >= 38 && $response["suhuAVE"] <= 40){
					$response["paramSuhu4"] = 5;
				}

				//== T E B U ==//

				//== PENENTUAN PARAMETER K-1 ==//
				if ($response["suhuAVE"] >= 26 && $response["suhuAVE"] <= 30) {
					$response["paramSuhu5"] = 1;
				}else if($response["suhuAVE"] >= 30 && $response["suhuAVE"] <= 32){
					$response["paramSuhu5"] = 2;
				}else if($response["suhuAVE"] >= 32 && $response["suhuAVE"] <= 34){
					$response["paramSuhu5"] = 3;
				}else if($response["suhuAVE"] >= 34 && $response["suhuAVE"] <= 40){
					$response["paramSuhu5"] = 4;
				}else if($response["suhuAVE"] <= 26){
					$response["paramSuhu5"] = 5;
				}

				//== PENENTUAN PARAMETER K-2 ==//
				//== P A D I ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 86) {
					$response["paramKelembaban"] = 1;
				}else if($response["kelembabanAVE"] >= 86 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban"] = 3;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban"] = 4;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== J A G O N G ==//
				if ($response["kelembabanAVE"] >= 76 && $response["kelembabanAVE"] <= 83) {
					$response["paramKelembaban2"] = 1;
				}else if($response["kelembabanAVE"] >= 83 && $response["kelembabanAVE"] <= 90){
					$response["paramKelembaban2"] = 2;
				}else if($response["kelembabanAVE"] >= 70 && $response["kelembabanAVE"] <= 76){
					$response["paramKelembaban2"] = 3;
				}else if($response["kelembabanAVE"] >= 90){
					$response["paramKelembaban2"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban2"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== K E D E L A I ==//
				if ($response["kelembabanAVE"] >= 75 && $response["kelembabanAVE"] <= 90) {
					$response["paramKelembaban3"] = 1;
				}else if($response["kelembabanAVE"] >= 90 && $response["kelembabanAVE"] <= 100){
					$response["paramKelembaban3"] = 2;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 75){
					$response["paramKelembaban3"] = 3;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 65){
					$response["paramKelembaban3"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban3"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E M B A K A U ==//
				if ($response["kelembabanAVE"] >= 60 && $response["kelembabanAVE"] <= 80) {
					$response["paramKelembaban4"] = 1;
				}else if($response["kelembabanAVE"] >= 80 && $response["kelembabanAVE"] <= 88){
					$response["paramKelembaban4"] = 2;
				}else if($response["kelembabanAVE"] >= 55 && $response["kelembabanAVE"] <= 60){
					$response["paramKelembaban4"] = 3;
				}else if($response["kelembabanAVE"] >= 88){
					$response["paramKelembaban4"] = 4;
				}else if($response["kelembabanAVE"] <= 55){
					$response["paramKelembaban4"] = 5;
				}
				//== PENENTUAN PARAMETER K-2 ==//
				//== T E B U ==//
				if ($response["kelembabanAVE"] >= 45 && $response["kelembabanAVE"] <= 65) {
					$response["paramKelembaban5"] = 1;
				}else if($response["kelembabanAVE"] >= 40 && $response["kelembabanAVE"] <= 45){
					$response["paramKelembaban5"] = 2;
				}else if($response["kelembabanAVE"] <= 40){
					$response["paramKelembaban5"] = 3;
				}else if($response["kelembabanAVE"] >= 65 && $response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 4;
				}else if($response["kelembabanAVE"] <= 70){
					$response["paramKelembaban5"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== P A D I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 370){
					$response["paramCuaca"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 371 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 451 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== J A G U N G ==//
				if ($response["cuacaAngkaTotal"] >= 85 && $response["cuacaAngkaTotal"] <= 200) {
					$response["paramCuaca2"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 250){
					$response["paramCuaca2"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 251 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca2"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca2"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 450){
					$response["paramCuaca2"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== K E D E L A I ==//
				if ($response["cuacaAngkaTotal"] >= 100 && $response["cuacaAngkaTotal"] <= 400) {
					$response["paramCuaca3"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 401 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca3"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 550){
					$response["paramCuaca3"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 551 && $response["cuacaAngkaTotal"] <= 650){
					$response["paramCuaca3"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 651 && $response["cuacaAngkaTotal"] <= 750){
					$response["paramCuaca3"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E M B A K A U ==//
				if ($response["cuacaAngkaTotal"] >= 125 && $response["cuacaAngkaTotal"] <= 167) {
					$response["paramCuaca4"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 168 && $response["cuacaAngkaTotal"] <= 200){
					$response["paramCuaca4"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 201 && $response["cuacaAngkaTotal"] <= 267){
					$response["paramCuaca4"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 268 && $response["cuacaAngkaTotal"] <= 350){
					$response["paramCuaca4"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 351 && $response["cuacaAngkaTotal"] <= 400){
					$response["paramCuaca4"] = 5;
				}

				//== PENENTUAN PARAMETER K-3 ==//
				//== T E B U ==//
				if ($response["cuacaAngkaTotal"] >= 142 && $response["cuacaAngkaTotal"] <= 208) {
					$response["paramCuaca5"] = 1;
				}else if($response["cuacaAngkaTotal"] >= 209 && $response["cuacaAngkaTotal"] <= 300){
					$response["paramCuaca5"] = 2;
				}else if($response["cuacaAngkaTotal"] >= 301 && $response["cuacaAngkaTotal"] <= 500){
					$response["paramCuaca5"] = 3;
				}else if($response["cuacaAngkaTotal"] >= 501 && $response["cuacaAngkaTotal"] <= 700){
					$response["paramCuaca5"] = 4;
				}else if($response["cuacaAngkaTotal"] >= 701 && $response["cuacaAngkaTotal"] <= 800){
					$response["paramCuaca5"] = 5;
				}

				//== UTILITY DAN NORMALISASI ==//

				$cmaxSuhu = 5;
				$cminSuhu = 1;
				$response["normalisasiSuhu"] = 0.2;
				$response["utilitySuhu"] = ($cmaxSuhu-$response["paramSuhu"])/($cmaxSuhu-$cminSuhu);

				$cmaxKelembaban = 5;
				$cminKelembaban = 1;
				$response["normalisasiKelembaban"] = 0.1;
				$response["utilityKelembaban"] = ($cmaxKelembaban-$response["paramKelembaban"])/($cmaxKelembaban-$cminKelembaban);

				$cmaxCuaca = 5;
				$cminCuaca = 1;
				$response["normalisasiCuaca"] = 0.3;
				$response["utilityCuaca"] = ($cmaxCuaca-$response["paramCuaca"])/($cmaxCuaca-$cminCuaca);
            }
        } 
        else {
            return json_encode($response["error"]);
        }


        return view('rekomendasi.index', compact('response'));
    }
}
