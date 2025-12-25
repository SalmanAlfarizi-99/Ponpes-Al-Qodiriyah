<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InfoPage;

class InfoPageSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'title' => 'Jadwal Pelajaran',
                'slug' => 'jadwal-pelajaran',
                'icon' => 'fas fa-calendar-alt',
                'category' => 'academic',
                'order' => 1,
                'content' => '
<h2>Jadwal Pelajaran Pondok Pesantren</h2>

<p>Berikut adalah jadwal pelajaran yang berlaku di pondok pesantren kami. Jadwal ini mencakup pelajaran agama dan umum yang disesuaikan dengan kurikulum nasional dan kurikulum pesantren.</p>

<h3>Jadwal Harian</h3>
<table>
    <tr>
        <th>Waktu</th>
        <th>Kegiatan</th>
        <th>Keterangan</th>
    </tr>
    <tr>
        <td>04:00 - 05:00</td>
        <td>Sholat Subuh & Mengaji</td>
        <td>Wajib</td>
    </tr>
    <tr>
        <td>05:00 - 06:30</td>
        <td>Tahfidz Al-Quran</td>
        <td>Wajib</td>
    </tr>
    <tr>
        <td>07:00 - 12:00</td>
        <td>Pelajaran Formal</td>
        <td>Sekolah</td>
    </tr>
    <tr>
        <td>12:00 - 13:00</td>
        <td>Sholat Dzuhur & Istirahat</td>
        <td>Wajib</td>
    </tr>
    <tr>
        <td>13:00 - 15:00</td>
        <td>Pelajaran Diniyah</td>
        <td>Wajib</td>
    </tr>
    <tr>
        <td>15:00 - 17:00</td>
        <td>Kegiatan Ekstrakurikuler</td>
        <td>Pilihan</td>
    </tr>
    <tr>
        <td>18:00 - 19:30</td>
        <td>Sholat Maghrib & Mengaji</td>
        <td>Wajib</td>
    </tr>
    <tr>
        <td>19:30 - 21:00</td>
        <td>Belajar Mandiri</td>
        <td>Wajib</td>
    </tr>
</table>

<h3>Mata Pelajaran</h3>
<ul>
    <li><strong>Pelajaran Agama:</strong> Al-Quran, Hadits, Fiqih, Aqidah Akhlak, SKI, Bahasa Arab</li>
    <li><strong>Pelajaran Umum:</strong> Matematika, IPA, IPS, Bahasa Indonesia, Bahasa Inggris</li>
    <li><strong>Pelajaran Diniyah:</strong> Nahwu Shorof, Tajwid, Tafsir, Ushul Fiqih</li>
