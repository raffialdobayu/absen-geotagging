<form role="form text-left" enctype="multipart/form-data" method="post" action="{{ route("kelas.store") }}">
    @csrf
    @method("POST")
    <label>Kelas</label>
    <div class="input-group mb-3">
      <input name="kelas" type="text" class="form-control" placeholder="kelas" value="" required>
    </div>
    <label>Wali Kelas</label>
    <div class="input-group mb-3">
      <input name="wali_kelas" type="text" class="form-control" placeholder="wali kelas"  value="" required>
    </div>
      <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Apply Kelas</button>
      </div>
  </form>