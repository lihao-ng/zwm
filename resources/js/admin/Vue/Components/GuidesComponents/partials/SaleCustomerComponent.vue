<template>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-12">
          <div class="form-group has-label mb-0">
            <label>Customer
              <label class="star">*</label>
            </label>
            <input type="text" v-model="searchCustomer" class="form-control" autocomplete="off" @focus="getCustomers()" @input="getCustomers()" v-on-clickaway="hideCustomers"/>
          </div>
        </div>
      </div>

      <div class="vue-dropdown" v-if="customers.length">
        <div class="dropdown-menu" :class="{ 'vue-show': haveData }">
          <div v-if="haveData">
            <div class="dropdown-item text-capitalize" v-for="(customer, index) in customers" v-bind:key="index" @click="onCustomerSelected(customer)">
              <p class="text-center" v-if="customer.name == -1">{{ customer.message }}</p>
              <p class="text-center" v-else>{{ customer.name }} | {{ customer.mobile }} - {{ customer.nric }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';
  import CustomerServices from './../../../services/CustomerServices';

  export default {
    mixins: [clickaway],
    data: function() {
      return {
        searchCustomer: null,
        selectedCustomer: null,
        customers: [],
        haveData: false,
      }
    },
    watch: {
      searchCustomer: function() {
        if(this.searchCustomer == '') {
          this.selectedCustomer = null;
        }
      }
    },
    methods: {
      checkCustomers: function(trueValue, falseValue = '') {
        if(this.customers.length == 0 && this.haveData && !this.selectedCustomer) {
          return trueValue;
        }

        return falseValue;
      },
      getCustomers: function() {
        this.searchCustomer = this.searchCustomer == null ? '' : this.searchCustomer;
        let query = {
          'search': this.searchCustomer
        };

        CustomerServices.getCustomers(query, (data) => {
          this.customers = data.rows;
          this.haveData = true;

          if(!this.customers.length) {
            this.customers.push({
              'name': -1,
              'message': 'No customers found. Click here to add a new customer.'
            });
          }
        }, (message, response) => {
          this.haveData = false;
          console.log(response, 'err')
        });
      },
      onCustomerSelected: function(customer) {
        if(customer.name == -1) {
          this.selectedCustomer = null;
          this.$emit('newCustomer', true);
          return;
        }

        this.searchCustomer = customer.name + ' | ' + customer.mobile + ' - ' + customer.nric;
        this.selectedCustomer = customer.id;
      },
      hideCustomers: function() {
        this.haveData = false;
      }
    }
  }
</script>