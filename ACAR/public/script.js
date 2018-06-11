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
				if (xhr.response == 0) {
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

	xhr.addEventListener("load", function loadCallback() {
		switch (xhr.status) {
			case 200:
				let object = JSON.parse(xhr.response);
				putOnScreen(object);
				console.log(object.Facultate);
				break;
			case 404:
				console.log("Oups! Not found");
				break;
		}
	});

	xhr.addEventListener("error", function errorCallback() {
		console.log("Network error");
	});
	obj= {
		facultate: `${facultate}`
	}
	xhr.send(JSON.stringify(obj));

};


function putOnScreen(obj) {
	let lim = 0;
	if (obj.length % 2 == 0) {
		lim = obj.length / 2;
	} else {
		lim = (obj.length + 1) / 2;
	}

	let inc1 = 0;
	let inc2 = 0;
	obj.slice(0, lim).forEach(function (elem) {

		inc1 += 1;
		let card = document.createElement("div");
		card.classList.add("card");
		let image = document.createElement("img");
		image.classList.add("card-img");
		image.src = "http://localhost:81/petrimonials/app/models/uploads/" + elem.path;
		image.alt = "poza anunt";
		let title = document.createElement("h2");
		title.classList.add("card-title");
		title.innerHTML = elem.nume_animal;
		let content = document.createElement("div");
		content.classList.add("card-content");
		let paragraf = document.createElement("p");
		paragraf.innerHTML = elem.descriere;
		let link = document.createElement("a");
		link.target = "_blank";
		link.href = "localhost:81/petrimonials/public/Anunturi/get/" + elem.id;
		link.innerHTML = "Afla mai mult.";
		content.appendChild(paragraf);
		content.appendChild(link);
		card.appendChild(image);
		card.appendChild(title);
		card.appendChild(content);
		let k = document.getElementById("main1");
		if (typeof k !== "undefined") { k.appendChild(card); }
	});

	obj.slice(lim, obj.length).forEach(function (elem) {

		inc2 += 1;

		let card = document.createElement("div");
		card.classList.add("card");
		let image = document.createElement("img");
		image.classList.add("card-img");
		image.src = "http://localhost:81/petrimonials/app/models/uploads/" + elem.path;
		image.alt = "poza anunt";
		let title = document.createElement("h2");
		title.classList.add("card-title");
		title.innerHTML = elem.nume_animal;
		let content = document.createElement("div");
		content.classList.add("card-content");
		let paragraf = document.createElement("p");
		paragraf.innerHTML = elem.descriere;
		let link = document.createElement("a");
		link.target = "_blank";
		link.href = "localhost:81/petrimonials/public/Anunturi/get/" + elem.id;
		link.innerHTML = "Afla mai mult.";
		content.appendChild(paragraf);
		content.appendChild(link);
		card.appendChild(image);
		card.appendChild(title);
		card.appendChild(content);
		let k = document.getElementById("main2");
		if (typeof k !== "undefined") { k.appendChild(card); }
	});
};