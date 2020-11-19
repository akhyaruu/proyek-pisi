<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar Mahasiswa</title>
</head>

<body>

   <table border="1px solid black">
      <tr>
         <th>NAMA MAHASISWA</th>
         <th>NIM</th>
         <th>ALAMAT</th>
      </tr>

      <?php foreach($mahasiswa as $mhs) { ?>
      <tr>
         <td><?= $mhs['nama']; ?></td>
         <td><?= $mhs['nim']; ?></td>
         <td><?= $mhs['alamat']; ?></td>
      </tr>

      <?php } ?>

   </table>

</body>

</html>