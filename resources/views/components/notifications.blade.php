@if (session()->has('success'))
<div class="toast" id="myToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="fa fa-tick"></i>
      <strong class="me-auto">Bootstrap</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ session('success') }}
    </div>
  </div>
@endif
