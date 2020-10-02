require('../bootstrap');
require('../vendor/scripts/plugins/bootstrap-table-setup.js')
require('../vendor/scripts/plugins/bootstrap-table.js')
require('../vendor/scripts/plugins/bootstrap-datetimepicker.js')
require('../vendor/scripts/plugins/sweetalert2.min.js')

window.Vue = require('vue');

// import Vue from 'vue';
// import VueCropper from 'vue-cropperjs';
// import 'cropperjs/dist/cropper.css';
// Vue.component("vue-cropper", VueCropper);

Vue.component(
	'guides-component',
	require('@admin/Vue/Components/GuidesComponents/GuidesComponent.vue').default
);

const app = new Vue({
	el: '#vue__app__admin'
});


$(function () {

  $('#datetimepicker_player').datetimepicker();
  $('#datetimepicker_player').datetimepicker({
    // format: 'DD-MM-YYYY',
    format: 'YYYY-MM-DD',
  });
  $('.on_file_import').on('change', function (e) {
    var form = $($(this).data('target'));
    form.submit();
  });
});
