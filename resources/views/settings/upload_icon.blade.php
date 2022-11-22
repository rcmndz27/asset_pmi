<div class="modal fade" id="uploadIcon" tabindex="-1" role="dialog" aria-labelledby="uploadIconlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadIconlabel">Upload Icon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method='POST' action='upload-icon' onsubmit='show()' enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class='col-md-12 text-center'>
                <img id='icon_change' src='@if($settings->where('icon','!=',null)->first()){{URL::asset($settings->icon)}}@endif' onerror="this.src='{{URL::asset('/images/icon.png')}}';" id='icon'  class=" circle-border m-b-md border" alt="profile" height='130px;' width='130px;'> <br>
                <i><small>SIZE : 130px x 130px</small></i>
              </div>
            </div>
            <div class="row mt-3">
              <div class='col-md-12 text-center'>
                <label title="Upload image file" for="inputImage" class="btn btn-primary btn-sm ">
                    <input type="file" accept="image/*" name="file" id="inputImage" style="display:none"  onchange='upload_icon(this)'>
                    Change Icon
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
  <script>
      function upload_icon(input)
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#icon_change').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>