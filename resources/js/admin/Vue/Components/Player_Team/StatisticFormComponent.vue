<template>
  <div v-on:change="onFormChange">

    <!-- <form action="" v-on:submit.prevent="onSubmit" v-on:change="onFormChange"> -->

      <div class="row">
        <div class="col-sm-12 mb-3">
          <h3 v-if="this.ownerType===const_player">Player Statistic</h3>
          <h3 v-else-if="this.ownerType===const_team">Team Statistic</h3>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Durability *</label>
            <input name="durability" type="number" step="0.01" min="0" max="10" placeholder="Durability (0 to 10)" class="form-control"
            value="" v-model="newStatistic.durability" required>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label>Agility *</label>
            <input name="agility" type="number" step="0.01" min="0" max="10" placeholder="Agility (0 to 10)" class="form-control" value=""  v-model="newStatistic.agility" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Endurance *</label>
            <input name="endurance" type="number" step="0.01" min="0" max="10" placeholder="Endurance (0 to 10)" class="form-control"
            value="" v-model="newStatistic.endurance" required>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label>Speed *</label>
            <input name="speed" type="number" step="0.01" min="0" max="10" placeholder="Speed (0 to 10)" class="form-control" value="" v-model="newStatistic.speed" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Pass *</label>
            <input name="pass" type="number" step="0.01" min="0" max="10" placeholder="Pass (0 to 10)" class="form-control"
            value="" v-model="newStatistic.pass" required>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label>Defense *</label>
            <input name="defense" type="number" step="0.01" min="0" max="10" placeholder="Defense (0 to 10)" class="form-control" value="" v-model="newStatistic.defense" required>
          </div>
        </div>
      </div>

      <!-- <div class="row">
        <div class="col">
          <button type="submit" value="Submit" class="btn btn-primary">Save</button>
        </div>
      </div> -->


    <!-- </form> -->

  </div>
</template>

<script>

  var PLAYER = 'Player', TEAM = 'Team';

  export default {

    props: [
      'isEdit', 'ownerType', 'currentOwner', 'currentStatistic'
    ],


    data: function(){
      return{
        newOwner: {},
        newStatistic: {},
        const_player : PLAYER,
        const_team : TEAM
      }
    },


    created() {

    },

    mounted: function(){

      this.forTesting();
      this.onInit();
    },


    methods:{

      forTesting(){
        // console.log('statisticForm::isEdit : '+this.isEdit);
      },

      onInit: function(){

        if(this.isEdit){
          if( (this.currentStatistic==null) || (this.currentStatistic==undefined) ){
            this.newStatistic.owner_id = this.currentOwner.id;
            this.newStatistic.owner_type = this.ownerType;
          }
          else{
            this.newStatistic = this.currentStatistic;
          }
        }

      },

      onFormChange(){
        this.$emit('statFormChange', this.newStatistic);
      }

    }
  }
</script>
