<script src="{{ mix('js/client.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places" type="text/javascript"></script>
<script>
  google.maps.event.addDomListener(window, 'load', initialize);

  function initialize() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
    
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      
      $('#lat').val(place.geometry['location'].lat());
      $('#lng').val(place.geometry['location'].lng());
    });
  }
</script>
@stack('scripts')