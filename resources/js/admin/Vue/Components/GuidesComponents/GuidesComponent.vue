<template>
  <form @submit.prevent>
    <div class="alert alert-danger" v-if="error">
      <p>{{ error }}</p>
    </div>

    <div class="row">
      <div class="col">
        <div class="card p-3">
          <div class="card-body">
            <div class="row align-items-end mb-3">
              <div class="col">
                <h3>Create Guide</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-6 mb-3">
                <div class="form-group has-label">
                  <label>Name</label>
                  
                  <input type="text" name="name" class="form-control" v-model="name" required/>
                </div>
              </div>

              <div class="col-12 col-md-6 mb-3">
                <div class="form-group has-label">
                  <label>Category</label>
                  
                  <select class="form-control" v-model="category" required>
                    <option>Metal</option>
                    <option>Plastic</option>
                    <option>Paper</option>
                    <option>Fabric</option>
                    <option>Glass</option>
                    <option>E-Waste</option>
                  </select>
                </div>
              </div>

              <!-- <div class="col-12 mb-3">
                <div class="form-group has-label">
                  <label>Photo</label>
                  <input type="file" class="form-control" id="customFile" @change="receiptUpload()">
                  <label class="custom-file-label" for="customFile">{{ receiptLabel }}</label>
                </div>
              </div> -->

              <div class="col-12 mb-3">
                <div class="form-group has-label">
                  <label>Description</label>
                  <textarea class="form-control" rows="4" cols="54" v-model="description"></textarea>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="form-group has-label">
                  <label>Recyclable</label>
                  <select class="form-control" v-model="recyclable" required>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
        <div class="card p-3">
          <div class="card-body">
            <div class="row align-items-end mb-3">
              <div class="col-12 col-sm-6">
                <h3>Contents</h3>
              </div>

              <div class="col-12 col-sm-6 text-right">
                <div class="btn btn-primary" @click="addContent">Add content</div>
              </div>
            </div>

            <div class="container">
              <div class="row mb-3" style="border-color:#eee;box-shadow: 4px 3px 4px 1px #eee;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem;" v-for="(content, index) in contents" :key="index" v-if="!content.deleted">
                <div class="col-12 text-right" style="font-size:30px;">
                  <i class="fa fa-times" style="color:#FB404B" aria-hidden="true" @click="deleteContent(index)"></i>
                </div>

                <div class="col-12">
                  <div class="form-group has-label">
                    <label>Name</label>
                    
                    <input type="text" name="name" class="form-control" v-model="content.name" required/>
                  </div>
                </div>
              
                <div class="col-12 mb-3">
                  <div class="form-group has-label">
                    <label>Description</label>
                    <textarea class="form-control" rows="4" cols="54" v-model="content.description"></textarea>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row pt-3">
              <div class="col text-right">
                <button type="submit" value="Submit" class="btn btn-primary" @click="onSubmit()">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
  import GuideServices from './../../services/GuideServices';

  export default {
    props: ['guideProp'],
    data: function() {
      return {
        error: null,
        guide: {},
        name: null,
        category: null,
        description: null,
        recyclable: null,
        contents: [],
      }
    },
    mounted: function() {
      this.setDefault();
    },
    methods: { 
      setDefault: function() {
        if(this.guideProp) {
          this.guide = JSON.parse(this.guideProp);

          this.name = this.guide.name;
          this.category = this.guide.category;
          this.description = this.guide.description;
          this.recyclable = this.guide.recyclable;
          this.contents = this.guide.contents;
          return;
        }

        this.category = 'Plastic';
        this.recyclable = 'Yes';
        this.addContent();
      },
      addContent: function() {
        this.contents.push({
          'id': -1,
          'name': null,
          'description': null,
          'deleted' : false
        });
      },
      deleteContent: function(index) {
        if(this.contents.length == 1) {
          return;
        }

        let content = this.contents[index];
  
        if(content.id != -1) {
          Vue.set(content, 'deleted', true);
          return;
        }

        this.contents.splice(index, 1);
      },
      onSubmit: function() { 
        let formData = new FormData();
        let validateItems = this.validateItems(this.contents);
        
        if(!validateItems) {
          return;
        }

        formData.set('name', this.name);
        formData.set('category', this.category);
        formData.set('description', this.description);
        formData.set('recyclable', this.recyclable);
        formData = this.appendItems('contents', this.contents, formData);

        if(this.guide) {
          GuideServices.update(this.guide.id, formData, (data) => {
            window.location.href = data;
          }, (error) => {
            this.error = error;
          });
          return; 
        }

        GuideServices.create(formData, (data) => {
          window.location.href = data;
        }, (error) => {
          this.error = error;
        });
      },
      validateItems: function(items) {
        if(!items.length) { 
          this.error = 'Please enter a content';
          return false;
        }

        let invalidItem = _.find(items, (item) => {
          return item.name == null || item.description == null;
        });

        if(invalidItem) {
          this.error = 'One of the values are missing.';
          return false;
        }

        return true;
      },
      appendItems: function(name, items, formData) {
        items = items.length ? JSON.stringify(items) : '';
        formData.append(name, items);

        return formData;
      }
    }
  }
</script>