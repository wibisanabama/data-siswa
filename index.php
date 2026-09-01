<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
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
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            font-size: 0.9rem;
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

        .card {
            background: var(--card-bg);
            border-radius: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th {
            text-align: left;
            padding: 1rem;
            color: var(--text-muted);
            font-weight: 600;
            border-bottom: 2px solid var(--border);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        td {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.95rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.8rem;
        }

        .btn-warning {
            background-color: var(--warning);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 500;
            background: #e0e7ff;
            color: var(--primary);
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        .modal-backdrop.is-open {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            width: min(100%, 430px);
            padding: 2rem;
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            background: var(--card-bg);
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.22);
            transform: translateY(12px) scale(0.98);
            transition: transform 0.2s ease;
        }

        .modal-backdrop.is-open .modal {
            transform: translateY(0) scale(1);
        }

        .modal-icon {
            display: grid;
            place-items: center;
            width: 3.25rem;
            height: 3.25rem;
            margin-bottom: 1.25rem;
            border-radius: 1rem;
            background: #fee2e2;
            color: var(--danger);
        }

        .modal-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .modal h2 {
            margin-bottom: 0.5rem;
            font-size: 1.35rem;
        }

        .modal p {
            color: var(--text-muted);
            line-height: 1.6;
        }

        .modal p strong {
            color: var(--text-main);
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.75rem;
        }

        .btn-secondary {
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-main);
        }

        .btn-secondary:hover {
            background: #f1f5f9;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }

        body.modal-open {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Data Siswa</h1>
            <a href="tambah.php" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('koneksi.php');
                    $data = mysqli_query($koneksi, "SELECT * FROM siswa");

                    while($siswa = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= isset($i) ? ++$i : $i=1; ?></td>
                        <td><strong><?= $siswa['nama']; ?></strong></td>
                        <td><span class="badge"><?= $siswa['nis']; ?></span></td>
                        <td><?= date('d M Y', strtotime($siswa['tanggal_lahir'])); ?></td>
                        <td><?= $siswa['email']; ?></td>
                        <td class="actions">
                            <a href="edit.php?id_siswa=<?= $siswa['id_siswa']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger delete-trigger"
                                data-delete-url="hapus.php?id=<?= $siswa['id_siswa']; ?>"
                                data-student-name="<?= htmlspecialchars($siswa['nama'], ENT_QUOTES, 'UTF-8'); ?>">Hapus</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-backdrop" id="deleteModal" aria-hidden="true">
        <div class="modal" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle" aria-describedby="deleteModalDescription">
            <div class="modal-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h18M8 6V4h8v2m-9 0 1 14h8l1-14M10 11v5m4-5v5"/>
                </svg>
            </div>
            <h2 id="deleteModalTitle">Hapus data siswa?</h2>
            <p id="deleteModalDescription">Data <strong id="studentName"></strong> akan dihapus permanen dan tidak dapat dikembalikan.</p>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" id="cancelDelete">Batal</button>
                <a href="#" class="btn btn-danger" id="confirmDelete">Ya, hapus</a>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteModal');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');
        const studentName = document.getElementById('studentName');
        let lastTrigger = null;

        function openDeleteModal(trigger) {
            lastTrigger = trigger;
            studentName.textContent = trigger.dataset.studentName;
            confirmDelete.href = trigger.dataset.deleteUrl;
            deleteModal.classList.add('is-open');
            deleteModal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');
            cancelDelete.focus();
        }

        function closeDeleteModal() {
            deleteModal.classList.remove('is-open');
            deleteModal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
            if (lastTrigger) lastTrigger.focus();
        }

        document.querySelectorAll('.delete-trigger').forEach((trigger) => {
            trigger.addEventListener('click', () => openDeleteModal(trigger));
        });

        cancelDelete.addEventListener('click', closeDeleteModal);
        deleteModal.addEventListener('click', (event) => {
            if (event.target === deleteModal) closeDeleteModal();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && deleteModal.classList.contains('is-open')) closeDeleteModal();
        });
    </script>
</body>
</html>
