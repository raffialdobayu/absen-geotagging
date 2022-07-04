{{-- {{ dd($s) }} --}}
<form role="form text-left" enctype="multipart/form-data" method="post" action="{{ route("siswa.update", $s->NIS) }}">
  @method("PUT")
  @csrf
    <label>NIS</label>
    <div class="input-group mb-3">
      <input name="NIS" type="text" class="form-control" placeholder="NIS" value="{{ $s->NIS }}" readonly>
    </div>
    <label>NISN</label>
    <div class="input-group mb-3">
      <input name="NISN" type="text" class="form-control" placeholder="NISN"  value="{{ $s->NISN }}" readonly>
    </div>
    <label>Nama</label>
    <div class="input-group mb-3">
      <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap"  value="{{ $s->nama }}" >
    </div>
    {{-- <label>Tempat Tanggal Lahir <span></span></label>
    <div class="input-group mb-3">
      <input name="tempat_"  type="text" class="form-control" placeholder="Kota" disabled>
      <input name="tgl_lahir" style="width: 40%" type="text" placeholder="DD/MM/YYY"  class="form-control" id="tanggal_lahir" disabled>
    </div>
    <script>
      jQuery(document).ready(function($) {
        if (window.jQuery().datetimepicker) {
            $('#tanggal_lahir').datetimepicker({
                // Formats
                // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
                format: 'DD/MM/YYYY',
                
                // Your Icons
                // as Bootstrap 4 is not using Glyphicons anymore
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-check',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                }
            });
        }
    });
    </script> --}}
    <label>Jenis Kelamin</label>
    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" >
        <option disabled>-- Pilih Jenis Kelamin --</option>
        <option value="Laki-Laki" {{ $s->Jenis_kelamin == "Laki-Laki" ? "selected" : "" }} >L</option>
        <option value="Perempuan" {{ $s->Jenis_kelamin == "Perempuan" ? "selected" : "" }}> P </option>
      </select>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_kelas" >
        <option disabled>-- Pilih Kelas --</option>
        @foreach (getKelas() as $item)
          <option value="{{ $item->id }}" {{ $s->id_kelas == $item->id ? "selected" : "" }}>{{ $item->kelas }}</option>
        @endforeach
      </select>
      <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">update Siswa</button>
      </div>
  </form>