</ul>
',
            ],
            [
                'title' => 'Kegiatan Pesantren',
                'slug' => 'kegiatan-pesantren',
                'icon' => 'fas fa-mosque',
                'category' => 'activity',
                'order' => 2,
                'content' => '
<h2>Kegiatan Pondok Pesantren</h2>

<p>Pondok pesantren kami menyelenggarakan berbagai kegiatan untuk membentuk karakter santri yang berakhlak mulia dan berprestasi.</p>

<h3>Kegiatan Harian</h3>
<ul>
    <li>Sholat berjamaah 5 waktu</li>
    <li>Tahfidz Al-Quran</li>
    <li>Kajian kitab kuning</li>
    <li>Pembelajaran formal</li>
</ul>

<h3>Kegiatan Mingguan</h3>
<ul>
    <li>Muhadharah (latihan pidato)</li>
    <li>Yasinan bersama</li>
    <li>Olahraga dan kebersihan</li>
    <li>Ekstrakurikuler</li>
</ul>

<h3>Kegiatan Bulanan</h3>
<ul>
    <li>Evaluasi hafalan</li>
    <li>Pertemuan wali santri</li>
    <li>Bakti sosial</li>
</ul>

<h3>Kegiatan Tahunan</h3>
<ul>
    <li>Wisuda tahfidz</li>
    <li>Haflah akhirussanah</li>
    <li>Pesantren kilat Ramadhan</li>
    <li>Kunjungan edukatif</li>
    <li>Perlombaan antar santri</li>
</ul>
',
            ],
            [
                'title' => 'Biaya Pendaftaran',
                'slug' => 'biaya-pendaftaran',
                'icon' => 'fas fa-money-bill-wave',
                'category' => 'financial',
                'order' => 3,
                'content' => '
<h2>Informasi Biaya Pendaftaran</h2>

<p>Berikut adalah rincian biaya pendaftaran dan biaya bulanan untuk santri baru di pondok pesantren kami.</p>

<h3>Biaya Pendaftaran (Satu Kali)</h3>
<table>
    <tr>
        <th>Komponen</th>
        <th>Biaya</th>
    </tr>
    <tr>
        <td>Formulir Pendaftaran</td>
        <td>Rp 100.000</td>
    </tr>
    <tr>
        <td>Uang Pangkal</td>
        <td>Rp 3.000.000</td>
    </tr>
    <tr>
        <td>Seragam (3 stel)</td>
        <td>Rp 750.000</td>
    </tr>
    <tr>
        <td>Perlengkapan Asrama</td>
        <td>Rp 500.000</td>
    </tr>
    <tr>
        <td>Buku & Kitab</td>
        <td>Rp 400.000</td>
    </tr>
    <tr>
        <td><strong>Total</strong></td>
        <td><strong>Rp 4.750.000</strong></td>
    </tr>
</table>

<h3>Biaya Bulanan</h3>
<table>
    <tr>
        <th>Komponen</th>
        <th>Biaya</th>
    </tr>
    <tr>
        <td>SPP Pendidikan</td>
        <td>Rp 800.000</td>
    </tr>
    <tr>
        <td>Biaya Asrama</td>
        <td>Rp 400.000</td>
    </tr>
    <tr>
        <td>Biaya Makan</td>
        <td>Rp 600.000</td>
    </tr>
    <tr>
        <td><strong>Total Bulanan</strong></td>
        <td><strong>Rp 1.800.000</strong></td>
    </tr>
</table>

<h3>Catatan</h3>
<ul>
    <li>Tersedia beasiswa untuk santri berprestasi dan kurang mampu</li>
    <li>Pembayaran dapat dicicil maksimal 3 kali</li>
    <li>Biaya dapat berubah sesuai kebijakan yayasan</li>
</ul>
',
            ],
            [
                'title' => 'Fasilitas Pesantren',
                'slug' => 'fasilitas-pesantren',
                'icon' => 'fas fa-building',
                'category' => 'facility',
                'order' => 4,
                'content' => '
<h2>Fasilitas Pondok Pesantren</h2>

<p>Kami menyediakan fasilitas lengkap untuk mendukung kegiatan belajar mengajar dan kenyamanan santri.</p>

<h3>Fasilitas Utama</h3>
<ul>
    <li><strong>Masjid:</strong> Masjid utama dengan kapasitas 500 jamaah</li>
    <li><strong>Asrama Putra:</strong> 20 kamar dengan kapasitas 10 santri per kamar</li>
    <li><strong>Asrama Putri:</strong> 15 kamar dengan kapasitas 10 santri per kamar</li>
    <li><strong>Gedung Sekolah:</strong> 24 ruang kelas ber-AC</li>
    <li><strong>Laboratorium:</strong> Lab IPA, Lab Komputer, Lab Bahasa</li>
</ul>

<h3>Fasilitas Pendukung</h3>
<ul>
    <li>Perpustakaan dengan 5000+ koleksi buku</li>
    <li>Lapangan olahraga (futsal, basket, voli)</li>
    <li>Aula serbaguna</li>
    <li>Koperasi santri</li>
    <li>Kantin</li>
    <li>Klinik kesehatan</li>
    <li>Wifi area</li>
</ul>
',
            ],
            [
                'title' => 'Tentang Pesantren',
                'slug' => 'tentang-pesantren',
                'icon' => 'fas fa-info-circle',
                'category' => 'general',
                'order' => 5,
                'content' => '
<h2>Tentang Pondok Pesantren</h2>

<p>Pondok Pesantren Digital merupakan lembaga pendidikan Islam yang memadukan kurikulum pesantren tradisional dengan pendidikan modern.</p>

<h3>Visi</h3>
<p>Menjadi pondok pesantren unggulan yang mencetak generasi Qurani, berilmu, berakhlak mulia, dan berdaya saing global.</p>

<h3>Misi</h3>
<ul>
    <li>Menyelenggarakan pendidikan Islam yang berkualitas</li>
    <li>Membentuk santri yang hafal Al-Quran</li>
    <li>Mengembangkan kemampuan akademik dan non-akademik</li>
    <li>Menanamkan nilai-nilai akhlakul karimah</li>
    <li>Mempersiapkan santri menghadapi tantangan zaman</li>
</ul>

<h3>Sejarah Singkat</h3>
<p>Didirikan pada tahun 2010, Pondok Pesantren Digital telah menghasilkan ribuan alumni yang tersebar di berbagai bidang. Pesantren ini menerapkan sistem pendidikan holistik yang mengintegrasikan ilmu agama dan ilmu pengetahuan modern.</p>

<h3>Akreditasi</h3>
<ul>
    <li>MTs: Akreditasi A</li>
    <li>MA: Akreditasi A</li>
    <li>SMK: Akreditasi A</li>
</ul>
',
            ],
        ];

        foreach ($pages as $page) {
            InfoPage::updateOrCreate(
                ['slug' => $page['slug']],
                array_merge($page, ['is_active' => true, 'show_in_menu' => true])
            );
        }
    }
}
