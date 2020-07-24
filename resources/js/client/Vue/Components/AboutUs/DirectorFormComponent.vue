<template>
  <div>
    <form action="" enctype="multipart/form-data" @submit.prevent="onFormSubmit()">

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>First Name *</label>
            <input name="first_name" maxlength="250" type="text" placeholder="First name" class="form-control" value="" v-model="newDirector.first_name" required>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Last Name *</label>
            <input name="last_name" maxlength="250" type="text" placeholder="Last name" class="form-control" value="" v-model="newDirector.last_name" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Email *</label>
            <input name="email" maxlength="250" type="text" placeholder="Email" class="form-control" value="" v-model="newDirector.email" v-bind:disabled="isEdit" required>
          </div>
        </div>
        <div class="col">
          <div class="form-group has-label">
            <label>Origin *</label>
            <input name="origin" maxlength="250" type="text" placeholder="Origin" class="form-control" value="" v-model="newDirector.origin" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Profile photo </label>
            <input name="avatar" type="file" placeholder="Upload profile photo" ref="avatar" class="form-control" v-on:change="onFileChange">
          </div>
        </div>

        <div id="preview" v-if="imgUrl" class="col-md-4 col-lg-2 p-3">
          <img class="h-100" :src="imgUrl" />
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group has-label">
            <label>Description *</label>
            <textarea name="description" maxlength="250" type="text" placeholder="Description" class="form-control" value="" v-model="newDirector.description" required></textarea>
          </div>
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

export default {
  
  props:[
    'isEdit',
    'director'
  ],

  data(){
    return{
      newDirector: {},
      url: "/admin/directors",
      imgUrl: "",
      errorMessage: ""
    }
  },

  mounted(){
    this.onInit();
    this.anyChecking();
  },

  methods:{

    anyChecking(){
      // console.log("anychecking::"+this.newDirector);
    },

    onInit(){


      this.newDirector = this.isEdit ? this.director : {} ;
    },

    getFormRoute: function(){

      if(!this.isEdit){
        return '/admin/directors';
      }
      return `/admin/directors/${this.newDirector.id}`;
    },

    onFileChange(){

      var imageUploaded = this.$refs.avatar.files[0];
      this.newDirector.avatar = imageUploaded;

      // const file = e.target.files[0];
      this.imgUrl = URL.createObjectURL(imageUploaded);
    },

    onFormSubmit(){

      // console.log("onFormSubmit");

      var directorObject = JSON.stringify(this.newDirector);
      var directorImage = this.newDirector.avatar;   

      let formData = new FormData();
      formData.append('data', directorObject);
      formData.append('image', directorImage);



      axios.post(
        this.getFormRoute(),
        formData,
        { headers: {'Content-Type' : 'multipart/form-data'} }
      )
      .then((response)=>{
        location.href = response.data;
      })
      .catch((response)=>{
        this.errorMessage = response;
        console.log("error::"+response);
      });
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

</style>