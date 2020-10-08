<template>
  <div class="form-group has-label">
    <label>Check-In Location
      <label class="star">*</label>
    </label>
    <input v-model="searchOutlet" class="form-control" name="location_search" type="text" required="true" autocomplete="off" @focus="getOutlets()" @input="getOutlets()" v-on-clickaway="hideOutlets"/>
    <input v-model="selectedOutlet"  name="location" type="hidden" required="true" />

    <div class="vue-dropdown" v-if="outlets.length != 0">
      <div class="dropdown-menu" :class="{ 'vue-show': haveData }">
        <div v-if="haveData">
          <div class="dropdown-item text-capitalize" v-for="(outlet, index) in outlets" v-bind:key="index" @click="onLocationSelected(outlet)">
            <p class="text-center">{{ outlet.name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';
  import OutletServices from './../../../services/OutletServices';

  export default {
    mixins: [clickaway],
    data: function() {
      return {
        searchOutlet: null,
        selectedOutlet: null,
        outlets: [],
        haveData: false
      }
    },
    methods: {
      getOutlets: function() {
        this.searchOutlet = this.searchOutlet == null ? '' : this.searchOutlet;
        let query = {
          'search': this.searchOutlet
        };

        OutletServices.getOutlets(query, (data) => {
          this.outlets = data.rows;
          this.haveData = true;
        }, (message, response) => {
          this.haveData = false;
          console.log(response, 'err')
        });
      },
      onLocationSelected: function(outlet) {
        this.searchOutlet = outlet.name;
        this.selectedOutlet = outlet.id;
      },
      hideOutlets: function() {
        this.haveData = false;
      }
    }
  }
</script>