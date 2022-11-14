@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('votes') }}
<a href="/admin/export" target="_blank" class="btn btn-md btn-success my-3">Export PDF</a>
<div class="row">
  <div class="col-md-4">
    <div class="table-responsive">
      <table class="table table-striped">
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
              <td>{{ $loop->iteration }}</td>
              <td>{{ $vote->nama_calon }}</td>
              <td>{{ $vote->nomor_urut }}</td>
              <td>{{ $vote->votes }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-lg-4">
    <div id="piechart" style="width: 700px; height: 500px;"></div>
  </div>
</div>


<script>
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Calon', 'Hasil Suara'],
          <?php
          foreach ($votes as $vote) {
            echo "['$vote->nama_calon',     $vote->votes],";
          }
          ?>
        ]);

        var options = {
          title: 'Grafik Hasil Pemilihan'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
@endsection