<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentSetting;

class ContentSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // Brand/Logo Section
            ['key' => 'brand_name', 'section' => 'brand', 'value' => 'Ponpes Digital', 'type' => 'text', 'label' => 'Nama Brand', 'order' => 1],
            ['key' => 'brand_tagline', 'section' => 'brand', 'value' => 'Sistem Manajemen Modern', 'type' => 'text', 'label' => 'Tagline', 'order' => 2],
            ['key' => 'brand_logo_url', 'section' => 'brand', 'value' => '', 'type' => 'image', 'label' => 'Logo URL (kosong = icon default)', 'order' => 3],
            
            // Contact Section (Top Bar)
            ['key' => 'contact_phone', 'section' => 'contact', 'value' => '+62 812 3456 7890', 'type' => 'text', 'label' => 'Nomor Telepon', 'order' => 1],
            ['key' => 'contact_email', 'section' => 'contact', 'value' => 'info@ponpes.id', 'type' => 'text', 'label' => 'Email', 'order' => 2],
            ['key' => 'contact_address', 'section' => 'contact', 'value' => 'Jl. Pesantren No. 123, Kota', 'type' => 'text', 'label' => 'Alamat', 'order' => 3],
            ['key' => 'social_facebook', 'section' => 'contact', 'value' => '#', 'type' => 'text', 'label' => 'Facebook URL', 'order' => 4],
            ['key' => 'social_instagram', 'section' => 'contact', 'value' => '#', 'type' => 'text', 'label' => 'Instagram URL', 'order' => 5],
            ['key' => 'social_youtube', 'section' => 'contact', 'value' => '#', 'type' => 'text', 'label' => 'YouTube URL', 'order' => 6],
            ['key' => 'social_tiktok', 'section' => 'contact', 'value' => '#', 'type' => 'text', 'label' => 'TikTok URL', 'order' => 7],
            
            // Hero Slide 1
            ['key' => 'hero1_badge', 'section' => 'hero', 'value' => 'Selamat Datang di Pondok Pesantren', 'type' => 'text', 'label' => 'Slide 1 - Badge', 'order' => 1],
            ['key' => 'hero1_title', 'section' => 'hero', 'value' => 'Mencetak Generasi Qurani, Berilmu & Berakhlak Mulia', 'type' => 'text', 'label' => 'Slide 1 - Judul', 'order' => 2],
            ['key' => 'hero1_subtitle', 'section' => 'hero', 'value' => 'Memadukan kurikulum pesantren salafiyah dengan pendidikan modern untuk menghasilkan lulusan yang unggul dalam IMTAQ dan IPTEK.', 'type' => 'textarea', 'label' => 'Slide 1 - Deskripsi', 'order' => 3],
            ['key' => 'hero1_image', 'section' => 'hero', 'value' => '', 'type' => 'image', 'label' => 'Slide 1 - Gambar Background', 'order' => 4],
            
            // Hero Slide 2
            ['key' => 'hero2_badge', 'section' => 'hero', 'value' => 'Pendidikan Berkualitas', 'type' => 'text', 'label' => 'Slide 2 - Badge', 'order' => 5],
            ['key' => 'hero2_title', 'section' => 'hero', 'value' => '8 Lembaga Pendidikan Terintegrasi', 'type' => 'text', 'label' => 'Slide 2 - Judul', 'order' => 6],
            ['key' => 'hero2_subtitle', 'section' => 'hero', 'value' => 'Dari Madrasah Diniyah hingga Perguruan Tinggi, kami menyediakan pendidikan komprehensif yang memadukan ilmu agama dan umum.', 'type' => 'textarea', 'label' => 'Slide 2 - Deskripsi', 'order' => 7],
            ['key' => 'hero2_image', 'section' => 'hero', 'value' => '', 'type' => 'image', 'label' => 'Slide 2 - Gambar Background', 'order' => 8],
            
            // Hero Slide 3
            ['key' => 'hero3_badge', 'section' => 'hero', 'value' => 'Program Unggulan', 'type' => 'text', 'label' => 'Slide 3 - Badge', 'order' => 9],
            ['key' => 'hero3_title', 'section' => 'hero', 'value' => 'Program Tahfidz Quran Intensif', 'type' => 'text', 'label' => 'Slide 3 - Judul', 'order' => 10],
            ['key' => 'hero3_subtitle', 'section' => 'hero', 'value' => 'Hafal Al-Quran 30 Juz dengan metode modern dan bimbingan ustadz berpengalaman. Target 2-3 tahun dengan sanad yang tersambung.', 'type' => 'textarea', 'label' => 'Slide 3 - Deskripsi', 'order' => 11],
            ['key' => 'hero3_image', 'section' => 'hero', 'value' => '', 'type' => 'image', 'label' => 'Slide 3 - Gambar Background', 'order' => 12],
            
            // Stats Section
            ['key' => 'stats_santri', 'section' => 'stats', 'value' => '1500+', 'type' => 'text', 'label' => 'Jumlah Santri', 'order' => 1],
            ['key' => 'stats_ustadz', 'section' => 'stats', 'value' => '100+', 'type' => 'text', 'label' => 'Jumlah Ustadz', 'order' => 2],
            ['key' => 'stats_years', 'section' => 'stats', 'value' => '50+', 'type' => 'text', 'label' => 'Tahun Berdiri', 'order' => 3],
            
            // Profile/Sambutan Section
            ['key' => 'profile_name', 'section' => 'profile', 'value' => 'KH. Muhammad Abdullah', 'type' => 'text', 'label' => 'Nama Ketua Yayasan', 'order' => 1],
            ['key' => 'profile_title', 'section' => 'profile', 'value' => 'Ketua Yayasan', 'type' => 'text', 'label' => 'Jabatan', 'order' => 2],
            ['key' => 'profile_image', 'section' => 'profile', 'value' => '', 'type' => 'image', 'label' => 'Foto Profil URL (kosong = icon default)', 'order' => 3],
            ['key' => 'profile_quote', 'section' => 'profile', 'value' => 'Dengan Ilmu Hidup Jadi Mudah, Dengan Agama Hidup Jadi Terarah', 'type' => 'text', 'label' => 'Kutipan', 'order' => 4],
            ['key' => 'profile_message1', 'section' => 'profile', 'value' => "Assalamu'alaikum warahmatullahi wabarakatuh. Segala puji bagi Allah SWT yang telah memberikan kekuatan dan keistiqamahan dalam perjuangan pendidikan dan dakwah Islam.", 'type' => 'textarea', 'label' => 'Sambutan Paragraf 1', 'order' => 5],
            ['key' => 'profile_message2', 'section' => 'profile', 'value' => 'Pondok Pesantren kami merupakan amanah besar dalam melanjutkan perjuangan para ulama pendahulu. Kami mengajak seluruh elemen masyarakat untuk terus bersinergi dan mendukung perjuangan ini.', 'type' => 'textarea', 'label' => 'Sambutan Paragraf 2', 'order' => 6],
            
            // News Section
            ['key' => 'news1_title', 'section' => 'news', 'value' => 'Pembukaan Pendaftaran Santri Baru Tahun Ajaran 2025/2026', 'type' => 'text', 'label' => 'Berita 1 - Judul', 'order' => 1],
            ['key' => 'news1_desc', 'section' => 'news', 'value' => 'Pondok Pesantren membuka pendaftaran santri baru untuk tahun ajaran mendatang...', 'type' => 'textarea', 'label' => 'Berita 1 - Deskripsi', 'order' => 2],
            ['key' => 'news1_date', 'section' => 'news', 'value' => '15 Des 2025', 'type' => 'text', 'label' => 'Berita 1 - Tanggal', 'order' => 3],
            ['key' => 'news1_image', 'section' => 'news', 'value' => '', 'type' => 'image', 'label' => 'Berita 1 - Gambar URL', 'order' => 4],
            
            ['key' => 'news2_title', 'section' => 'news', 'value' => 'Santri Raih Juara 1 Musabaqah Tilawatil Quran Nasional', 'type' => 'text', 'label' => 'Berita 2 - Judul', 'order' => 5],
            ['key' => 'news2_desc', 'section' => 'news', 'value' => 'Prestasi membanggakan diraih santri kami dalam ajang MTQ Nasional...', 'type' => 'textarea', 'label' => 'Berita 2 - Deskripsi', 'order' => 6],
            ['key' => 'news2_date', 'section' => 'news', 'value' => '10 Des 2025', 'type' => 'text', 'label' => 'Berita 2 - Tanggal', 'order' => 7],
            ['key' => 'news2_image', 'section' => 'news', 'value' => '', 'type' => 'image', 'label' => 'Berita 2 - Gambar URL', 'order' => 8],
            
            ['key' => 'news3_title', 'section' => 'news', 'value' => 'Peringatan Maulid Nabi Muhammad SAW 1447 H', 'type' => 'text', 'label' => 'Berita 3 - Judul', 'order' => 9],
            ['key' => 'news3_desc', 'section' => 'news', 'value' => 'Pesantren mengadakan rangkaian acara peringatan Maulid Nabi...', 'type' => 'textarea', 'label' => 'Berita 3 - Deskripsi', 'order' => 10],
            ['key' => 'news3_date', 'section' => 'news', 'value' => '5 Des 2025', 'type' => 'text', 'label' => 'Berita 3 - Tanggal', 'order' => 11],
            ['key' => 'news3_image', 'section' => 'news', 'value' => '', 'type' => 'image', 'label' => 'Berita 3 - Gambar URL', 'order' => 12],
            ['key' => 'news3_url', 'section' => 'news', 'value' => '#', 'type' => 'text', 'label' => 'Berita 3 - Link URL', 'order' => 13],
            
            // News URL fields (for linking to social media/original source)
            ['key' => 'news1_url', 'section' => 'news', 'value' => '#', 'type' => 'text', 'label' => 'Berita 1 - Link URL (sosmed/sumber)', 'order' => 14],
            ['key' => 'news2_url', 'section' => 'news', 'value' => '#', 'type' => 'text', 'label' => 'Berita 2 - Link URL (sosmed/sumber)', 'order' => 15],
            
            // Lembaga Section Header
            ['key' => 'lembaga_title', 'section' => 'lembaga', 'value' => 'Lembaga Pendidikan di Bawah Naungan Yayasan', 'type' => 'text', 'label' => 'Judul Section Lembaga', 'order' => 1],
            ['key' => 'lembaga_subtitle', 'section' => 'lembaga', 'value' => 'Berbagai jenjang pendidikan yang memadukan kurikulum nasional dengan pendidikan keislaman', 'type' => 'textarea', 'label' => 'Deskripsi Section Lembaga', 'order' => 2],
            
            // Lembaga 1 - Pondok Pesantren
            ['key' => 'lembaga1_title', 'section' => 'lembaga', 'value' => 'Pondok Pesantren', 'type' => 'text', 'label' => 'Lembaga 1 - Judul', 'order' => 3],
            ['key' => 'lembaga1_desc', 'section' => 'lembaga', 'value' => 'Lembaga pendidikan Islam klasik untuk santri putra dan putri dengan sistem asrama', 'type' => 'textarea', 'label' => 'Lembaga 1 - Deskripsi', 'order' => 4],
            ['key' => 'lembaga1_icon', 'section' => 'lembaga', 'value' => 'fa-mosque', 'type' => 'text', 'label' => 'Lembaga 1 - Icon (FontAwesome)', 'order' => 5],
            ['key' => 'lembaga1_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 1 - Gambar', 'order' => 6],
            
            // Lembaga 2 - MI (Madrasah Ibtidaiyah)
            ['key' => 'lembaga2_title', 'section' => 'lembaga', 'value' => 'Madrasah Ibtidaiyah (MI)', 'type' => 'text', 'label' => 'Lembaga 2 - Judul', 'order' => 7],
            ['key' => 'lembaga2_desc', 'section' => 'lembaga', 'value' => 'Pendidikan dasar Islam setara SD dengan kurikulum nasional dan keislaman', 'type' => 'textarea', 'label' => 'Lembaga 2 - Deskripsi', 'order' => 8],
            ['key' => 'lembaga2_icon', 'section' => 'lembaga', 'value' => 'fa-child', 'type' => 'text', 'label' => 'Lembaga 2 - Icon (FontAwesome)', 'order' => 9],
            ['key' => 'lembaga2_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 2 - Gambar', 'order' => 10],
            
            // Lembaga 3 - MA (Madrasah Aliyah)
            ['key' => 'lembaga3_title', 'section' => 'lembaga', 'value' => 'Madrasah Aliyah (MA)', 'type' => 'text', 'label' => 'Lembaga 3 - Judul', 'order' => 11],
            ['key' => 'lembaga3_desc', 'section' => 'lembaga', 'value' => 'Pendidikan menengah atas Islam setara SMA dengan program unggulan', 'type' => 'textarea', 'label' => 'Lembaga 3 - Deskripsi', 'order' => 12],
            ['key' => 'lembaga3_icon', 'section' => 'lembaga', 'value' => 'fa-graduation-cap', 'type' => 'text', 'label' => 'Lembaga 3 - Icon (FontAwesome)', 'order' => 13],
            ['key' => 'lembaga3_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 3 - Gambar', 'order' => 14],
            
            // Lembaga 4 - Majelis Nurul Musthofa
            ['key' => 'lembaga4_title', 'section' => 'lembaga', 'value' => 'Majelis Nurul Musthofa', 'type' => 'text', 'label' => 'Lembaga 4 - Judul', 'order' => 15],
            ['key' => 'lembaga4_desc', 'section' => 'lembaga', 'value' => 'Majelis dzikir dan sholawat untuk menumbuhkan kecintaan kepada Rasulullah SAW', 'type' => 'textarea', 'label' => 'Lembaga 4 - Deskripsi', 'order' => 16],
            ['key' => 'lembaga4_icon', 'section' => 'lembaga', 'value' => 'fa-star-and-crescent', 'type' => 'text', 'label' => 'Lembaga 4 - Icon (FontAwesome)', 'order' => 17],
            ['key' => 'lembaga4_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 4 - Gambar', 'order' => 18],
            
            // Lembaga 5 - Madrasah Diniyah
            ['key' => 'lembaga5_title', 'section' => 'lembaga', 'value' => 'Madrasah Diniyah', 'type' => 'text', 'label' => 'Lembaga 5 - Judul', 'order' => 19],
            ['key' => 'lembaga5_desc', 'section' => 'lembaga', 'value' => 'Pendidikan agama Islam non-formal dengan kajian kitab kuning dan bahasa Arab', 'type' => 'textarea', 'label' => 'Lembaga 5 - Deskripsi', 'order' => 20],
            ['key' => 'lembaga5_icon', 'section' => 'lembaga', 'value' => 'fa-book-quran', 'type' => 'text', 'label' => 'Lembaga 5 - Icon (FontAwesome)', 'order' => 21],
            ['key' => 'lembaga5_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 5 - Gambar', 'order' => 22],
            
            // Lembaga 6 - BPKK
            ['key' => 'lembaga6_title', 'section' => 'lembaga', 'value' => 'Balai Pelatihan Kerja Komunitas', 'type' => 'text', 'label' => 'Lembaga 6 - Judul', 'order' => 23],
            ['key' => 'lembaga6_desc', 'section' => 'lembaga', 'value' => 'Pelatihan keterampilan kerja untuk kemandirian ekonomi santri dan masyarakat', 'type' => 'textarea', 'label' => 'Lembaga 6 - Deskripsi', 'order' => 24],
            ['key' => 'lembaga6_icon', 'section' => 'lembaga', 'value' => 'fa-tools', 'type' => 'text', 'label' => 'Lembaga 6 - Icon (FontAwesome)', 'order' => 25],
            ['key' => 'lembaga6_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 6 - Gambar', 'order' => 26],
            
            // Lembaga 7 - TPQ
            ['key' => 'lembaga7_title', 'section' => 'lembaga', 'value' => 'Taman Pendidikan Al-Quran', 'type' => 'text', 'label' => 'Lembaga 7 - Judul', 'order' => 27],
            ['key' => 'lembaga7_desc', 'section' => 'lembaga', 'value' => 'Pendidikan baca tulis Al-Quran untuk anak-anak dengan metode Iqro', 'type' => 'textarea', 'label' => 'Lembaga 7 - Deskripsi', 'order' => 28],
            ['key' => 'lembaga7_icon', 'section' => 'lembaga', 'value' => 'fa-quran', 'type' => 'text', 'label' => 'Lembaga 7 - Icon (FontAwesome)', 'order' => 29],
            ['key' => 'lembaga7_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 7 - Gambar', 'order' => 30],
            
            // Lembaga 8 - RA
            ['key' => 'lembaga8_title', 'section' => 'lembaga', 'value' => 'Raudhatul Athfal (RA)', 'type' => 'text', 'label' => 'Lembaga 8 - Judul', 'order' => 31],
            ['key' => 'lembaga8_desc', 'section' => 'lembaga', 'value' => 'Taman kanak-kanak Islam dengan pendidikan akhlak dan keterampilan dasar', 'type' => 'textarea', 'label' => 'Lembaga 8 - Deskripsi', 'order' => 32],
            ['key' => 'lembaga8_icon', 'section' => 'lembaga', 'value' => 'fa-baby', 'type' => 'text', 'label' => 'Lembaga 8 - Icon (FontAwesome)', 'order' => 33],
            ['key' => 'lembaga8_image', 'section' => 'lembaga', 'value' => '', 'type' => 'image', 'label' => 'Lembaga 8 - Gambar', 'order' => 34],
            
            // Fasilitas Section Header
            ['key' => 'fasilitas_title', 'section' => 'fasilitas', 'value' => 'Lingkungan Nyaman untuk Menuntut Ilmu', 'type' => 'text', 'label' => 'Judul Section Fasilitas', 'order' => 1],
            ['key' => 'fasilitas_subtitle', 'section' => 'fasilitas', 'value' => 'Fasilitas lengkap untuk mendukung kegiatan belajar dan beribadah', 'type' => 'textarea', 'label' => 'Deskripsi Section Fasilitas', 'order' => 2],
            
            // Fasilitas 1
            ['key' => 'fasilitas1_title', 'section' => 'fasilitas', 'value' => 'Asrama', 'type' => 'text', 'label' => 'Fasilitas 1 - Judul', 'order' => 3],
            ['key' => 'fasilitas1_desc', 'section' => 'fasilitas', 'value' => 'Asrama nyaman dan kondusif untuk santri putra dan putri', 'type' => 'textarea', 'label' => 'Fasilitas 1 - Deskripsi', 'order' => 4],
            ['key' => 'fasilitas1_icon', 'section' => 'fasilitas', 'value' => 'fa-bed', 'type' => 'text', 'label' => 'Fasilitas 1 - Icon (FontAwesome)', 'order' => 5],
            ['key' => 'fasilitas1_image', 'section' => 'fasilitas', 'value' => '', 'type' => 'image', 'label' => 'Fasilitas 1 - Gambar', 'order' => 6],
            
            // Fasilitas 2
            ['key' => 'fasilitas2_title', 'section' => 'fasilitas', 'value' => 'Masjid', 'type' => 'text', 'label' => 'Fasilitas 2 - Judul', 'order' => 7],
            ['key' => 'fasilitas2_desc', 'section' => 'fasilitas', 'value' => 'Masjid megah sebagai pusat ibadah dan kegiatan keislaman', 'type' => 'textarea', 'label' => 'Fasilitas 2 - Deskripsi', 'order' => 8],
            ['key' => 'fasilitas2_icon', 'section' => 'fasilitas', 'value' => 'fa-mosque', 'type' => 'text', 'label' => 'Fasilitas 2 - Icon (FontAwesome)', 'order' => 9],
            ['key' => 'fasilitas2_image', 'section' => 'fasilitas', 'value' => '', 'type' => 'image', 'label' => 'Fasilitas 2 - Gambar', 'order' => 10],
            
            // Fasilitas 3
            ['key' => 'fasilitas3_title', 'section' => 'fasilitas', 'value' => 'Kelas Belajar', 'type' => 'text', 'label' => 'Fasilitas 3 - Judul', 'order' => 11],
            ['key' => 'fasilitas3_desc', 'section' => 'fasilitas', 'value' => 'Ruang kelas modern dengan fasilitas pembelajaran lengkap', 'type' => 'textarea', 'label' => 'Fasilitas 3 - Deskripsi', 'order' => 12],
            ['key' => 'fasilitas3_icon', 'section' => 'fasilitas', 'value' => 'fa-chalkboard', 'type' => 'text', 'label' => 'Fasilitas 3 - Icon (FontAwesome)', 'order' => 13],
            ['key' => 'fasilitas3_image', 'section' => 'fasilitas', 'value' => '', 'type' => 'image', 'label' => 'Fasilitas 3 - Gambar', 'order' => 14],
            
            // Fasilitas 4
            ['key' => 'fasilitas4_title', 'section' => 'fasilitas', 'value' => 'Rumah Sehat', 'type' => 'text', 'label' => 'Fasilitas 4 - Judul', 'order' => 15],
            ['key' => 'fasilitas4_desc', 'section' => 'fasilitas', 'value' => 'Klinik kesehatan untuk layanan medis santri dan warga pesantren', 'type' => 'textarea', 'label' => 'Fasilitas 4 - Deskripsi', 'order' => 16],
            ['key' => 'fasilitas4_icon', 'section' => 'fasilitas', 'value' => 'fa-hospital', 'type' => 'text', 'label' => 'Fasilitas 4 - Icon (FontAwesome)', 'order' => 17],
            ['key' => 'fasilitas4_image', 'section' => 'fasilitas', 'value' => '', 'type' => 'image', 'label' => 'Fasilitas 4 - Gambar', 'order' => 18],
            
            // Footer Section - Complete
            ['key' => 'footer_about', 'section' => 'footer', 'value' => 'Pondok Pesantren Modern adalah lembaga pendidikan Islam terkemuka yang menggabungkan nilai-nilai tradisional dengan pendekatan modern.', 'type' => 'textarea', 'label' => 'Tentang (Footer)', 'order' => 1],
            ['key' => 'footer_address', 'section' => 'footer', 'value' => 'Jl. Pesantren No. 123, Jawa Barat', 'type' => 'text', 'label' => 'Alamat Lengkap', 'order' => 2],
            ['key' => 'footer_map_url', 'section' => 'footer', 'value' => 'https://maps.google.com', 'type' => 'text', 'label' => 'Google Maps URL', 'order' => 3],
            ['key' => 'footer_whatsapp', 'section' => 'footer', 'value' => '6281234567890', 'type' => 'text', 'label' => 'Nomor WhatsApp (tanpa +)', 'order' => 4],
            ['key' => 'footer_tagline', 'section' => 'footer', 'value' => 'Dibuat dengan ❤️ untuk Pendidikan Islam', 'type' => 'text', 'label' => 'Tagline Footer', 'order' => 5],
            ['key' => 'footer_copyright', 'section' => 'footer', 'value' => '© 2025 Pondok Pesantren Digital. All rights reserved.', 'type' => 'text', 'label' => 'Copyright', 'order' => 6],
        ];

        foreach ($settings as $setting) {
            ContentSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
