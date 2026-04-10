<?php
// Memanggil file autoload dari composer agar library bisa digunakan
require_once 'vendor/autoload.php';

// Inisialisasi variabel untuk menampung pesan status (berhasil/gagal)
$message = '';
// Inisialisasi variabel untuk tipe pesan (success/error) untuk styling CSS
$messageType = '';

// Mengecek apakah ada request POST dan file dengan name 'my_file' telah dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['my_file'])) {
    
    // 1. Inisialisasi Storage (menentukan ke folder mana file akan disimpan)
    // __DIR__ . '/uploads' artinya file akan disimpan di folder 'uploads' di direktori yang sama dengan file ini
    $storage = new \Upload\Storage\FileSystem(__DIR__ . '/uploads');
    
    // 2. Membuat objek File
    // 'my_file' adalah nama (name) dari input type file di dalam form HTML
    // $storage adalah objek penyimpanan yang sudah dibuat sebelumnya
    $file = new \Upload\File('my_file', $storage);

    // 3. (Opsional) Mengubah nama file saat diupload
    // Jika baris di bawah diaktifkan, nama file asli akan diganti
    // $file->setName('nama_baru');

    // 4. Menambahkan Aturan Validasi
    $file->addValidations(array(
        // Validasi Mimetype: Memastikan file yang diupload adalah gambar (jpg, png, atau gif)
        new \Upload\Validation\Mimetype(array('image/jpeg', 'image/png', 'image/gif')),

        // Validasi Ukuran: Memastikan ukuran file tidak lebih besar dari 5MB
        new \Upload\Validation\Size('5M')
    ));

    // 5. Proses Upload
    try {
        // Eksekusi fungsi upload() untuk memindahkan file dari temp ke folder tujuan
        $file->upload();
        
        // Jika berhasil, buat pesan sukses dengan nama file yang berhasil diupload
        $message = "File berhasil diunggah: " . $file->getNameWithExtension();
        // Set tipe pesan menjadi success
        $messageType = "success";
        
        // Mengambil data detail file yang sudah diupload (nama, ekstensi, mime, size, dll)
        $data = array(
            'name'       => $file->getNameWithExtension(), // Nama file beserta ekstensi
            'extension'  => $file->getExtension(),          // Ekstensi file (misal: jpg)
            'mime'       => $file->getMimetype(),           // Tipe mime (misal: image/jpeg)
            'size'       => $file->getSize(),               // Ukuran file dalam bytes
            'md5'        => $file->getMd5(),                // Hash md5 dari isi file
            'path'       => $file->getPathname()            // Path lengkap lokasi file disimpan
        );
        // var_dump($data); // Debugging: bisa diaktifkan jika ingin melihat isi array data
        
    } catch (\Exception $e) {
        // Jika terjadi error saat validasi atau upload, ambil daftar error-nya
        $errors = $file->getErrors();
        // Gabungkan list error menjadi string dan tampilkan sebagai pesan gagal
        $message = "Gagal mengunggah: " . implode(', ', $errors);
        // Set tipe pesan menjadi error
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Demo - codeguy/upload</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        form {
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        pre {
            background: #eee;
            padding: 10px;
            overflow: auto;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Upload Demo (codeguy/upload)</h1>

    <?php if ($message): ?>
        <div class="alert alert-<?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="my_file">Pilih Gambar (JPG/PNG/GIF, max 2MB):</label><br><br>
        <input type="file" name="my_file" id="my_file" required><br>
        <button type="submit">Upload Sekarang</button>
    </form>

    <div style="margin-top: 30px;">
        <h3>Cara Penggunaan Singkat:</h3>
        <pre>
$storage = new \Upload\Storage\FileSystem('path/to/dir');
$file = new \Upload\File('input_name', $storage);
$file->addValidations([
    new \Upload\Validation\Mimetype(['image/png']),
    new \Upload\Validation\Size('5M')
]);
$file->upload();
        </pre>
    </div>
</body>

</html>