<template>
  <div>

    <form class="" action="" method="" enctype="multipart/form-data" v-on:submit.prevent="onSubmit">
      <!-- @csrf -->
      <div class="row">

        <div class="col-lg-6">
          <div class="form-group has-label">
            <label>Team Name *</label>
            <input name="name" maxlength="250" type="text" placeholder="Team name" class="form-control" autocomplete="off" @input="onNameInput" value="" v-model="newTeam.name" required>
            <div class="checker-loader"><i class="fas fa-spinner fa-pulse"></i></div>
            <div class="valid-feedback name-valid">Looks good!</div>
            <div class="invalid-feedback name-invalid">This name is not valid, please try another one</div>
          </div>
        </div>

        <div class="col">
          <div class="form-group has-label">
            <label>Team photo </label>
            <input name="cover_image" type="file" placeholder="Upload profile photo" ref="cover_image" class="form-control" v-on:change="onImageUpload">
          </div>
        </div>
        <div id="preview" v-if="imgUrl" class="col-md-4 col-lg-2 p-3">
          <img class="h-100" :src="imgUrl" />
        </div>

      </div>


      <div class="row">
        <div class="col-12">
          <div class="form-group has-label">
            <label>Origin *</label>
            <input name="origin" maxlength="20" type="text" placeholder="Origin" class="form-control" v-model="newTeam.origin" value="" required>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group has-label">
            <label>History *</label>
            <textarea name="history" maxlength="300" type="text" placeholder="History" class="form-control" v-model="newTeam.history" value="" required></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Region *</label>
            <select name="region" class="form-control" v-model="newTeam.region_id" required>
              <option value="0">None</option>
              <option v-for="(region, index) in regions" :key="index" v-bind:value="region.id">{{region.name}}</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>League *</label>
            <select name="league" class="form-control" v-model="newTeam.league_id" required>
              <option value="0">None</option>
              <option v-for="(league, index) in leagues" v-bind:key="index" v-bind:value="league.id">{{league.name}}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Team Number </label>
            <input name="team_n" maxlength="5" type="text" placeholder="Team number" v-model="newTeam.team_n" class="form-control" value="">
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Rank </label>
            <input name="rank" maxlength="20" type="text" placeholder="Rank" class="form-control" v-model="newTeam.rank" value="">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Qualification </label>
            <input name="qualification" maxlength="20" type="text" placeholder="Qualification" v-model="newTeam.qualification" class="form-control" value="">
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Established </label>
            <input name="established" maxlength="20" type="text" placeholder="Established" v-model="newTeam.established" class="form-control" value="">
          </div>
        </div>
      </div>

      <div class="mt-4">
        <player-team-statistic-form
          :is-edit="isEdit"
          @statFormChange="onChildFormChange"
          :owner-type="ownerType"
          :current-owner="currentTeam"
          :current-statistic="statistic"
          >
        </player-team-statistic-form>
      </div>

      <div class="row">
        <div class="col">
          <button v-if="!isEdit" type="submit" value="Submit" class="btn btn-primary">Create</button>
          <button v-else type="submit" value="Submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>

  </div>
</template>

<script>

  var delayedCheck, isNameOk, nameValid, nameNotValid, checkerLoader;
  var delayTimeMs = 1200;

  export default {

    props: [
      'isEdit', 'regions', 'leagues', 'currentTeam', 'ownerType', 'statistic'
    ],


    data: function(){
      return {
        newTeam: {},
        nameCheck: {},
        imgUrl: null,
        currentTeamName: ""
      }
    },


    mounted: function(){
      this.onInit();

      this.anyTesting();
    },


    methods: {

      anyTesting(){
        // console.log("team name:: "+this.currentTeamName);
      },

      onInit(){

        nameNotValid = $('.name-invalid');
        nameValid = $('.name-valid');
        checkerLoader = $('.checker-loader');

        checkerLoader.addClass('d-none');

        if(this.isEdit){
          isNameOk = true;
          this.newTeam = this.currentTeam;
          this.newTeam.statistic = this.statistic;
          this.currentTeamName = this.currentTeam.name;
        }
      },

      onImageUpload: function(){
        var imageUploaded = this.$refs.cover_image.files[0];
        this.newTeam.cover_image = imageUploaded;

        console.log("imageUploaded::"+imageUploaded);
        
        this.imgUrl = URL.createObjectURL(imageUploaded);

        console.log("this.imgUrl::"+this.imgUrl);
      },

      onChildFormChange(data){
        this.newTeam.statistic = data;
      },

      getFormRoute: function(){

        if(this.isEdit){
          return `/admin/teams/${this.newTeam.id}`;
        }
        return '/admin/teams';
      },

      onNameInput(){

        if(delayedCheck!=undefined){
          clearTimeout(delayedCheck);
          checkerLoader.removeClass('d-block');
          checkerLoader.addClass('d-none');
          nameValid.removeClass('d-block');
          nameNotValid.removeClass("d-block");
        }

        if((this.newTeam.name) === (this.currentTeamName)){
          return
        }

        checkerLoader.addClass('d-block');
        checkerLoader.removeClass('d-none');
        // nameValid.addClass('d-none');
        nameValid.removeClass('d-block');
        nameNotValid.removeClass("d-block");
        // nameNotValid.addClass("d-none");

        isNameOk = false;

        delayedCheck = setTimeout(() => {

          this.nameCheck.name = this.newTeam.name;

          let formData = new FormData();
          formData.append('isToValidate', true);
          formData.append('name', JSON.stringify(this.nameCheck));

          axios.post(
              "/admin/teams",
              formData
            )
            .then(function(response){
              if( (response.data) == true ){
                nameValid.addClass('d-block');
                nameNotValid.removeClass('d-block');
                isNameOk = true;
              }
              else{
                nameNotValid.addClass('d-block');
                nameValid.removeClass('d-block');
                alert(response.data);
              }
              checkerLoader.removeClass('d-block');
              checkerLoader.addClass('d-none');
            })
            .catch(function(error){
              console.log('error : ' + error);
            })

        }, delayTimeMs);
      },

      onSubmit: function(){

        if(!isNameOk){
          alert('Please check the validity of the field(s)');
          return;
        }

        var teamObject = JSON.stringify(this.newTeam);
        var teamImage = this.newTeam.cover_image;

        let formData = new FormData();
        formData.append('data', teamObject);
        formData.append('cover_image', teamImage);
  
        axios.post(
          this.getFormRoute(),
          formData,
          { headers: {'Content-Type' : 'multipart/form-data'} }
        )
        .then(function(response){
          location.href = response.data;
        })
        .catch(function(error){
          console.log('error : ' + error);
        })

      }
    }


  }

</script>

<style scoped>

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

</style>

