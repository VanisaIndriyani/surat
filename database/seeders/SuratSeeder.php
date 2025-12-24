<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suratData = [];

        // Sample data for Surat Masuk
        $suratMasukData = [
            [
                'nomor_surat' => '123121',
                'nomor_agenda' => '13123',
                'perihal' => 'Pengaduan pelayanan',
                'tanggal' => '2025-06-16',
                'pengirim' => 'Antan',
                'bagian' => 'Umum',
                'keterangan' => 'adsad',
                'jenis' => 'masuk'
            ],
            [
                'nomor_surat' => '001/2025/UM',
                'nomor_agenda' => '001/2025',
                'perihal' => 'Undangan Rapat Koordinasi',
                'tanggal' => '2025-01-15',
                'pengirim' => 'Dinas Pendidikan',
                'bagian' => 'Umum',
                'keterangan' => 'Undangan rapat koordinasi bulanan',
                'jenis' => 'masuk'
            ],
            [
                'nomor_surat' => '002/2025/KEU',
                'nomor_agenda' => '002/2025',
                'perihal' => 'Laporan Keuangan Triwulan',
                'tanggal' => '2025-01-20',
                'pengirim' => 'Badan Pengelola Keuangan',
                'bagian' => 'Keuangan',
                'keterangan' => 'Laporan keuangan triwulan IV tahun 2024',
                'jenis' => 'masuk'
            ],
            [
                'nomor_surat' => '003/2025/SDM',
                'nomor_agenda' => '003/2025',
                'perihal' => 'Pengajuan Cuti Tahunan',
                'tanggal' => '2025-01-25',
                'pengirim' => 'Badan Kepegawaian Negara',
                'bagian' => 'SDM',
                'keterangan' => 'Pengajuan cuti tahunan pegawai',
                'jenis' => 'masuk'
            ],
            [
                'nomor_surat' => '004/2025/IT',
                'nomor_agenda' => '004/2025',
                'perihal' => 'Maintenance Sistem Informasi',
                'tanggal' => '2025-01-30',
                'pengirim' => 'Dinas Komunikasi dan Informatika',
                'bagian' => 'IT',
                'keterangan' => 'Jadwal maintenance sistem informasi',
                'jenis' => 'masuk'
            ]
        ];

        // Sample data for Surat Keluar
        $suratKeluarData = [
            [
                'nomor_surat' => '001/2025/OUT',
                'nomor_agenda' => '001/2025/OUT',
                'perihal' => 'Balasan Undangan Rapat',
                'tanggal' => '2025-01-16',
                'pengirim' => 'Kepala Bagian Umum',
                'bagian' => 'Umum',
                'keterangan' => 'Konfirmasi kehadiran rapat koordinasi',
                'jenis' => 'keluar'
            ],
            [
                'nomor_surat' => '002/2025/OUT',
                'nomor_agenda' => '002/2025/OUT',
                'perihal' => 'Permohonan Dana Operasional',
                'tanggal' => '2025-01-22',
                'pengirim' => 'Kepala Bagian Keuangan',
                'bagian' => 'Keuangan',
                'keterangan' => 'Permohonan dana operasional bulan Februari',
                'jenis' => 'keluar'
            ],
            [
                'nomor_surat' => '003/2025/OUT',
                'nomor_agenda' => '003/2025/OUT',
                'perihal' => 'Laporan Kinerja Bulanan',
                'tanggal' => '2025-01-28',
                'pengirim' => 'Kepala Bagian SDM',
                'bagian' => 'SDM',
                'keterangan' => 'Laporan kinerja bulan Januari 2025',
                'jenis' => 'keluar'
            ],
            [
                'nomor_surat' => '004/2025/OUT',
                'nomor_agenda' => '004/2025/OUT',
                'perihal' => 'Permohonan Upgrade Sistem',
                'tanggal' => '2025-02-01',
                'pengirim' => 'Kepala Bagian IT',
                'bagian' => 'IT',
                'keterangan' => 'Permohonan upgrade sistem database',
                'jenis' => 'keluar'
            ],
            [
                'nomor_surat' => '005/2025/OUT',
                'nomor_agenda' => '005/2025/OUT',
                'perihal' => 'Undangan Pelatihan',
                'tanggal' => '2025-02-05',
                'pengirim' => 'Kepala Bagian Marketing',
                'bagian' => 'Marketing',
                'keterangan' => 'Undangan pelatihan digital marketing',
                'jenis' => 'keluar'
            ]
        ];

        // Combine all data
        $allData = array_merge($suratMasukData, $suratKeluarData);

        foreach ($allData as $data) {
            $suratData[] = [
                'nomor_surat' => $data['nomor_surat'],
                'nomor_agenda' => $data['nomor_agenda'],
                'perihal' => $data['perihal'],
                'tanggal' => $data['tanggal'],
                'pengirim' => $data['pengirim'],
                'bagian' => $data['bagian'],
                'keterangan' => $data['keterangan'],
                'file_path' => null,
                'jenis' => $data['jenis'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('surats')->insert($suratData);
    }
}
