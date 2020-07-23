export default{
	dateTimeOptions: {
		format: 'DD/MM/YYYY, hh:mm A',
		useCurrent: true,
		showClear: true,
		widgetPositioning: {
			horizontal: 'auto',
			vertical: 'auto'
		},
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove',
		}
	},
	dateOptions: {
		format: 'DD/MM/YYYY',
		useCurrent: true,
		showClear: true,
		widgetPositioning: {
			horizontal: 'auto',
			vertical: 'auto'
		},
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove'
		}
	},
	timeOptions: {
		format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove'
		}
	},
	initDatetimePicker(selector, onChange){
		let $datetimePicker = $(selector);
		$datetimePicker.datetimepicker(this.dateTimeOptions);
		$datetimePicker.on('dp.change', ($event) => {
			let datetime = $event.date.format("DD/MM/YYYY, hh:mm A");
			onChange(datetime);
		})
	},
	initDatePicker(selector, onChange){
		let $datePicker = $(selector);
		$datePicker.datetimepicker(this.dateOptions);
		$datePicker.on('dp.change', ($event) => {
			let date = $event.date.format("DD/MM/YYYY");
			onChange(date);
		})
	},
	initTimePicker(selector, onChange){
		let $timePicker = $(selector);
		$timePicker.datetimepicker(this.timeOptions);
		$timePicker.on('dp.change', ($event) => {
			let time = $event.date.format("H:mm A");
			onChange(time);
		})
	}
}
