<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata;
use App\Models\TempatKuliner;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportExcel($tipe)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        if ($tipe == 'wisata') {
            $data = TempatWisata::with(['jamOperasional', 'kategori'])->get();

            // Header kolom
            $sheet->fromArray([
                ['No', 'Nama Wisata', 'Kategori', 'Longitude', 'Latitude', 'Jam Operasional']
            ]);

            $row = 2;
            $no = 1;
            foreach ($data as $item) {
                // Gabungkan jam operasional dengan newline
                $jamOperasional = '';
                if ($item->jamOperasional && $item->jamOperasional->count() > 0) {
                    foreach ($item->jamOperasional as $jam) {
                        $jamOperasional .= "{$jam->hari}: {$jam->jam_buka}-{$jam->jam_tutup}\n";
                    }
                    $jamOperasional = trim($jamOperasional);
                } else {
                    $jamOperasional = 'Libur';
                }

                // Isi data ke Excel
                $sheet->setCellValue("A$row", $no++);
                $sheet->setCellValue("B$row", $item->nama_wisata);
                $sheet->setCellValue("C$row", $item->kategori->nama_kategori ?? '-');
                $sheet->setCellValue("D$row", $item->longitude);
                $sheet->setCellValue("E$row", $item->latitude);
                $sheet->setCellValue("F$row", $jamOperasional);

                // Aktifkan wrap text biar newline tampil
                $sheet->getStyle("F$row")->getAlignment()->setWrapText(true);

                $row++;
            }

            $filename = "Data_Tempat_Wisata_" . date('Ymd_His') . ".xlsx";
        }

        elseif ($tipe == 'kuliner') {
            $data = TempatKuliner::all();

            $sheet->fromArray([
                ['No', 'Nama Usaha', 'Pemilik', 'Tahun Berdiri', 'Lokasi', 'Kategori Utama', 'Menu Unggulan', 'Fasilitas', 'Kepatuhan Operasional', 'Latitude', 'Longitude']
            ]);

            $row = 2;
            $no = 1;
            foreach ($data as $item) {
                $sheet->setCellValue("A$row", $no++);
                $sheet->setCellValue("B$row", $item->nama_usaha);
                $sheet->setCellValue("C$row", $item->nama_pemilik);
                $sheet->setCellValue("D$row", $item->tahun_berdiri);
                $sheet->setCellValue("E$row", $item->lokasi_lengkap);
                $sheet->setCellValue("F$row", $item->kategori_utama);
                $sheet->setCellValue("G$row", $item->menu_unggulan);
                $sheet->setCellValue("H$row", $item->fasilitas);
                $sheet->setCellValue("I$row", $item->kepatuhan_operasional);
                $sheet->setCellValue("J$row", $item->latitude);
                $sheet->setCellValue("K$row", $item->longitude);
                $row++;
            }

            $filename = "Data_Tempat_Kuliner_" . date('Ymd_His') . ".xlsx";
        }

        else {
            return abort(404, 'Tipe export tidak dikenal.');
        }

        // Auto width biar rapi
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Output file ke browser
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $writer->save('php://output');
        exit;
    }
}
