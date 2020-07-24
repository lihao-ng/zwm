<template>
  <div>
    <div class="row emcq-dashboard-row">
      <div class="col-12 emcq-dashboard-col">
        <div class="row">
          <div class="info-box-col col-sm-6">
            <div class="info-box">
              <div class="icons">
                <div class="left">
                  <img src="/images/dashboard/total-profit.png" alt="Total Profit">
                </div>
                <div class="right">
                  <i class="fal fa-info-circle"></i>
                </div>
              </div>
              <h3>Total Revenue</h3>
              <p class="value">MYR 30,000</p>
              <p class="difference more">
                <span class="since">
                  Over last month
                </span>
                <span class="percentage">
                  30%
                  <i class="far fa-arrow-up up"></i>
                </span>
              </p>
            </div>
          </div>
          <div class="info-box-col col-sm-6">
            <div class="info-box">
              <div class="icons">
                <div class="left">
                  <img src="/images/dashboard/total-subscription-blue.png" alt="Total Subscriptions">
                </div>
                <div class="right">
                  <i class="fal fa-info-circle"></i>
                </div>
              </div>
              <h3>Total Subscriptions</h3>
              <p class="value">50,000</p>
              <p class="difference more">
                <span class="since">
                  Over last month
                </span>
                <span class="percentage">
                  10%
                  <i class="far fa-arrow-up up"></i>
                </span>
              </p>
            </div>
          </div>
          <div class="info-box-col col-sm-6">
            <div class="info-box">
              <div class="icons">
                <div class="left">
                  <img src="/images/dashboard/total-students-yellow.png" alt="Total Students">
                </div>
                <div class="right">
                  <i class="fal fa-info-circle"></i>
                </div>
              </div>
              <h3>Total Users</h3>
              <p class="value">30,000,000</p>
              <p class="difference more">
                <span class="since">
                  Over last month
                </span>
                <span class="percentage">
                  99%
                  <i class="far fa-arrow-up up"></i>
                </span>
              </p>
            </div>
          </div>
          <div class="info-box-col col-sm-6">
            <div class="info-box">
              <div class="icons">
                <div class="left">
                  <img src="/images/dashboard/total-students-red.png" alt="Total Teachers">
                </div>
                <div class="right">
                  <i class="fal fa-info-circle"></i>
                </div>
              </div>
              <h3>Total Somthing</h3>
              <p class="value">990</p>
              <p class="difference less">
                <span class="since">
                  Over last month
                </span>
                <span class="percentage">
                  -30%
                  <i class="far fa-arrow-down down"></i>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
		props: {},
	  components: {},
		data: function(){
			return{
				result: {},
			};
		},
		mounted(){
			this.setDefaults();
		},
		methods: {
			setDefaults: function(){

			}
		}
	}
</script>
