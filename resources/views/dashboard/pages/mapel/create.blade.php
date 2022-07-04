<form role="form text-left" action="{{ route("mapel.store") }}" method="post">
    @csrf
    @method("POST")
    <label>Mata Pelajaran</label>
    <div class="input-group mb-3">
      <input name="nama" type="text" class="form-control" placeholder="Mata Pelajaran" value="" required>
    </div>
    <label>Pengajar</label>
    <div class="input-group mb-3">
      <input name="pengajar" type="text" class="form-control" placeholder="Pengajar" value="" required>
    </div>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_kelas" required>
      <option disabled>-- Pilih Kelas --</option>
      @foreach (getKelas() as $item)
      <option value="{{ $item->id }}">{{ $item->kelas }}</option>
      @endforeach
    </select>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="hari" required>
        <option disabled>-- Pilih Kelas --</option>
        <option value="Sunday">Senin</option>
        <option value="Monday">Selasa</option>
        <option value="Thursday">Rabu</option>
        <option value="Wednesday">Kamis</option>
        <option value="Friday">Jumat</option>
      </select>
      <label>Jam Mulai</label>
      <div class="input-group mb-3">
        <input name="mulai" type="time" class="form-control"  required id="mulai" onchange="setSelesaiMinimumTime()">
      </div>
      <label>Jam Selesai</label>
      <div class="input-group mb-3">
        <input name="selesai" type="time" class="form-control"  required id="selesai">
      </div>
    <div class="text-center">
      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambahkan Data</button>
    </div>
  </form>

  <script>
    var setSelesaiMinimumTime = () => {
      var x = document.getElementById("mulai").value;
      document.getElementById("selesai").setAttribute("min", x);
    }
  </script>