<div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Info</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center"> </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Siswa</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->getSiswa->nama }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Mapel</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->getMapel->nama }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Waktu</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->waktu }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Long</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->long }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Lat</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->lat }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Jarak</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->jarak }} KM</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Status</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->status }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Desc</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->desc }}</span>
            </td>
          </tr>
          <tr>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">Tanggal Dibuat</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold">:</span>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>