<template>
  <div class="col-12 mb-3">
    <div class="table-responsive text-center">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Points Per Item</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(product, index) in products" :key="index">
            <th scope="row">{{ product.id }}</th>
            <td>{{ product.name }}</td>
            <td>
              <input type="number" v-model="product.quantity" class="form-control" min="1" />
            </td>
            <td>{{ product.points }}</td>
            <td class="text-center" style="font-size:30px;" @click="deleteProduct(product, index)">
              <i class="fa fa-times" style="color:#FB404B" aria-hidden="true"></i>
            </td>
          </tr>

          <tr v-for="(customItem, index) in customItems" :key="index + 100">
            <td colspan="3">
              <textarea v-model="customItem.description" class="form-control" placeholder="Add item description"></textarea>
            </td>
            <td>
              <input type="number" v-model="customItem.points" class="form-control" min="1" />
            </td>
            <td class="text-center" style="font-size:30px;" @click="deleteCustomItem(index)">
              <i class="fa fa-times" style="color:#FB404B" aria-hidden="true"></i>
            </td>
          </tr>

          <tr v-if="products.length || customItems.length">
            <td colspan="3" class="font-weight-bold">Total Points</td>
            <td colspan="2" class="font-weight-bold">{{ totalPrice }}</td>
          </tr>

          <tr v-if="!products.length && !customItems.length">
            <td colspan="5" class="font-weight-bold">No Items. Please search for an item.</td>
          </tr>
        </tbody>
      </table>

      <div class="text-right mt-2">
        <div class="btn btn-primary pull-right" @click="addCustomItem">Add a custom item</div>
      </div>
    </div>
    
    <div class="row mt-2">
      <div class="col-12">
        <div class="form-group has-label mb-0">
          <label>Item</label>
          <input type="text" v-model="name" class="form-control" @focus="getProducts()" @input="getProducts()" v-on-clickaway="hideProducts" />
        </div>

        <div class="vue-dropdown" v-if="searchProducts.length">
          <div class="dropdown-menu" :class="{ 'vue-show': haveData }">
            <div>
              <div class="dropdown-item text-capitalize" v-for="(searchProduct, index) in searchProducts" :key="index" @click="onProductSelected(searchProduct)">
                <p class="text-center">{{ searchProduct.name }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';
  import AwardPointServices from './../../../services/AwardPointServices';

  export default {
    mixins: [clickaway],
    data: function() {
      return {
        name: null,
        haveData: false,
        products: [],
        searchProducts: [],
        existingIds: [],
        customItems: []
      }
    },
    computed: {
      totalPrice: function() {
        var totalProducts = _.sumBy(this.products, (product) => {
          return parseInt(product.quantity * product.points);
        });

        var totalCustomItems = _.sumBy(this.customItems, (customItem) => {
          return parseInt(customItem.points)
        });

        return totalProducts + totalCustomItems;
      }
    },  
    methods: {
      addCustomItem: function() {
        this.customItems.push({
          'description': null,
          'points': 1
        });
      },
      deleteCustomItem: function(index) {
        this.customItems.splice(index, 1);
      },
      addProduct: function(product = null) {
        let id, name, points  = null;
        
        if(product) {
          id = product.id;
          name = product.name;
          points = product.points;
        }

        this.products.push({
          'id': id,
          'name': name,
          'quantity': 1,
          'points': points
        });

        this.existingIds.push(id);
      },
      getProducts: function(name, index) {
        this.name = this.name ? this.name : '';
        
        let query = {
          'search': this.name,
          'ids': JSON.stringify(this.existingIds)
        };
        
        AwardPointServices.getProducts(query, (data) => {
          this.searchProducts = data.rows;
          this.haveData = true;
        }, (message, response) => {
          this.haveData = false;
        });
      },
      onProductSelected: function(product) {
        this.addProduct(product);
      },
      hideProducts: function() {
        this.haveData = false;
      },
      deleteProduct: function(product, index) {
        this.existingIds = _.remove(this.existingIds, (id) => {
          return id != product.id
        });

        this.products.splice(index, 1);
      }
    }
  }
</script>