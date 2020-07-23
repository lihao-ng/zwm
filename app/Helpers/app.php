<?php

	/**
	 * Return current authenticated admin
	 *
	 * @return Admin
	 */
	function current_user(){
	  return Auth::user();
	}


	/**
	 * Return a formatted date to a human read format
	 *
	 * @return string
	 */
	function date_to_human($date, $format = 'd/m/Y, h:i A'){
		if ($date == null) {
			return null;
		}
		$dt = Carbon::parse($date);
		return $dt->format($format);
	}

	/**
	 * Return a formatted date to a databases format
	 *
	 * @return string
	 */
	function human_to_date($date, $format = 'd/m/Y, h:i A'){
		if ($date == null) {
			return null;
		}
		return Carbon::createFromFormat($format, $date);
	}


	/**
	 * Check if navbar needs scrolling effect in different routes
	 *
	 * @return string
	 */
  function navbar_scroll_effect() {
    if (request()->route()->getName() == 'shared.tnc' ||
			request()->route()->getName() == 'shared.refund-policy' ||
			request()->route()->getName() == 'shared.privacy-policy' ||
			request()->route()->getName() == 'shared.blogs.index' ||
			request()->route()->getName() == 'shared.blogs.show' ||
			request()->route()->getName() == 'shared.faq') {
      return 'no-scroll bg';
    } else {
      return 'scroll active';
    }
  }



	/**
	 * Return active | '' based on the current active route
	 *
	 * @return string
	 */
	function active_route($name, $class = 'active'){
		$current_name = Route::currentRouteName();

		return $name == $current_name ? 'active' : 'inactive';
	}
