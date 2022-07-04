<form role="form text-left" enctype="multipart/form-data" method="Post" action="{{ route("siswa.store") }}">
  @csrf
  @method("POST")  
  <label>NIS</label>
    <div class="input-group mb-3">
      <input name="NIS" type="text" class="form-control" placeholder="NIS" value="" required>
    </div>
    <label>NISN</label>
    <div class="input-group mb-3">
      <input name="NISN" type="text" class="form-control" placeholder="NISN"  value="" required>
    </div>
    <label>Nama</label>
    <div class="input-group mb-3">
      <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap"  value="" required>
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
    <select class="form-control" id="exampleFormControlSelect1" name="Jenis_kelamin" required>
        <option disabled>-- Pilih Jenis Kelamin --</option>
        <option value="Laki-Laki" >L</option>
        <option value="Perempuan" > P </option>
      </select>
    <label>Kelas</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_kelas" required>
        <option disabled>-- Pilih Kelas --</option>
        @foreach (getKelas() as $item)
          <option value="{{ $item->id }}">{{ $item->kelas }}</option>
        @endforeach
        
      </select>
    {{-- accordion --}}
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              + Data Wali Murid
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              
                <label>Nama Lengkap</label>
                <div class="input-group mb-3">
                  <input name="Nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <label>No Telpon</label>
                <div class="input-group mb-3">
                  <input name="No_telp" type="text" class="form-control" placeholder="Nomor Induk Penduduk" required>
                </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Apply Siswa</button>
      </div>
  </form>