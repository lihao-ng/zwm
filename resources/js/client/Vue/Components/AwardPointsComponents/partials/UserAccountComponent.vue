<template>
  <div class="col-12 mb-3">
    <div class="form-group has-label">
      <label>User's Unique Code</label>

      <input type="text" name="unique_code" class="form-control" v-model="uniqueCode"/>

      <div class="text-right mt-2">
        <div class="btn btn-primary" @click="showReader" v-if="!show">Use QR Reader</div>
      </div>

      <qrcode-stream @decode="onDecode" :key="render" v-if="show"></qrcode-stream>
      
      <div class="text-right mt-2">
        <div class="btn btn-danger text-right mt-2" @click="closeReader" v-if="show">Hide QR Reader</div>
      </div>
    </div>
  </div>
</template>

<script>
  // import AwardPointServices from './../../../services/AwardPointServices';

  export default {
    data: function() {
      return {
        uniqueCode: null,
        render: 0,
        show: false
      }
    },
    mounted: function() {
      this.render += 1;
    },
    methods: {  
      onDecode: function(result) {
        this.uniqueCode = result;
        this.closeReader();
      },
      showReader: function() {
        this.show = true;
      },
      closeReader: function() {
        this.show = false;
      }
    }
  }

  // export default {
  //   data: function() {
  //     return {
  //       newCustomer: false,
  //       receiptLabel: 'Choose file',
  //       receipt: '',
  //       error: null 
  //     }
  //   },
  //   methods: {
  //     getOutlets: function() {
  //       this.searchOutlet = this.searchOutlet == null ? '' : this.searchOutlet;
  //       let query = {
  //         'search': this.searchOutlet
  //       };

  //       OutletServices.getOutlets(query, (data) => {
  //         this.outlets = data.rows;
  //         this.haveData = true;
  //       }, (message, response) => {
  //         this.haveData = false;
  //         console.log(response, 'err')
  //       });
  //     },
  //     onNewCustomer: function(newVal) {
  //       this.newCustomer = true;
  //     },
  //     receiptUpload: function() {
  //       this.receiptLabel = event.target.files[0].name;
  //       this.receipt = event.target.files[0];
  //     },
  //     onSubmit: function() {
  //       let product = this.$refs.product;
  //       let outlet = this.$refs.outlet;
  //       let formData = new FormData();
  //       let validateProducts = this.validateProducts(product.products);
        
  //       if(!validateProducts) {
  //         return;
  //       }

  //       formData.set('outlet_id', outlet.selectedOutlet);
  //       formData.append('receipt', this.receipt);
  //       formData = this.appendCustomer(formData);
  //       formData = this.appendProducts(product.products, formData);

  //       SaleServices.submitSale(formData, (data) => {
  //         window.location.href = data;
  //       }, (error) => {
  //         this.error = error[Object.keys(error)[0]][0];
  //       });
  //     },
  //     validateProducts: function(products) {
  //       if(products.length == 0) {
  //         this.error = 'Please select a product.';
  //         return false;
  //       }

  //       let invalidProduct = _.find(products, (product) => {
  //         return product.quantity == 0 || !product.quantity;
  //       });

  //       if(invalidProduct) {
  //         this.error = `${invalidProduct.name} does not have any quantity.`;
  //         return false;
  //       }

  //       return true;
  //     },
  //     appendCustomer: function(formData) {
  //       if(this.newCustomer) {
  //         let newCustomer = this.$refs.newCustomer;
  //         let name = newCustomer.name ? newCustomer.name : '';
  //         let email = newCustomer.email ? newCustomer.email : '';
  //         let mobile = newCustomer.mobile ? newCustomer.mobile : '';
  //         let nric = newCustomer.nric ? newCustomer.nric : '';

  //         formData.set('name', name);
  //         formData.set('email', email);
  //         formData.set('mobile', mobile);
  //         formData.set('nric', nric);

  //         return formData;
  //       }

  //       let customer = this.$refs.customer;
  //       formData.set('customer_id', customer.selectedCustomer);

  //       return formData;
  //     },
  //     appendProducts: function(products, formData) {
  //       products = products.length ? JSON.stringify(products) : '' ;
  //       formData.append('products', products);

  //       return formData;
  //     }
  //   }
  // }
</script>