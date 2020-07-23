export default class VModal{

	static dialog(context, { title, text, onConfirm, onClose, onCancel }){
		title = title || 'Alert!';
		text = text || 'Alert Message';
		let buttons = [];

		if(_.isFunction(onConfirm)){
			buttons.push({ title: "Confirm", handler: onConfirm });
		}

		if(_.isFunction(onClose)){
			buttons.push({ title: "Close", handler: onClose });
		}

		if(_.isFunction(onCancel)){
			buttons.push({ title: "Cancel", handler: onCancel });
		}


		context.$modal.show('dialog', {
		  title: title,
		  text: text,
		  buttons: buttons
	 });
	}

	static hide(context){
		context.$modal.hide('dialog');
	}
}
