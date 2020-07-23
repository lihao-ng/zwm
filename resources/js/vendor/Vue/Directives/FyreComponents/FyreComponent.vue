<template>
	<div class="modal fade fyre__modal" :id="id" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
				</div>
				<div class="modal-body">
          <button class="fyre-close-btn" @click="closeFyre">
            <i class="fas fa-times"></i>
          </button>
					<div class="fyre__wrapper" :id="id + '__fyre__wrapper'">
						<div class="row">
							<div class="col-sm-12 fyre__box" v-if="!isPreview" :id="id + '__fyre__box'">
								<div class="fyre__content d-flex justify-content-center">
									<i class="far fa-file fa-icon"></i>
								</div>
                <div class="d-flex justify-content-center">
									<div class="fyre__label" v-if="isDraggable">
										Drag & Drop to upload or browse your files
									</div>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="button" class="fyre__btn" @click="onSelect">
                    <i class="fas fa-file-upload"></i>
                    Browse
									</button>
                </div>
							</div>
							<div class="col-sm-12 fyre__preview d-flex flex-column" v-if="isPreview">
								<div class="fyre__media__header d-flex">
									<p class="fyre__title my-auto">{{ files.length }} {{ getFileTitle() }} Selected </p>
									<button type="button" class="fyre__btn ml-auto my-auto" @click="onSelect" v-if="multiple">
										Add more files
									</button>
								</div>
								<div class="fyre__media__list">
									<div class="fyre__media__list__item pt-2 d-flex" v-for="file in files" :key="file.id">
										<i class="material-icons fyre__icon__file">insert_drive_file</i>
										<p class="fyre__title__file">{{ file.name }}</p>
										<i class="material-icons fyre__icon__delete ml-auto my-auto" @click="onRemove(file.id)">clear</i>
									</div>
								</div>

								<div class="fyre__progress" v-show="isUploading">
									<span class="fyre__progress__title" :style="'width: '+ uploadProcess +'%'">{{ uploadProcess }}%</span>
								</div>

								<button type="button" class="fyre__btn" @click="onUpload">
									Upload
								</button>
							</div>
						</div>
						<input
							class="fyre__file"
							type="file"
							:id="id + '__fyre__file'"
							@change="onFileSelected"
							:accept="format"
							:multiple="multiple" />
				  </div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import FyreIcon from './FyreIcon';
	import MediaServices from '@vendor/Vue/Services/MediaServices';

	export default {
		props: {
			open: {
				required: true,
				type: Boolean,
				default: false,
			},
			multiple: {
				required: false,
				default: false,
				type: Boolean
			}
		},
		components: {
			'fyre-icon': FyreIcon
		},
		data: function(){
			return {
				id: null,
				isDraggable: false,
				isPreview: false,
				uploadProcess: 10,
				isUploading: false,
				files: [],
				format: ".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .png, .jpg, .jpeg"
			};
		},
		created(){
			this.id = UUID.generate();
		},
		mounted(){
			this.setDraggableFyre();
			this.setDefaults();
		},
		watch: {
			open: function(){
				this.setDefaults();
			}
		},
		methods: {
			setDefaults: function(){
				if (this.open) {
					this.openFyre();
				}else{
					this.closeFyre();
				}

				$(`#${this.id}`).on('hidden.bs.modal', () => {
					this.$emit('closed');
				});
			},
			openFyre: function(){
				$(`#${this.id}`).modal('show');
			},
			closeFyre: function(){
				$(`#${this.id}`).modal('hide');
			},
			onSelect: function(){
				if (this.isUploading) {
					return;
				}
				$(`#${this.id}__fyre__file`).trigger('click');
			},
			setDraggableFyre: function(){
				let fyreBox = $(`#${this.id}__fyre__box`);
				let fyreWrapper = $(`#${this.id}__fyre__wrapper`);
				if (this.isDraggableSupported()) {
					this.isDraggable = true;
				  fyreBox.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
				    e.preventDefault();
				    e.stopPropagation();
				  }).on('dragover dragenter', function() {
				    fyreWrapper.addClass('is-dragover');
				  }).on('dragleave dragend drop', function() {
				    fyreWrapper.removeClass('is-dragover');
				  }).on('drop', (e) => {
						e.preventDefault();
						e.stopPropagation();
						let files = e.originalEvent.dataTransfer.files;
						if (!this.multiple) {
							files = files[0];
							files = [files];
						}
						this.processFiles(files);
					});
				}
			},
			isDraggableSupported: function(){
				var div = document.createElement('div');
				return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
			},
			onFileSelected: function(e){
				e.preventDefault();
				let files = e.target.files;
				this.processFiles(files);
			},
			processFiles: function(files){
				_.each(files, (f) => {
					let file = {
						id: UUID.generate(),
						name: f.name,
						type: f.type,
						file: f
					};

					this.files.push(file);
				});

				this.isPreview = true;
			},
			onRemove: function(id){
				let files = _.reject(this.files, (f) => {
					return f.id == id;
				});

				this.files = files;

				if (_.isEmpty(this.files)) {
					this.isPreview = false;
				}
			},
			getFileTitle: function(){
				if (this.files.length > 1) {
					return 'Files';
				}
				return 'File';
			},
			onUpload: function(){
				if (this.isUploading || _.isEmpty(this.files)) {
					return ;
				}
				this.isUploading = true;

				MediaServices.upload(this.files, (files) => {
					this.uploadProcess = 100;
					this.$emit('files', files);
					this.files = [];
					this.isPreview = false;
				}, (progress) => {
					this.uploadProcess = progress;
				}, (message) => {

				});

			}
		}
	}
