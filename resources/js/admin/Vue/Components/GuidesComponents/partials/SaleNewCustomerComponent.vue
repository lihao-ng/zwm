<template>
  <div class="row">
    <div class="col-12 col-md-6">
      <div class="form-group has-label mb-0">
        <label>Customer Name
          <label class="star">*</label>
        </label>
        <input type="text" v-model="name" class="form-control" autocomplete="off" />
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="form-group has-label mb-0">
        <label>Customer Email</label>
        <input type="text" v-model="email" class="form-control" autocomplete="off" />
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="form-group has-label mb-0">
        <label>Customer Mobile
          <label class="star">*</label>
        </label>
        <input type="text" v-model="mobile" class="form-control" autocomplete="off" />
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="form-group has-label mb-0">
        <label>Last 4 digits of NRIC
          <label class="star">*</label>
        </label>
        <input type="text" v-model="nric" class="form-control" autocomplete="off" />
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function() {
      return {
        name: null,
        email: null,
        mobile: null,
        nric: null
      }
    }
  }
</script>