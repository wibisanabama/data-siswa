<?php
require_once('koneksi.php');

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];

    $query = mysqli_query($koneksi, "INSERT INTO siswa VALUES('', '$nama', '$nis', '$tanggal_lahir', '$email')");

    if ($query) {
        $message = "data berhasil ditambahkan";
        $status = "success";
    } else {
        $message = "data gagal ditambahkan";
        $status = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text-main);
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: var(--card-bg);
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        p.subtitle {
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid var(--border);
            outline: none;
            transition: all 0.2s;
            font-size: 1rem;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border-radius: 0.75rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .back-link:hover {
            color: var(--primary);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            text-align: center;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Tambah Siswa</h1>
        <p class="subtitle">Silakan isi formulir di bawah ini</p>

        <?php if (isset($message)) : ?>
            <div class="alert alert-<?= $status; ?>">
                <?= $message; ?>
                <?php if ($status == 'success') : ?>
                    <script>setTimeout(() => { window.location.href = 'index.php'; }, 1500);</script>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" placeholder="Masukkan NIS" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="contoh@email.com" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Simpan Data</button>
        </form>

        <a href="index.php" class="back-link">Kembali ke Daftar</a>
    </div>
</body>
</html>
