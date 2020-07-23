<template>
	<notifications
		group="centric__notification"
		:duration="3000"
		width="70%"
		animation-name="v-fade-left"
		position="top left">

    <template slot="body" slot-scope="props">
			<div class="alert custom-alert d-flex flex-row" :class="props.item.type" role="alert">
				<p class="alert-description">
					{{ props.item.text }}
				</p>
				<i class="fal fa-times action-icon-close my-auto" @click="onClose($event, props)"></i>
			</div>
    </template>
  </notifications>
</template>

<script>
	export default {
		props: [],
		data: function(){
			return {
				hide: false,
			};
		},
		mounted(){

		},
		methods: {
			onClose: function(e, props){
				$(e.target).parent().addClass('hidden');
				props.close();
			}
		}
	}
</script>

<style lang="scss" scoped>
	.notifications{
		position: fixed;
		left: 260px;
	}
	.custom-alert .alert-description {
    margin-bottom: 0;
	}
</style>
