<template>
  <form @submit.prevent>
    <div>
      <div class="alert alert-danger" v-if="error">
        <p>{{ error }}</p>
      </div>

      <div class="row">
        <div class="col">
          <div class="card p-3">
            <div class="card-body">
              <div class="row align-items-end">
                <div class="col">
                  <h3>Redeem</h3>
                  <p class="mb-0">Please scan the valid QR Code for the coupon.</p>
                </div>
              </div>

              <div class="row"> 
                <qr-code-component @submit="onSubmit($event)"></qr-code-component>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
  import PromoCodeServices from './../../services/PromoCodeServices';

  export default {
    data: function() {
      return {
        error: null
      }
    },
    methods: { 
      onSubmit: function(uniqueCode) {  
        let data = {
          'code': uniqueCode
        };
        
        PromoCodeServices.redeem(data, (data) => {
          	swal({
              title: "Successfully redeemed!",
              type: "success",
              html:
                "<div class='card mb-3' style='max-width: 540px;'>" + 
                  "<div class='row no-gutters'>" +
                    "<div class='col-md-4'>" +
                      "<img style='height:150px;object-fit:fill;' src='" + data.photo + "' class='card-img'>" +
                    "</div>" +
                    "<div class='col-md-8'>" +
                      "<div class='card-body'>" +
                        "<h5 class='card-title'>" + data.coupon_name + "</h5>" +
                        "<p class='card-text'>" + data.description + "</p>" +
                        "<p class='card-text'><small class='text-muted'>" + data.points + " points</small></p>" +
                      "</div>" +
                    "</div>" +
                  "</div>" +
                "</div>",
              allowOutsideClick: false,
              confirmButtonText: "OK",
            }, function () {
              location.reload();
            });
        }, (error) => {
          this.error = error;
        });
      }
    }
  }
</script>