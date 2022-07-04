@extends('dashboard.layout.base')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.partials.nav')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">

        @if (Session::has("berhasil"))
        <div class="alert alert-success text-white" role="alert">
          <strong>Berhasil!</strong> {{ Session::get("berhasil") }}
        </div>
        @elseif(Session::has("error"))
        <div class="alert alert-warning text-white" role="alert">
          <strong>Gagal!</strong> {{ Session::get("error") }}
        </div>
        @endif
        <div class="col-lg-12 mb-lg-0 mb-4 p-3">
          <div class="card p-4">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Form Absen</h6>
              </div>
            </div>
            {{-- {{ dd(request()) }} --}}
            <form role="form text-left" enctype="multipart/form-data" method="POST" action="{{ route("presensi.siswa.post") }}">
                @method("POST")
                @csrf
                <label>Siswa</label>
                <div class="input-group mb-3">
                    <input name="NIS" type="text" class="form-control" placeholder="NIS"  value="{{Auth()->user()->name }}" readonly required>
                </div>
                <label>Latitude</label>
                <input name="lat" type="text" class="form-control" placeholder="lat"  value="" id="lat" readonly required>
                <label>Longitude</label>
                <input name="long" type="text" class="form-control" placeholder="long"  value="" id="long" readonly required>
                <br>
                <button type="button" class="btn btn-round bg-gradient-info btn-md" onclick="getLocation()">Temukan Kordinat</button>
                <br>
                {{-- {{ dd(getMapelByKelasAndDay(Auth()->user()->name)) }} --}}
                  <label>Mata Pelajaran</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="kode_mapel" required>
                    <option disabled>-- Pilih Kelas --</option>
                    @foreach (getMapelByKelasAndDay(Auth()->user()->name) as $item)
                        <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                <label>Status</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                    <option disabled>-- Pilih Status Absensi --</option>
                    <option value="Masuk">Masuk</option>
                  </select>
                  {{-- <label>Keterangan</label>
                  <div class="input-group mb-3">
                    <input name="desc" type="text" class="form-control" placeholder="Keterangan"  value="">
                  </div> --}}
                  <div class="text-center">
                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Apply Absensi</button>
                  </div>
              </form>
          </div>
        </div>
        <div class="col-lg-12 mb-lg-0 mt-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Riwayat Absensi</h6>
                {{-- <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#applySiswaModal" data-remote="{{ route("siswa.create") }}"><i class="fa-solid fa-circle-plus"></i> Tambah Siswa</button> --}}
              </div>
            </div>
            <div class="table-responsive" style="padding: 30px;">
              <table class="table align-items-center" id="table-jabatan">
                <thead>
                  <tr>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">*</p>
                        </div>
                    </td>
                    {{-- <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Info</p>
                        </div>
                    </td> --}}
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Mata Pelajaran</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Waktu</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Status</p>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Keterangan</p>
                        </div>
                    </td>
                    {{-- <td>
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Aksi</p>
                        </div>
                    </td> --}}
                  </tr>
                </thead>
                <tbody>
                  @forelse ($presensi as $k)
                  
                    <tr>
                        <td class="text-center">*</td>
                        {{-- <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                            <img src="{{ asset('/argon_assets/img/user.png') }}" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $k->getSiswa->nama }}</h6>
                            <p class="text-xs text-secondary mb-0">NIS.{{ $k->getSiswa->NIS }}</p>
                            <p class="text-xs text-secondary mb-0">NISN.{{ $k->getSiswa->NISN }}</p>
                            </div>
                            </div>
                        </td> --}}
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $k->getMapel->nama }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $k->waktu }}</h6>
                          {{-- <h6 class="text-sm mb-0">{{ $k->waktu }}</h6> --}}
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $k->status }}</h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-sm mb-0">{{ $k->desc }}</h6>
                        </div>
                      </td>
                      {{-- <td class="align-middle text-sm">
                        <div class="col text-center">
                          <button class="btn btn-primary"><i class="fa-solid fa-user-check"></i></button>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updatePresensiModal" data-remote="{{ route("presensi.edit", $k->id) }}" data-title=""><i class="fa-solid fa-pencil"></i></button>
                          <a type="button" class="btn btn-info" href="http://maps.google.co.id/?q={{ $k["long"] }},{{ $k["lat"] }}"><i class="fa-solid fa-earth-asia"></i></a>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailPresensiModal" data-remote="{{ route("presensi.detail", $k->id) }}" data-title=""><i class="fa-solid fa-magnifying-glass"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#modal-notification" id="open-deletemodal" data-id="{{ $k->NIK }}"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </div>
                      </td> --}}
                    </tr>
                  @empty
                      <tr  class="text-center">
                        <td colspan="4">
                          Belum Ada Riwayat Presensi
                        </td>
                      </tr>
                  @endforelse
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <script>
    
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else { 
        // x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
    
    function showPosition(position) {
    //   x.innerHTML = "Latitude: " + position.coords.latitude + 
    //   "<br>Longitude: " + position.coords.longitude;
      document.getElementById("lat").value = position.coords.latitude;
      document.getElementById("long").value = position.coords.longitude;
    }
    
    function showError(error) {
      switch(error.code) {
        case error.PERMISSION_DENIED:
          x.innerHTML = "User denied the request for Geolocation."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML = "Location information is unavailable."
          break;
        case error.TIMEOUT:
          x.innerHTML = "The request to get user location timed out."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML = "An unknown error occurred."
          break;
      }
    }
    </script>
  @include('dashboard.pages.presensi.modals')
  
@endsection