<template>
  <div>

    <form class="form-to-validate" action="" method="" enctype="multipart/form-data" v-on:submit.prevent="onSubmit">
      <!-- @csrf -->
      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>First Name *</label>
            <input name="first_name" maxlength="250" type="text" placeholder="First name" class="form-control" value="" v-model="newPlayer.first_name" required>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Last Name *</label>
            <input name="last_name" maxlength="250" type="text" placeholder="Last name" class="form-control" value="" v-model="newPlayer.last_name" required>
          </div>
        </div>
      </div>

      <div class="row email-row">
        <div class="col">
          <div class="form-group has-label">
            <label>Email *</label>
            <input name="email" maxlength="250" type="text" placeholder="Email" class="form-control" value="" autocomplete="off" v-model="newPlayer.email" v-on:input="emailCheck" required v-bind:disabled="isEdit">
            <div class="checker-loader"><i class="fas fa-spinner fa-pulse"></i></div>
            <div id="email_valid" class="valid-feedback">Looks good!</div>
            <div id="email_invalid" class="invalid-feedback">This email is not valid, please try another one</div>
          </div>
        </div>
          <!-- <div class="col">
            <div class="form-group has-label">
              <label>Password</label>
              <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
          </div> -->
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Date of birth</label>
            <div class="input-group date">
              <!-- <datetime format="YYYY-MM-DD" v-model="newPlayer.birth_date" class="form-control admin-input-no-border"></datetime> -->
              <!-- <input type="text" maxlength="10" v-model="newPlayer.birth_date" @keyup="dateChecker(newPlayer.birth_date)" placeholder="yyyy-mm-dd" class="form-control"> -->
              <!-- <input class="span2 form-control" v-model="newPlayer.birth_date" size="16" id="datetimepicker_player" type="text" value="12-02-2012" placeholder="yyyy-mm-dd" data-date-format="YYYY-MM-DD"> -->
              <datepicker class="date-picker form-control" format="dd-MM-yyyy" v-model="newPlayer.birth_date" placeholder="Select date" @closed="onDateSelected(newPlayer.birth_date)"></datepicker>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Origin *</label>
            <input name="origin" maxlength="20" type="text" placeholder="Origin" class="form-control" value="" v-model="newPlayer.origin" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Region *</label>
            <select id="player_region" name="region" v-model="newPlayer.region_id" class="form-control" required>
              <option value="0">None</option>
              <option v-for="(region, index) in regions" v-bind:key="index" v-bind:value="region.id">{{region.name}}</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>League *</label>
            <select id="player_league" name="league" v-model="newPlayer.league_id" class="form-control" required>
              <option value="0">None</option>
              <option v-for="(league, index) in leagues" v-bind:key="index" v-bind:value="league.id">{{league.name}}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Qualification </label>
            <input name="qualification" maxlength="20" type="text" placeholder="Qualification" class="form-control" value="" v-model="newPlayer.qualification">
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Rank </label>
            <input name="rank" maxlength="20" type="text" placeholder="Rank" class="form-control" value="" v-model="newPlayer.rank">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Position </label>
            <input name="position" maxlength="20" type="text" placeholder="Goalkeeper / Striker / Midfielder" class="form-control" value="" v-model="newPlayer.position">
          </div>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="form-group has-label">
            <label>Experience </label>
            <input name="experience" maxlength="20" type="text" placeholder="Experience" class="form-control" value="" v-model="newPlayer.experience">
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Profile photo </label>
            <input name="avatar" id="player_avatar" type="file" placeholder="Upload profile photo" ref="avatar" class="form-control" v-on:change="onFileChange">
          </div>
        </div>
        <div id="preview" v-if="imgUrl" class="col-md-4 col-lg-2 p-3">
          <img class="h-100" :src="imgUrl" />
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Description </label>
            <textarea name="description" maxlength="300" type="text" placeholder="Description" class="form-control" value="" v-model="newPlayer.description"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>History *</label>
            <textarea name="history" maxlength="300" type="text" placeholder="History" class="form-control" value="" v-model="newPlayer.history" required></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Feature this player </label>
            <input name="is_featured" class="d-block" type="checkbox" value="1" v-model="newPlayer.is_featured">
          </div>
        </div>

        <!-- <div class="col">
          <div class="form-group has-label text-right">
            <label class="">Verify this player </label>
            <input name="is_verified" class="d-block ml-auto" type="checkbox" value="1" v-model="newPlayer.is_verified">
          </div>
        </div> -->
      </div>


      <div class="mt-5">
        <player-team-statistic-form
          :is-edit="isEdit"
          @statFormChange="onChildFormChange"
          :owner-type="ownerType"
          :current-owner="player"
          :current-statistic="statistic"
          >
        </player-team-statistic-form>
      </div>

      <div class="row">
        <div class="col mt-5">
          <h3 class="mb-3">Team(s)</h3>
        </div>

      </div>

      <div class="row">
        <div class="col">
          <player-team-assign-component ref="getPlayerTeams" :current-player-teams="currentPlayerTeams"></player-team-assign-component>
        </div>
      </div>

      <div class="row">
        <div class="col text-right">
          <button v-if="!isEdit" type="submit" value="Submit" class="btn btn-primary">Create</button>
          <button v-else type="submit" value="Submit" class="btn btn-primary">Save</button>
        </div>
      </div>

    </form>

  </div>
