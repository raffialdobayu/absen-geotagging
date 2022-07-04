{{-- modal untuk apply --}}
  <!-- Modal -->
  <div class="modal fade" id="applySiswaModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Input Siswa</h5>
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
    $("#applySiswaModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="updateSiswaModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">update Siswa</h5>
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
    $("#updateSiswaModal").on("show.bs.modal", function(e){
      var button = $(e.relatedTarget);
      var modal = $(this);
  
      modal.find(".modal-body").load(button.data("remote"))
    })
  })
  </script>