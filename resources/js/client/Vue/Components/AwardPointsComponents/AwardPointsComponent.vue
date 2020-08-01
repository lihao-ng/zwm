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
              <div class="row align-items-end mb-3">
                <div class="col">
                  <h3>Award Points</h3>
                </div>
              </div>

              <div class="row">
                <user-account-componenent ref="account"></user-account-componenent>

                <award-item-componenent ref="item"></award-item-componenent>

                <div class="col text-right my-2">
                  <button type="submit" value="Submit" class="btn btn-primary" @click="onSubmit()">Award Points</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--
      <div class="card-body">
        <user-account-componenent></user-account-componenent>

        <sale-customer-component ref="customer" @newCustomer="onNewCustomer()" v-if="!newCustomer"></sale-customer-component>

        <sale-new-customer-component ref="newCustomer" v-else></sale-new-customer-component>

        <sale-product-component ref="product"></sale-product-component>

        <sale-outlet-component ref="outlet"></sale-outlet-component> 
        
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" @change="receiptUpload()">
          <label class="custom-file-label" for="customFile">{{ receiptLabel }}</label>
        </div>

        <div class="card-category form-category"><label class="label">*</label> Required fields</div>
      </div>

      <div class="card-footer mt-3 text-right">
        <button type="submit" class="btn btn-warning btn-wd" @click="onSubmit()">Create</button>
      </div>

-->
    </div>
  </form>
</template>

<script>
  import AwardPointServices from './../../services/AwardPointServices';

  export default {
    data: function() {
      return {
        error: null
      }
    },
    methods: { 
      onSubmit: function() { 
        let account = this.$refs.account;
        let item = this.$refs.item;
        
        let formData = new FormData();
        let validateAccount = this.validateAccount(account.uniqueCode);
        let validateItems = this.validateItems(item);
        
        if(!validateAccount || !validateItems) {
          return;
        }

        formData.set('unique_code', account.uniqueCode);
        formData = this.appendProducts('products', item.products, formData);
        formData = this.appendProducts('custom_items', item.customItems, formData);

        AwardPointServices.awardPoints(formData, (data) => {
          // window.location.href = data;
          console.log(data, 'ok');
        }, (error) => {
          this.error = error[Object.keys(error)[0]][0];
        });
      },
      validateAccount: function(uniqueCode) {
        // Send request to check for uniqueCode validity

        // if(invalidProduct) {
        //   this.error = `${invalidProduct.name} does not have any quantity.`;
        //   return false;
        // }

        return true;
      },
      validateItems: function(item) {
        console.log(item);
        let products = item.products;
        let customItems = item.customItems;
        console.log(products);

        if(!products.length && !customItems.length) {
          this.error = 'Please select a product.';
          return false;
        }

        let invalidProduct = _.find(products, (product) => {
          return product.quantity == 0 || !product.quantity;
        });

        let invalidItem = _.find(customItems, (customItem) => {
          return customItem.description == '' || !customItem.description || customItem.points == 0 || !customItem.points;
        });

        if(invalidProduct || invalidItem) {
          this.error = `One of the values are missing.`;
          return false;
        }

        return true;
      },
      appendProducts: function(name, products, formData) {
        products = products.length ? JSON.stringify(products) : '' ;
        formData.append(name, products);

        return formData;
      }
    }
  }
</script>