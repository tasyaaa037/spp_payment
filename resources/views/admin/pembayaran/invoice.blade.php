<!DOCTYPE html>
<html>
  <head>
    <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 1px;
      }

      #customers td,
      #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04aa6d;
        color: white;
      }
      .kop-surat {
        width: auto;
        margin: 0 auto;
        background-color: #fff;
      }
      table {
        border-bottom: 7 px solid #000;
        padding: 0px;
        width: 100%;
      }
      .tengah {
        text-align: center;
        line-height: 13px;
      }
    </style>
  </head>
  <body>
    <div class="kop-surat">
      <table>
        <tr>
          <td class="tengah">
            <h3>SEKOLAH MENENGAH KEJURUAN</h3>
            <h2>SMK MUHAMMADIYAH 1 WONOSOBO</h2>
            <h3>STATUS : TERAKREDITASI B</h3>
            <p>
              <b
                >BIDANG KEAHLIAN : BISNIS DAN MENEJEMEN - TEKNOLOGI INFORMASI
                DAN KOMUNIKASI - TEKNOLOGI DAN REKAYASA</b
              >
            </p>
            <hr />
            <p>
              Alamat : Kompleks Perguruan Muhammadiyah Jl. Kh. Ahmad Dahlan
              No.6, Tegalrejo, Jaraksari, Kec. Wonosobo, Kabupaten Wonosobo,
              Jawa Tengah 56311
            </p>
            <hr />
          </td>
        </tr>
      </table>
    </div>

    <table id="customers">
      <tr>
         <th scope="col">No.</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Tanggal Bayar</th>
                                <th scope="col">Bulan</th>
                                <th scope="col">Tahun || Nominal</th>
                                <th scope="col">Jumlah Bayar</th>
                                <th scope="col">Sisa Cicilan</th>
                                <th scope="col">Admin</th>
      </tr>
      @php
          $no = 1;
      @endphp
      @foreach ( $data as $d )
        <tr>
        <td>{{ $no-> }}</td>
        <td>{{ $d->siswa->nama }}</td>
        <td>{{ $d->siswa->nisn }}</td>
        <td>{{ $d->tanggal_bayar }}</td>
        <td>{{ $d->bulan }}</td>
        <td>{{ $d->spp->tahun }} || {{'Rp.' . number_format($d->spp->nominal, 2, ',', '.')}}</td>
        <td>{{ $d->spp->tahun }} || {{'Rp.' . number_format($d->total_bayar, 2, ',', '.')}}</td>
        <td>{{'Rp.' . number_format($d->spp->nominal - $d->total_bayar, 2, ',', '.')}}</td>
       </td>
        <td>{{ $d->nama_penginput }}</td>
      </tr>  
      @endforeach
    </table>
  </body>
</html>