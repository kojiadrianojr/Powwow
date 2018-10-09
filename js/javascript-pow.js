	var modalmain, modalsignup, modalsignin, contedit;
	function openedit() {
		modalmain = document.getElementById("modal-main");
		contedit = document.getElementById("cont-edit");
		modalmain.style.display = 'block';
		contedit.style.display = 'block';
	}
	function opensignup() {
		modalmain = document.getElementById("modal-main");
		modalsignup = document.getElementById("modal-signup");
		modalmain.style.display = 'block';
		modalsignup.style.display = 'block';
	}
	function opensignin() {
		modalmain = document.getElementById("modal-main");
		modalsignin = document.getElementById("modal-login");
		modalmain.style.display = 'block';
		modalsignin.style.display = 'block';
	}
	function modaldismiss() {
		modalmain = document.getElementById("modal-main");
		modalsignup = document.getElementById("modal-signup");
		modalsignin = document.getElementById("modal-login");
		contedit = document.getElementById("cont-edit");
		modalmain.style.display = 'none';
		modalsignup.style.display = 'none';
		modalsignin.style.display = 'none';
		contedit.style.display = 'none';
	}
	function openCity(evt, cityName) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }
	    document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " active";
	}