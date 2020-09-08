export default{
  getCodes(query, onSuccess, onError){
    query = this.createQuery(query);
    
		axios.get(`/promo-codes${query}`)
		.then(({data}) => {
			if (onSuccess) {
				onSuccess(data);
			}
		},({response}) => {
			this.handleErrorResponse(response, onError);
		});
  },
  redeem(data, onSuccess, onError){ 
		axios.post(`/redemption`, data) 
		.then(({data}) => {
			if (onSuccess) {
				onSuccess(data);
			}
		},({response}) => {
			this.handleErrorResponse(response, onError);
		});
  },
  createQuery(query) { 
    if (query) {
			let keys = Object.keys(query);

      let queryStr = "?";
      _.each(keys, (key) => {
        queryStr += `${key}=${query[key]}&`;
      });

			query = queryStr.slice(0, -1);
    }else{
      query = '';
    }
    return query;
  },
	handleErrorResponse(response, onError) {
		if (response.status === 422) {  
      if(!response.data.hasOwnProperty('errors')) {
        onError(response.data.message);
      }else {
        let errors = response.data.errors;
        let keys = Object.keys(errors);
        onError(errors[keys[0]][0]);
      } 
		} else {
			onError("Something went wrong, please try again", response);
		}
	}
}
