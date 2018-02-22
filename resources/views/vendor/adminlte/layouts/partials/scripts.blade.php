<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD_WB6cGCFQIYjXcw7HGInD8D5sNKctno">
</script>
<script type="text/javascript" src="{{ asset('js/google.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modals.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
