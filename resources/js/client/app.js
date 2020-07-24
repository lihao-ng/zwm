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


// Vue.component(
//   'test-component',
//   require('../client/node_modules/@admin/Vue/Components/Test.vue').default
// );

Vue.component(
	'dashboard-component',
	require('@client/Vue/Components/DashboardComponents/DashboardComponent.vue').default
);

// Vue.component('admin-player-form', require('../client/node_modules/@admin/Vue/Components/Player/PlayerFormComponent.vue').default);
// Vue.component('admin-team-form', require('../client/node_modules/@admin/Vue/Components/Team/TeamFormComponent.vue').default);
// Vue.component('player-team-statistic-form', require('../client/node_modules/@admin/Vue/Components/Player_Team/StatisticFormComponent.vue').default);

// Vue.component('director-form-component', require('../client/node_modules/@admin/Vue/Components/AboutUs/DirectorFormComponent.vue').default);


const app = new Vue({
	el: '#vue__app__client'
});


$(function () {

  $('#datetimepicker_player').datetimepicker();
  $('#datetimepicker_player').datetimepicker({
    // format: 'DD-MM-YYYY',
    format: 'YYYY-MM-DD',
  });

});
