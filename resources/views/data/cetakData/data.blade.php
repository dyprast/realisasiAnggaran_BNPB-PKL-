<title>Realisasi Anggaran BNPB</title>
<link rel="icon" href="{{ asset('img/icon.png') }}">
<style>
  *{
    font-family: sans-serif;
  }
  tr{
    height: 40px;
  }
  td{
    padding: 10px;
  }
  table {
    border-collapse: collapse;
  }
  table, tr, th, td {
    border: 1px solid black;
  }
  .header{
    text-align: center;
  }
  .header img{
    width: 100px;
  }
  .date{
    text-align: right;
    font-family: sans-serif;
    font-weight: bold;
    font-style: italic;
  }
  .swal-button {
    background-color: #2ab7a9;
    border: 1px solid #CCC;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
  }
  .swal-button:not([disabled]):hover{
    background-color: #2CC3B4;
  }
</style>
<p class="date">{{ date('d/m/Y') }}</p>
<div class="header">
  <img src="http://1.bp.blogspot.com/-vGwfUEcu2kk/UPLGcZJ4SSI/AAAAAAAALYw/bmllfIVBuQs/s1600/LOGO+BADAN+NASIONAL+PENANGGULANGAN+BENCANA.png">
  <h2>REALISASI ANGGARAN BNPB</h2>
  <p>BIDANG INFORMASI PADA PUSAT DATA, INFORMASI DAN HUMAS</p>
