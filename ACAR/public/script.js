function Inregistrare() {
	console.log("sunt aici");
	var par1 = document.getElementById("psw").value;
	var par2 = document.getElementById("psw-repeat").value;
	var username = document.getElementById("user").value;

	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/ACAR/public/GetUser/verificaUser");

	xhr.addEventListener("load", function loadCallback() {
		switch (xhr.status) {
			case 200:
				console.log("Succ " + xhr.response);
				if (xhr.response == 1) {
					alert("Esti inregistrat deja");
					document.getElementById('username').value = '';
					console.log("esti pe if-ul pentru");
				} else {

					//parolele nu corespund
					if (par1 !== par2) {
						alert("Parolele nu corespund");
						document.getElementById('psw').value = '';
						document.getElementById('psw-repeat').value = '';
						console.log("parolele nu corespund");

					} else {
						let xhr2 = new XMLHttpRequest();

						xhr2.open("POST", "http://localhost:81/ACAR/public/Inregistrare/singUp");

						xhr2.addEventListener("load", function loadCallback() {
							switch (xhr2.status) {
								case 200:
									console.log("Success, ai inserat in baza de date" + xhr2.response);
									break;
								case 404:
									console.log("Oups! Not found");
									break;
							}
						});

						xhr2.addEventListener("error", function errorCallback() {
							console.log("Network error");
						});

						let payload = {
							username: `${username}`,
							pass: `${par1}`
						}
						xhr2.send(JSON.stringify(payload));
					}
				}

				break;
			case 404:
				console.log("Oups! Not found");
				break;
		}
	});

	xhr.addEventListener("error", function errorCallback() {
		console.log("Network error");
	});

	let payload = {
		username: `${username}`,
	}
	xhr.send(JSON.stringify(payload));

}


function filter() {
	let facultate;
	let fac
	let profesor;
	let materie;

	let radios = document.getElementById("locatie").value;

	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			tip = radios[i].value;
			break;
		}
	}

	radios = document.getElementsByName('facultate').value;
	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			facultate = radios[i].value;
			break;
		}
	}
	console.log(facultate);
	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/petrimonials/public/GetSurveys/GetSurveysBy");


}

function Logare() {
	var user = document.getElementById("user").value;
	var parola = document.getElementById("parola").value;

	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/ACAR/public/Logare/login");

	xhr.addEventListener("load", function loadCallback() {
		switch (xhr.status) {
			case 200:
				console.log("Success, te-ai conectat");
				console.log("*" + xhr.response.trim() + "*");
				console.log(user);
				if (xhr.response.trim() == user) {
					console.log("login reusit");
					window.location.assign('http://localhost:81/ACAR/public/welcome.php');
				} else {
					console.log("Username sau parola incorecte");
					alert("Username incorect");
					document.getElementById("user").value = '';
				}

				break;
			case 404:
				console.log("Oops! Not found");
				break;
		}
	});

	xhr.addEventListener("error", function errorCallback() {
		console.log("Network error");
	});

	let payload = {
		user: `${user}`,
		parola: `${parola}`
	}
	xhr.send(JSON.stringify(payload));
}

function adaugaSurvey() {
	var facultate = document.getElementById("facultate-id").value;
	var an = document.getElementById("an-id").value;
	var semestru = document.getElementById("semestru-id").value;
	var materie = document.getElementById("materie-id").value;
	var prof = document.getElementById("prof-id").value;
	var review = document.getElementById("review-id").value;

	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/ACAR/public/PostSurvey/verificaSurvey");

	xhr.addEventListener("load", function loadCallback() {
		switch (xhr.status) {
			case 200:
				console.log("survey adaugat cu succes" + xhr.response);
			case 404:
				console.log("404 not found");
				break;
		}
	});

	xhr.addEventListener("error", function errorCallback() {
		console.log("Network error");
	});
	let payload = {
		facultate: `${facultate}`,
		an: `${an}`,
		semestru: `${semestru}`,
		materie: `${materie}`,
		prof: `${prof}`,
		review: `${review}`
	}

	xhr.send(JSON.stringify(payload));
}



function putOnScreen(obj) {

};

