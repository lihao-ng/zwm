<template>
  <div class="">

    <div v-for="(team, index) in teams" :key="index">

      <div class="row">
        <div class="col-1 text-center align-self-center">
          <h5>{{index+1}}</h5>
        </div>

        <div class="col-11">
          <div class="row">
            <div class="col">
              <div class="form-group has-label">
                <div class="d-flex">
                  <label for="">Team name *</label>
                  <a class="ml-auto btn text-danger" @click="deleteTeam(index)">Delete</a>
                </div>
                <input name="team_name" maxlength="250" type="text" autocomplete="off" placeholder="Team name" class="form-control" v-model="team.pivot.team_name" value="" @focus="onTeamNameFocus(team, index)" @keyup="teamSearch(team, index, false)" required>
                <div class="dropdown">
                  <!-- :class="{show : team.showList}" -->
                  <div class="dropdown-menu w-100"  ref="teamsInputDropdown" >
                    <div class="dropdown-item"  @click="onTeamSelected(team, index, sTeam, sIndex)" v-for="(sTeam, sIndex) in teamsSearched" :key="sIndex">
                      {{ sTeam.name }}
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group has-label">
                <label for="">Year start *</label>
                <input name="year_start" type="text" maxlength="4" v-model="team.pivot.year_start" placeholder="Team start year" class="form-control" value="" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group has-label">
                <label for="">Year end</label>
                <input name="year_end" type="text" maxlength="4" v-model="team.pivot.year_end" placeholder="Team end year" class="form-control" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <hr>

    </div>

    
    <div class="row">
      <div class="col">
        <button @click="onTeamAdded()" type="button" class="btn btn-secondary">Add Team</button>
      </div>
    </div>

  </div>
</template>

<script>

  var inputDropdown;

  export default {

    props: [
      'currentPlayerTeams'
    ],

    data: function(){
      return {
        query: '',
        teams: [],
        teamsSearched: [],
        teamsOptionLength: null
      };
    },

    mounted(){
      this.anyTest();
      this.onInit();
    },

    methods: {

      anyTest(){
      },

      deleteTeam(sIndex){
        this.teams.splice(sIndex, 1);
      },

      onTeamNameFocus(team, index){
        this.teamSearch(team, null, false);
        inputDropdown = this.$refs.teamsInputDropdown;
        inputDropdown[index].classList.add('show');
      },

      onTeamSelected(team, index, sTeam, sIndex){
        
        team.pivot.team_name = sTeam.name;
        inputDropdown[index].classList.remove('show');
        //result is an array so can't accest name
        // this.$emit('sTeamSelected', sTeam);
        // team.showList = false;
      },

      onTeamAdded(){

        for(let a=0; a<this.teams.length; a++){
          if( (this.teams[a].pivot.team_name) == ""){
            alert('Please fill up the team name');
            return;
          }
        }

        this.teams.push({
          pivot: {
            team_name: ''
          }
        });

      },

      teamSearch(team, index, isFirstCall){

        var searchKey;

        searchKey = isFirstCall ? " " : team.pivot.team_name;

        axios.get('/admin/teams/search?key=' + searchKey)
        .then( (response) => {
          this.teamsSearched = response.data;
          if(!isFirstCall){
            team.showList = true;
          }
          else{
            this.teamsOptionLength = this.teamsSearched.length;
          }
        })
        .catch(function(response){
          console.log( 'team search :: catch - response : ' + response );
        });

      },

      onInit(){
        
        this.teamSearch(null, null, true);

        if(this.currentPlayerTeams && this.currentPlayerTeams.length>0){
          this.teams = this.currentPlayerTeams;
        }

        document.addEventListener("click", this.handleClickOutside);
      },

      handleClickOutside(event){

        if(!this.$el.contains(event.target)){
          
          inputDropdown = this.$refs.teamsInputDropdown;

          var nTeams = this.teams;

          if(inputDropdown!=undefined){
            for(let i=0; i<inputDropdown.length; i++){
              inputDropdown[i].classList.remove('show');
            }
          }
        }
      }
    }

  }
</script>
