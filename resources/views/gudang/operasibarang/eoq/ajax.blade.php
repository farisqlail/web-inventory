<div class="form-group">
    <label >Niai Kebutuhan Barang Perbulan</label>
    <input type="number" id="nilai_kb" class="form-control" name="nilai_kb" value="{{$kebutuhan}}" readonly required>
</div>

<div class="form-group">
    <label >Niai Harga Barang</label>

    <input type="number" id="harga_barang" class="form-control" name="harga_barang" value="{{$DataEOQ->HARGA_BARANG}}" hidden readonly required>

    <input type="text"  class="form-control" value=" @php   echo "Rp " . number_format($DataEOQ->HARGA_BARANG ,2,',','.');  @endphp " readonly required>
</div>

<div class="form-group">
<label >Biaya Pemesanan</label>
<input type="number" id="nilai_pem" class="form-control" name="nilai_pem" value="{{$DataEOQ->BIAYA_PEMESANAN}}"  hidden readonly required>

<input type="text"  class="form-control" value=" @php   echo "Rp " . number_format($DataEOQ->BIAYA_PEMESANAN ,2,',','.');  @endphp " readonly required>
</div>

<div class="form-group">
    <label >Nilai Perhitungan Economic Order Quantity </label>
    <input type="number" id="nilai_eoq" class="form-control" name="nilai_eoq"  readonly required>
</div>
