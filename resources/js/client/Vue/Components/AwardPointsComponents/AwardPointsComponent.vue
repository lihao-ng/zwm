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
                <user-account-component ref="account"></user-account-component>

                <award-item-component ref="item"></award-item-component>

                <div class="col text-right my-2">
                  <button type="submit" value="Submit" class="btn btn-primary" @click="onSubmit()">Award Points</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
          console.log(error);
          this.error = error;
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