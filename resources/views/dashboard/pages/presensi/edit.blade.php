{{-- {{ dd($presensi) }} --}}
<form role="form text-left" enctype="multipart/form-data" method="POST" action="{{ route("presensi.update", $presensi->id) }}">
    @method("PUT")
    @csrf
    <label>Status</label>
      <select class="form-control" id="exampleFormControlSelect1" name="status" required>
        <option disabled>-- Pilih Status Absensi --</option>
        <option value="Masuk" {{ $presensi->status == "Masuk" ? "selected" : " " }}>Masuk</option>
        <option value="Izin" {{ $presensi->status == "Izin" ? "selected" : " " }}> Izin </option>
        <option value="Alpha" {{ $presensi->status == "Alpha" ? "selected" : " " }}> Alpha </option>
      </select>
      <label>Keterangan</label>
      <div class="input-group mb-3">
        <input name="desc" type="text" class="form-control" placeholder="Keterangan"  value="{{ $presensi->desc }}">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">update Absensi</button>
      </div>
  </form>