require('../bootstrap');
require('../vendor/scripts/plugins/bootstrap-table-setup.js')
require('../vendor/scripts/plugins/bootstrap-table.js')
require('../vendor/scripts/plugins/bootstrap-datetimepicker.js')
require('../vendor/scripts/plugins/sweetalert2.min.js')

import VueQrcodeReader from "vue-qrcode-reader";

window.Vue = require('vue');
Vue.use(VueQrcodeReader);
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

Vue.component(
	'award-points-component',
	require('@client/Vue/Components/AwardPointsComponents/AwardPointsComponent.vue').default
);
 
Vue.component(
	'user-account-componenent',
	require('@client/Vue/Components/AwardPointsComponents/partials/UserAccountComponent.vue').default
);

Vue.component(
	'award-item-componenent',
	require('@client/Vue/Components/AwardPointsComponents/partials/AwardItemComponent.vue').default
);

// Vue.component('admin-player-form', require('../client/node_modules/@admin/Vue/Components/Player/PlayerFormComponent.vue').default);
// Vue.component('admin-team-form', require('../client/node_modules/@admin/Vue/Components/Team/TeamFormComponent.vue').default);

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