</script>

<style lang="scss" scoped>
  $primary: #1d6f42;
  $white: #fff;
	.fyre__modal{
		border-radius: 5px;
		.modal-footer, .modal-header{
			background: $primary;
			padding: 10px !important;
		}
  }
  .fa-icon {
    color: $primary;
    font-size: 60px;
  }
  .modal-dialog {
    padding-top: 0;
  }
  .fyre__btn{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1.5rem;
    border: 2px solid $primary;
    border-radius: 50px;
    padding: 10px 30px;
    background: $primary;
    color: #fff;
    outline: 0 !important;
    transition: all 0.4s ease;
    &:hover{
      color: $primary;
      background: $white;
    }
    i {
      font-size: 25px;
      padding-right: 10px;
    }
  }
  .fyre-close-btn {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    cursor: pointer;
    border: 0;
    background-color: transparent;
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    i {
      color: $primary;
      font-size: 35px;
    }
  }
  .fyre__label{
    text-align: center;
    margin-top: 1.5rem;
    font-size: 1.1rem;
    font-weight: bold;
    color: $primary;
  }
	.fyre__wrapper{
    margin: 3rem 0rem;
    // border: 1px solid #3d8e7038;
		transition: background-color 0.5s ease;
		&.is-dragover{
			background-color: #3d8e7038;
		}
		.fyre__file{
			display: none;
		}
		.fyre__box{
			padding: 2rem 0.5rem;
			.fyre__content{
				justify-content: center;
				svg{
					height: 200px;
    			width: 100%;
				}

			}
		}
		.fyre__preview{
			padding-bottom: 1rem;
			.fyre__media__header{
				background: #388576;
				padding: 0.5rem 0.5rem;
				.fyre__title{
					margin-bottom: 0;
					color: white;
				}
				// .fyre__btn{
				// 	background: #388576;
				// 	color: white;
				// 	border: none;
				// 	padding: 0.3rem 1.1rem;
				// 	border-radius: 16px;
				// 	outline: 0 !important;
			  //   transition: opacity 0.4s ease;
				// 	&:hover{
				// 		opacity: 0.7;
				// 	}
				// }
			}
			.fyre__media__list{
      padding: 1rem 1rem;
				.fyre__media__list__item{
					border-bottom: 1px solid #cde5df;
					.fyre__icon__file{
						color: #388576;
    				font-size: 30px;
					}
					.fyre__title__file{
						font-size: 1rem;
						margin-top: 6px;
						margin-left: 10px;
					}
					.fyre__icon__delete{
						font-size: 22px;
						cursor: pointer;
					}
				}
			}
			// .fyre__btn{
			// 	background: #388576;
			// 	color: white;
			// 	margin-left: auto;
			// 	border-radius: 25px;
			// 	padding: 0.2rem 2rem;
			// 	margin-right: 0.5rem;
			// 	margin-top: 1rem;
			// 	outline: 0 !important;
			// 	transition: opacity 0.4s ease;
			// 	&:hover{
			// 		opacity: 0.7;
			// 	}
			// }
			.fyre__progress{
				border: 1px solid #424242;
		    margin: 2rem 0.8rem 0.5rem;
		    color: #424242;
				background-color: transparent;
				.fyre__progress__title{
					background-color: #388576;
					width: 10%;
					height: 100%;
					color: white;
					display: flex;
					justify-content: center;
				}
			}
		}
	}

</style>
