function Inregistrare(){
	console.log("sunt aici");
	var par1 = document.getElementById("psw").value;
    var par2 = document.getElementById("psw-repeat").value;
    var username = document.getElementById("user").value;
   
   let xhr = new XMLHttpRequest();

		xhr.open("POST", "http://localhost:81/ACAR/public/GetUser/verificaUser");
		//xhr.open("POST", "http://localhost:80/ACAR/app/controllers/GetUser/verificaUser");

		xhr.addEventListener("load", function loadCallback() {
		    switch (xhr.status) {
		        case 200:
		            console.log("Succ " + xhr.response);
		            if (xhr.response == 0){
						alert("Esti inregistrat deja");
						document.getElementById('username').value = '';
						console.log("esti pe if-ul pentru");
					}else{
						
						//parolele nu corespund
					    if (par1 !== par2){
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
							document.getElementById('signup').style.display='none';
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