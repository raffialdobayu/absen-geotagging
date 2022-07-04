{{-- modal untuk apply --}}
  <!-- Modal -->
  <div class="modal fade" id="updatePresensiModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Presensi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
  
  <script>
  $(document).ready(function($){
    $("#updatePresensiModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>

  <!-- Modal -->
  <div class="modal fade" id="detailPresensiModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Presensi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
  
  <script>
  $(document).ready(function($){
    $("#detailPresensiModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>