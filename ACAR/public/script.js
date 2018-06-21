function Inregistrare() {
	console.log("sunt aici");
	var par1 = document.getElementById("psw").value;
	var par2 = document.getElementById("psw-repeat").value;
	var username = document.getElementById("user").value;
	var email=document.getElementById("email").value;

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
									window.location.assign('http://localhost:81/ACAR/public/login.php');
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
							pass: `${par1}`,
							email:`${email}`
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
	let facultate = "%";
	let profesor = "%";
	let materie = "%";

	let radio = document.getElementsByName("materie");

	for (var i = 0, length = radio.length; i < length; i++) {
		if (radio[i].checked) {
			materie = radio[i].value;
			break;
		}
	}

	radio = document.getElementsByName("profesor");

	for (var i = 0, length = radio.length; i < length; i++) {
		if (radio[i].checked) {
			profesor = radio[i].value;
			break;
		}
	}

	radio = document.getElementsByName('facultate');
	for (var i = 0, length = radio.length; i < length; i++) {
		if (radio[i].checked) {
			facultate = radio[i].value;
			break;
		}
	}
	console.log(facultate);


	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/ACAR/public/GetSurveys/GetSurveysBy");

	xhr.addEventListener("load", function loadCallback() {
		console.log(xhr.response);
		switch (xhr.status) {
			case 200:
				let object = JSON.parse(xhr.response);
				console.log(object);
				putOnScreen(object);

				break;
			case 404:
				console.log("Oups! Not found");
				break;
		}
	});

	xhr.addEventListener("error", function errorCallback() {
		console.log("Network error");
	});
	obj = {
		facultate: `${facultate}`,
		materie: `${materie}`,
		profesor: `${profesor}`
	}
	xhr.send(JSON.stringify(obj));

};

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
	var fileToUpload = document.getElementById("fileToUpload").value;
	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost:81/ACAR/public/PostSurvey/verificaSurvey");

	xhr.addEventListener("load", function loadCallback() {
		switch (xhr.status) {
			case 200:
				console.log("survey adaugat cu succes" + xhr.response);
				window.location.assign('http://localhost:81/ACAR/public/surveyPage.php');
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
		review: `${review}`,
		fileToUpload:`${fileToUpload}`
	}

	xhr.send(JSON.stringify(payload));
}



function putOnScreen(obj) {
	console.log("sunt aici");
	let index = 0;
	let main = document.getElementById("main");
	if (typeof main !== "undefined")
		main.innerHTML = '';

	obj.forEach(function (elem) {
		index++;
		let card = document.createElement("div");
		card.classList.add("card");

		let title = document.createElement("h3");
		title.classList.add("card-name");
		title.innerHTML = elem.Materie;

		let title2 = document.createElement("h4");
		title2.classList.add("card-survey-name");
		title2.innerHTML = elem.Profesor;

		let descriere = document.createElement("p");
		descriere.classList.add("card-description");
		descriere.innerHTML = elem.Review;

		let button = document.createElement("a");
		button.classList.add("card-link");
		button.innerHTML = "Open Survey";
		button.href = "#modal" + index;

		card.appendChild(title);
		card.appendChild(title2);
		card.appendChild(descriere);
		card.appendChild(button);
		main.appendChild(card);


		let bigDiv = document.createElement("div");
		bigDiv.classList.add("modal");
		bigDiv.id = "modal" + index;
		bigDiv.setAttribute("aria-hidden", "true");

		let secondDiv = document.createElement("div");
		secondDiv.classList.add("modal-dialog");

		let exit = document.createElement("a");
		exit.classList.add("normal-button-close");
		exit.href = "#";
		exit.innerHTML="x";

		let thirdDiv = document.createElement("div");
		thirdDiv.classList.add("card");

		let fourthDiv = document.createElement("div");
		fourthDiv.classList.add("card-container");


		let numeDiv = document.createElement("div");
		numeDiv.classList.add("nume");
		numeDiv.innerHTML = elem.Profesor;

		let facDiv = document.createElement("div");
		facDiv.classList.add("facultate");
		facDiv.innerHTML = elem.Facultate;

		let anDiv = document.createElement("div");
		anDiv.classList.add("an");
		anDiv.innerHTML = elem.An;

		let materieDiv = document.createElement("div");
		materieDiv.classList.add("materie");
		materieDiv.innerHTML = elem.Materie;

		let paragraph = document.createElement("p");
		paragraph.innerHTML = elem.Review;

		let hr = document.createElement("hr");

		fourthDiv.appendChild(numeDiv);
		fourthDiv.appendChild(hr);
		fourthDiv.appendChild(facDiv);
		fourthDiv.appendChild(hr);
		fourthDiv.appendChild(anDiv);
		fourthDiv.appendChild(materieDiv);
		fourthDiv.appendChild(hr);
		fourthDiv.appendChild(paragraph);

		thirdDiv.appendChild(fourthDiv);
		secondDiv.appendChild(thirdDiv);
		secondDiv.appendChild(exit);
		bigDiv.appendChild(secondDiv);
		let k = document.getElementById("main-page");
		if (typeof k !== "undefined") { k.appendChild(bigDiv); }

	})
};

window.onload = filter();