</template>

<script>

  import PlayerTeamAssign from '../Player_Team/PlayerTeamAssignComponent.vue';
  import datepicker from 'vuejs-datepicker';

  var delayedCheck, emailValid, emailNotValid, isEmailOk, checkerLoader;
  var delayTimeMs = 1200;

  export default {

    props: [
      'isEdit', 'regions', 'leagues', 'teams', 'player', 'statistic', 'ownerType', 'currentPlayerTeams'
    ],


    components: {
      datepicker,
      'player-team-assign-component': PlayerTeamAssign
    },


    data: function(){

      return {
        newPlayer: {},
        emailToCheck: {},
        imgUrl: null,
      }
    },

    mounted() {
      this.onInit();
      this.anyChecking();
    },


    methods: {

      anyChecking(){
        // console.log('playerForm::currentPlayerTeams : ' + JSON.stringify(this.currentPlayerTeams));
      },

      onDateSelected(date){
        
        let newDate = new Date(date);
        let sDay = newDate.getDate();
        let sMonth = newDate.getMonth() + 1;
        let sYear = newDate.getFullYear();

        sMonth = sMonth<10 ? `0${sMonth}` : sMonth;
        sDay = sDay<10 ? `0${sDay}` : sDay;
        this.newPlayer.birth_date = `${sYear}-${sMonth}-${sDay}`;

      },

      onInit: function(){

        emailValid = $('#email_valid');
        emailNotValid = $('#email_invalid');
        checkerLoader = $('.checker-loader');

        checkerLoader.addClass('d-none');

        if(this.isEdit){
          isEmailOk = true;
          this.newPlayer = this.player;
          this.newPlayer.statistic = this.statistic;
        }
      },

      onChildFormChange(data){
        this.newPlayer.statistic = data;
      },

      getFormRoute: function(){

        if(!this.isEdit){
          return '/admin/players';
        }
        return `/admin/players/${this.newPlayer.id}`;
      },

      onFileChange(){

        var imageUploaded = this.$refs.avatar.files[0];
        this.newPlayer.avatar = imageUploaded;

        // const file = e.target.files[0];
        this.imgUrl = URL.createObjectURL(imageUploaded);
      },

      emailCheck(){

        isEmailOk = false;
        checkerLoader.addClass('d-block');
        checkerLoader.removeClass('d-none');

        emailNotValid.removeClass('d-block');
        emailNotValid.addClass('d-none');

        emailValid.removeClass('d-block');
        emailValid.addClass('d-none');

        if(delayedCheck!=undefined){
          clearTimeout(delayedCheck);
        }

        delayedCheck = setTimeout(() => {

          this.emailToCheck.email = this.newPlayer.email;

          let formData = new FormData();
          formData.append('isToValidate', true);
          formData.append('email', JSON.stringify(this.emailToCheck));

          axios.post(
              this.getFormRoute(),
              formData
            )
            .then(function(response){

              if( (response.data) == true ){
                emailValid.removeClass('d-none');
                emailValid.addClass('d-block');
                isEmailOk = true;
              }
              else{
                emailNotValid.removeClass('d-none');
                emailNotValid.addClass('d-block');
                alert(response.data);
              }
              checkerLoader.addClass('d-none');
              checkerLoader.removeClass('d-block');
            })
            .catch(function(error){
              console.log("emailCheck error: "+error);
            })

        }, delayTimeMs);
      },

      onSubmit(e){

        if(!isEmailOk){
          alert('Please check the validity of the field(s)');
          return;
        }

        this.newPlayer.player_teams = this.$refs.getPlayerTeams.teams; 
        this.newPlayer.is_verified = 1; 

        var playerObject = JSON.stringify(this.newPlayer);
        var playerImage = this.newPlayer.avatar;        

      // TESTING PURPOSE
        // console.log('playerForm', playerObject);
        // return;
      // TESTING PURPOSE
        
        let formData = new FormData();
        formData.append('data', playerObject);
        formData.append('image', playerImage);

        axios.post(
          this.getFormRoute(),
          formData,
          { headers: {'Content-Type' : 'multipart/form-data'} }
        )
        .then(function(response){
          // alert(response.data);
          location.href = response.data;
        })
        .catch(function(error){
          console.log('error : ' + error);
        })

      }
    }
  }
</script>

<style lang="scss">

  @media (max-width:768px){

    #preview {
      height: 20vh;
    }
  }

  @media screen and (min-width: 769px) {
    #preview img{
      width: 100%;
    }
  }

  .date-picker.form-control{

    padding: 0;

    :first-child{
      height: 100%;
    }

    input{
      height: 100%;
      width: 100%;
      border: none !important;
      padding: 6px 12px;
    }
  }

</style>