</div>
<table style="width:100%">
  <thead>
  <tr>
    <th style="text-align: center;" rowspan="2">Kode</th>
    <th style="text-align: center;" rowspan="2">Kegiatan/Sub Kegiatan/MAK</th>
    <th style="text-align: center;" colspan="4">PENYERAPAN KEUANGAN</th>
  </tr>
  <tr>
    <th style="text-align: center;">DANA</th>
    <th style="text-align: center;">REALISASI</th>
    <th style="text-align: center;">SISA</th>
    <th style="text-align: center;">%</th>
  </tr>
  </thead>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  <?php $nilaiAll = 0; $realisasi_nilaiAll = 0; ?>
  @foreach($kegiatans as $resKegiatanAll)
    <?php 
      $nilaiAll += $resKegiatanAll->nilai; 
      $realisasi_nilaiAll += $resKegiatanAll->realisasi_nilai; 
    ?>
  @endforeach
    <?php $sisaAll = $nilaiAll - $realisasi_nilaiAll; ?>
    <?php $percentageAll = $realisasi_nilaiAll*100/($nilaiAll); ?>
    <tr style="font-weight: bold;text-align: right;color: #fff;background-color: #e67201;">
      <td></td>
      <td style="text-align: center;">TOTAL KESELURUHAN</td>
      <td>{{ number_format($nilaiAll,0,",",".") }}</td>
      <td>{{ number_format($realisasi_nilaiAll,0,",",".") }}</td>
      <td>{{ number_format($sisaAll,0,",",".") }}</td>
      <td>{{ number_format($percentageAll,0,",",".") }}%</td>
    </tr>
  @foreach($kegiatans as $resKegiatan)
    @if($resKegiatan->nilai > 0)
    <?php $sisaKegiatans = $resKegiatan->nilai - $resKegiatan->realisasi_nilai; ?>
    <?php $percentageK = $resKegiatan->realisasi_nilai*100/($resKegiatan->nilai); ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    <tr style="font-style: italic;color: #B80000;font-weight: bold;">
      <td style="text-align: center;">{{ $resKegiatan->kode }}</td>
      <td>{{ $resKegiatan->kegiatan }}</td>
      <td style="text-align: right;">{{ number_format($resKegiatan->nilai,0,",",".") }}</td>
      <td style="text-align: right;">{{ number_format($resKegiatan->realisasi_nilai,0,",",".") }}</td>
      <td style="text-align: right;">{{ number_format($sisaKegiatans,0,",",".") }}</td>
      <td style="text-align: right;">{{ number_format($percentageK,0,",",".") }}%</td>
    </tr>
    @foreach($subKegiatans as $resSubKegiatan)
      @if($resKegiatan->id == $resSubKegiatan->id_kegiatan)
      <?php $sisaSubKegiatans = $resSubKegiatan->nilai - $resSubKegiatan->realisasi_nilai; ?>
      <?php $percentageSK = $resSubKegiatan->realisasi_nilai*100/($resSubKegiatan->nilai); ?>
        <tr style="font-weight: bold;">
          <td style="text-align: center;">{{ $resSubKegiatan->kode }}</td>
          <td>{{ $resSubKegiatan->sub_kegiatan }}</td>
          <td style="text-align: right;">{{ number_format($resSubKegiatan->nilai,0,",",".") }}</td>
          <td style="text-align: right;">{{ number_format($resSubKegiatan->realisasi_nilai,0,",",".") }}</td>
          <td style="text-align: right;">{{ number_format($sisaSubKegiatans,0,",",".") }}</td>
          <td style="text-align: right;">{{ number_format($percentageSK,0,",",".") }}%</td>
        </tr>
          @foreach($pakets as $resPaket)
            @if($resSubKegiatan->id == $resPaket->id_subKegiatan)
              <tr style="font-style: italic;color: #008A8A">
                <td style="text-align: center;">{{ $resPaket->paket }}</td>
                <td>{{ $resPaket->keterangan_paket }}</td>
                <td style="text-align: right;">{{ number_format($resPaket->nilai,0,",",".") }}</td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
              </tr>
              @foreach($maks as $resMaks)
                @if($resSubKegiatan->id == $resMaks->id_subKegiatan && $resPaket->id == $resMaks->id_paket)
                  <?php $sisaMaks = $resMaks->nilai - $resMaks->realisasi_nilai; ?>
                  <?php $percentageMAK = $resMaks->realisasi_nilai*100/($resMaks->nilai); ?>
                  <tr>
                    <td style="text-align: center;">{{ $resMaks->kode }}</td>
                    <td>{{ $resMaks->mak }}</td>
                    <td style="text-align: right;">{{ number_format($resMaks->nilai,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($resMaks->realisasi_nilai,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($sisaMaks,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($percentageMAK,0,",",".") }}%</td>
                  </tr>
                  @foreach($penyerapanKeuangans as $resPenyerapanKeuangans)
                    @if($resMaks->id == $resPenyerapanKeuangans->id_mak)
                    <tr style="color: #04317a">
                      <td></td>
                      <td>{{ $resPenyerapanKeuangans->realisasi_kegiatan }}</td>
                      <td></td>
                      <td style="text-align: right;">{{ number_format($resPenyerapanKeuangans->realisasi_nilai,0,",",".") }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    @endif
                  @endforeach
                @endif
              @endforeach
            @elseif($resPaket->check_maks == "Proses Cetak Data (Jangan Dihapus)")
              @foreach($maks as $resMaks)
                @if($resSubKegiatan->id == $resMaks->id_subKegiatan && $resMaks->id_paket == NULL)
                  <?php $sisaMaks = $resMaks->nilai - $resMaks->realisasi_nilai; ?>
                  <?php $percentageMAK = $resMaks->realisasi_nilai*100/($resMaks->nilai); ?>
                  <tr>
                    <td style="text-align: center;">{{ $resMaks->kode }}</td>
                    <td>{{ $resMaks->mak }}</td>
                    <td style="text-align: right;">{{ number_format($resMaks->nilai,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($resMaks->realisasi_nilai,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($sisaMaks,0,",",".") }}</td>
                    <td style="text-align: right;">{{ number_format($percentageMAK,0,",",".") }}%</td>
                  </tr>
                  @foreach($penyerapanKeuangans as $resPenyerapanKeuangans)
                    @if($resMaks->id == $resPenyerapanKeuangans->id_mak)
                    <tr style="color: #04317a">
                      <td></td>
                      <td>{{ $resPenyerapanKeuangans->realisasi_kegiatan }}</td>
                      <td></td>
                      <td style="text-align: right;">{{ number_format($resPenyerapanKeuangans->realisasi_nilai,0,",",".") }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    @endif
                  @endforeach
                @endif
              @endforeach
            @endif
          @endforeach
      @endif
    @endforeach
    @endif
  @endforeach
</table>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
  swal("Cetak PDF, Cetak Data ?", {
    buttons: {
      pdf: {
        text: "Cetak PDF",
        value: "pdf",
      },
      print: {
        text: "Cetak Data",
        value: "print",
      },
    },
  })
  .then((value) => {
    switch (value) {
      case "pdf":
        window.location = "{{ url('realisasiAnggaranBNPB/cetakData/PDF') }}"
        break;
      case "print":
        window.print();
        break;
      default:
        swal("Membatalkan Pilihan");
    }
  });
</script>