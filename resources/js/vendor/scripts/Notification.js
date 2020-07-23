export default{
	config: {
		title: 'Notification',
		message: 'Notification Message',
		type: ''
	},
	send(context, {message, type}){
		context.$notify({
			group: 'centric__notification',
			title: this.config.title,
			text: message ? message : this.config.message,
			type: type ? type : this.config.type,
		});
	}
}
