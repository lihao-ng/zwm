export default {
	url: '/api/media',
	upload(files, onSuccess, onProgress, onError){
		let config = {
			onUploadProgress: function(progressEvent){
				let percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total) - 20;
      	onProgress(percentCompleted);
			}
		}

		let data = new FormData();

		if (files.length == 1) {
			data.set('medium', files[0].file);
		}else{
			_.each(files, (file, index) => {
				data.set(`media[${index}]`, file.file);
			});
		}

		axios.post(`${this.url}/process`, data, config)
		.then(({ data }) => {
			onSuccess(data);
		}, ({ response }) => {
			this.handleErrorResponse(response, onError);
		});
	},
	handleErrorResponse(response, onError) {
		if (response.status === 401) {
			location.reload();
		} else if (response.status === 422) {
			let errors = response.data.errors;
			let keys = Object.keys(errors);
			onError(errors[keys[0]][0]);
		} else {
			onError("Something went wrong, please try again", response);
		}
	}
}
