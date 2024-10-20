<script>
	let general_data, contacts_data;

	let general_s_form = document.getElementById('general_s_form');
	let site_title_inp = document.getElementById('site_title_inp');

	let site_about_inp = document.getElementById('site_about_inp');
	let contacts_s_form = document.getElementById('contact_s_form');

	let team_s_form = document.getElementById('team_s_form');
	let member_name_inp = document.getElementById('member_name_inp');
	let member_picture_inp = document.getElementById('member_picture_inp');

	function get_general() {
		let site_title = document.getElementById('site_title');
		let site_about = document.getElementById('site_about');

		let shutdown_toogle = document.getElementById('shutdown-toogle');

		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {
			general_data = JSON.parse(this.responseText);

			site_title.innerText = general_data.site_title;
			site_about.innerText = general_data.site_about;

			site_title_inp.value = general_data.site_title;
			site_about_inp.value = general_data.site_about;

			if (general_data.shutdown === 0) {
				shutdown.toogle.checked = false;
				shutdown_toogle.value = 0;
			} else {
				shutdown.toogle.checked = true;
				shutdown_toogle.value = 1;
			}

		}
		xhr.send('get_general');
	}

	general_s_form.addEventListener('submit', function (e) {
		e.preventDefault();
		upd_general(site_title_inp.value, site_about_inp.value);
	})

	function upd_general(site_title_val, site_about_val) {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {

			var myModal = document.getElementById('general-s');
			var modal = bootstrap.Modal.getInstance(myModal); // Returns a Bootstrap modal instance
			modal.hide();

			if (this.responseText == 1) {
				alert('succes', 'Changes saved!');
				get_general();
			} else {
				alert('error', 'No changes saved!');
			}

		}
		xhr.send('site_title' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
	}

	function upd_shutdown(val) {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {
			if (this.responseText == 1 && general_data.shutdown == 0) {
				alert('succes', 'Website under shutdown');
			} else {
				alert('succes', 'Shutdown mode off');
			}
			get_general();
		}
		xhr.send('upd_shutdown=' + val);
	}

	function get_contacts() {
		let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'ig'];
		let iframe = document.getElementById('iframe');

		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {

			contacts_data = JSON.parse(this.responseText);
			contacts_data = Object.values(contacts_data);

			for (i = 0; i < contacts_p_id.length; i++) {
				document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
			}
			iframe.src = contact_data[9];
			contacts_inp(contacts_data);
		}
		xhr.send('get_contacts');
	}

	function contacts_inp(contacts_data) {
		let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'ig_inp', 'iframe_inp'];


		for (i = 0; i < contacts_inp_id.length; i++) {
			document.getElementById(contacts_inp_id[i]).value = data[i + 1];
		}
	}

	contacts_s_form.addEventListener('submit', function (e) {
		e.preventDefault();
		upd_contact();
	})

	function upd_contact() {
		let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'ig', 'iframe'];
		let_contactss_inp_d = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'ig_inp', 'iframe_inp'];

		let data_str = "";

		for (i = 0; i < index.length; i++) {
			data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
		}
		data_str += "upd_contacts";

		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {
			var myModal = document.getElementById('contacts-s');
			var modal = bootstrap.Modal.getInstance(myModal); // Returns a Bootstrap modal instance
			modal.hide();
			if (this.responseText == 1) {
				alert('succes', 'Changes saved!');
				get_contacts();
			} else {
				alert('error', 'No changes made!');
			}
			get_general();
		}

		xhr.send(data_str);
	}


	team_s_form.addEventListener('submit', function (e) {
		e.preventDefault();
		add.member();
	})

	function add_member() {
		let data = new FormData();
		data.append('name', member_name_inp.value);
		data.append('picture', member_picture_inp.file[0]);
		data.append('add_member', '');

		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);

		xhr.onload = function () {
			console.log(this.responseText);
			var myModal = document.getElementById('teams-s');
			var modal = bootstrap.Modal.getInstance(myModal); // Returns a Bootstrap modal instance
			modal.hide();

			if (this.responseText == 'inv_img') {
				alert('error', 'Only JPG,PNG,and JPEG images are allowed!');
			} else if (this.responseText == 'inv_size') {
				alert('error', 'Image should be less than 2MB!')
			} else if (this.responseText == 'upd_failed') {
				alert('error', 'Image upload failed. Server Down!');
			} else {
				alert('success', 'New Member added');
				member_name_inp.value = '';
				member_picture_inp.value = '';
			}
		}
		xhr.send(data);

	}

	function get_member() {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "ajax/settings_crud.php", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function () {

		}
		xhr.send('get_member');
	}

	window.onload = function () {
		get_general();
		get_contacts();
	}

</script>