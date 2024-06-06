<!-- <script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script> -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
  const loader = document.getElementById('loader');

  // Example: Show loader on form submit
  const form = document.querySelector('form');
  if (form) {
      form.addEventListener('submit', function() {
          loader.style.display = 'block';
      });
  }

  // Example: Hide loader on window load (or after some async action)
  window.addEventListener('load', function() {
      loader.style.display = 'none';
  });

  // You can also use AJAX events to show/hide the loader
  $(document).ajaxStart(function() {
      loader.style.display = 'block';
  });

  $(document).ajaxComplete(function() {
      loader.style.display = 'none';
  });
});
</script>
@yield('insertjavascript')
