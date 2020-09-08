<template>
  <div class="col-12">
    <div class="form-group has-label">
      <div class="text-right mb-2">
        <div class="btn btn-primary" @click="showReader" v-if="!show">Use QR Scanner Instead</div>
      </div>

      <div class="text-right mb-2">
        <div class="btn btn-primary text-right mt-2" @click="closeReader" v-if="show">Search Text Instead</div>
      </div>

      <input type="text" name="unique_code" class="form-control" v-model="uniqueCode" @focus="getCodes()" @input="getCodes()" v-on-clickaway="hideCodes" v-if="!show"/>

      <div class="vue-dropdown" v-if="searchCodes.length">
        <div class="dropdown-menu" :class="{ 'vue-show': haveData }">
          <div>
            <div class="dropdown-item text-capitalize" v-for="(searchCode, index) in searchCodes" :key="index" @click="onCodeSelected(searchCode.code)">
              <p class="text-center">{{ searchCode.code }} </p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-right mt-2">
        <div class="btn btn-primary text-right mt-2" v-if="!show" @click="onSubmit()">Redeem</div>
      </div>

      <qrcode-stream @decode="onDecode" :key="render" v-if="show"></qrcode-stream>
    </div>
  </div>
</template>

<script>
  import { mixin as clickaway } from 'vue-clickaway';
  import PromoCodeServices from './../../../services/PromoCodeServices';

  export default {
    mixins: [clickaway],
    data: function() {
      return {
        uniqueCode: null,
        render: 0,
        show: true,
        haveData: false,
        searchCodes: []
      }
    },
    mounted: function() {
      this.render += 1;
    },
    methods: {  
      onDecode: function(result) {
        this.uniqueCode = result;
        this.onSubmit();
      },
      showReader: function() {
        this.show = true;
      },
      closeReader: function() {
        this.show = false;
      },
      getCodes: function() {
        this.uniqueCode = this.uniqueCode ? this.uniqueCode : '';
        
        let query = {
          'search': this.uniqueCode,
          'approved': true
        };
        
        PromoCodeServices.getCodes(query, (data) => {
          this.searchCodes = data.rows;
          this.haveData = true;
        }, (message, response) => {
          this.haveData = false;
        });
      },
      onCodeSelected: function(code) {
        this.uniqueCode = code;
        this.hideCodes();
      },
      hideCodes: function() {
        this.haveData = false;
      },
      onSubmit: function() {
        this.$emit('submit', this.uniqueCode);
      }
    }
  }
</script>