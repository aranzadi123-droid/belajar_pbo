<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Input Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            margin: auto;
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #e9ecef;
            border-left: 5px solid #007bff;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Input Nilai Mahasiswa</h2>
    
    <!-- Formulir Input -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
        </div>
        
        <div class="form-group">
            <label for="tugas">Nilai Tugas (20%):</label>
            <input type="number" id="tugas" name="tugas" min="0" max="100" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="uts">Nilai UTS (35%):</label>
            <input type="number" id="uts" name="uts" min="0" max="100" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="uas">Nilai UAS (45%):</label>
            <input type="number" id="uas" name="uas" min="0" max="100" step="0.01" required>
        </div>
        
        <button type="submit" name="submit">Hitung Nilai</button>
    </form>

    <?php
    // Proses ketika tombol submit ditekan
    if (isset($_POST['submit'])) {
        // Mengambil data dari form dan melakukan sanitasi dasar
        $nama  = htmlspecialchars($_POST['nama']);
        $nim   = htmlspecialchars($_POST['nim']);
        $tugas = floatval($_POST['tugas']);
        $uts   = floatval($_POST['uts']);
        $uas   = floatval($_POST['uas']);

        // Bobot Nilai
        // Tugas: 20%, UTS: 35%, UAS: 45%
        $nilai_akhir = ($tugas * 0.20) + ($uts * 0.35) + ($uas * 0.45);

        // Menentukan Grade / Predikat dan Status Kelulusan
        if ($nilai_akhir >= 85) {
            $grade = "A";
            $status = "Lulus (Sangat Baik)";
        } elseif ($nilai_akhir >= 70) {
            $grade = "B";
            $status = "Lulus (Baik)";
        } elseif ($nilai_akhir >= 60) {
            $grade = "C";
            $status = "Lulus (Cukup)";
        } elseif ($nilai_akhir >= 50) {
            $grade = "D";
            $status = "Remedial / Kurang";
        } else {
            $grade = "E";
            $status = "Tidak Lulus";
        }

        // Menampilkan Hasil
        echo '<div class="result">';
        echo '<h3>Hasil Perhitungan Nilai</h3>';
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>NIM:</strong> $nim</p>";
        echo "<p><strong>Nilai Tugas:</strong> $tugas</p>";
        echo "<p><strong>Nilai UTS:</strong> $uts</p>";
        echo "<p><strong>Nilai UAS:</strong> $uas</p>";
        echo "<hr>";
        echo "<p><strong>Nilai Akhir:</strong> " . number_format($nilai_akhir, 2) . "</p>";
        echo "<p><strong>Grade:</strong> $grade</p>";
        echo "<p><strong>Status:</strong> $status</p>";
        echo '</div>';
    }
    ?>
</div>

</body>
</html>