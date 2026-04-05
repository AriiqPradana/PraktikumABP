<?php
//Data Array (PHP)
$mahasiswa = [
    "Ariiq" => ["kota" => "Jakarta", "nim" => "2311102260", "kelas" => "IF-11-03"],
    "Syahrul" => ["kota" => "Banyumas", "nim" => "2311102261", "kelas" => "IF-11-03"],
    "Aji" => ["kota" => "Bali", "nim" => "2311102262", "kelas" => "IF-11-03"]
];

//Ajax
if(isset($_GET['data'])) {
    header('Content-Type: application/json');
    echo json_encode($mahasiswa);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas Array & AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<h2>Output Array Asosiatif (PHP)</h2>
<?php
// OUTPUT LANGSUNG PHP
echo $mahasiswa["Ariiq"]["kota"] . "<br>";
echo $mahasiswa["Syahrul"]["kota"] . "<br>";
echo $mahasiswa["Ariiq"]["nim"];
?>

<hr>

<h2>Data Mahasiswa (AJAX)</h2>
<button id="load">Tampilkan Data</button>

<ul id="hasil"></ul>

<script>
$(document).ready(function() {
    $("#load").click(function() {
        $.ajax({
            url: "index.php?data=true",
            method: "GET",
            dataType: "json",

            success: function(res) {
                let output = "";

                for (let nama in res) {
                    output += `<li>
                        Nama: ${nama} |
                        NIM: ${res[nama].nim} |
                        Kelas: ${res[nama].kelas} |
                        Kota: ${res[nama].kota}
                    </li>`;
                }

                $("#hasil").html(output);
            },

            error: function() {
                $("#hasil").html("<li>Gagal mengambil data</li>");
            }
        });
    });
});
</script>

</body>
</html>