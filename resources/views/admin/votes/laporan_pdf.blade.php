<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <title>Laporan!</title>
  </head>
  <body>
    <div style="text-align: center">
      <h3>Pemilihan Calon Ketua OSIS</h3>
      <h4>SMK ISFI Banjarmasin</h4>
      <hr>
    </div>

    <div class="container">
      <h4 style="text-align: center">Laporan Hasil Pemilihan</h4>
      <table border="1" cellspacing="0" cellspadding="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Calon</th>
            <th>Nomor Urut</th>
            <th>Suara</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($votes as $vote)
            <tr>
              <td style="text-align: center">{{ $loop->iteration }}</td>
              <td>{{ $vote->nama_calon }}</td>
              <td style="text-align: center">{{ $vote->nomor_urut }}</td>
              <td style="text-align: center">{{ $vote->votes }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div style="margin-top: 50px; margin-left: 60%">
        <p style="text-align: left;">Mengetahui,</p>
        <p style="text-align: left;">.........................., ....... ................... <?= date('Y') ?></p>
        <p style="text-align: left;">Ketua Pemilihan</p>
        <br><br><br><br><br>
        <p style="text-align: left;">(.............................................................)</p>
      </div>
    </div>

  </body>
</html>