<header class="headerCls">
    <a href="#">
      <img class="image" src="./public/sigla_fullsize.png" alt="ACAR Logo" height="50px">
    </a>
    <div class="left-buttons">
      <button onclick="window.location.href='./surveyPage.php'" class="home-button tooltip">
        <i class="only-icon-button ion ion-ios-list"></i>
        <span class="tooltiptext">Home</span>
      </button>
      <button onclick="window.location.href='./index.php'" class="about-button tooltip">
        <i class="only-icon-button ion ion-ios-lightbulb-outline"></i>
        <span class="tooltiptext">About</span>
      </button>
      <div class="center-buttons">
        <div class="dropdown">
          <button href="#" class="center-buttons-obj">
            <i class="ion ion-chevron-down"></i>Facultate</button>
          <nav class="dropdown-content">
          <label>
              <input name="facultate" type="radio" value="%" checked>Toate</label>
            <br>
            <label>
              <input name="facultate" type="radio" value="info">Informatica</label>
            <br>
            <label>
              <input name="facultate" type="radio" value="geo">Geografie</label>
            <br>
            <label>
              <input name="facultate" type="radio" value="mate">Matematica</label>
            <br>
          </nav>
        </div>
        <div class="dropdown">
          <button href="#" class="center-buttons-obj">
            <i class="ion ion-chevron-down"></i>Materie</button>
          <nav class="dropdown-content">
            <label>
              <input type="checkbox">Informatica</label>
            <br>
            <label>
              <input type="checkbox">Geografie</label>
            <br>
            <label>
              <input type= "checkbox">Matematica</label>
            <br>
          </nav>
        </div>
        <div class="dropdown">
          <button href="#" class="center-buttons-obj">
            <i class="ion ion-chevron-down"></i>Profesor</button>
          <nav class="dropdown-content">
            <label>
              <input type="checkbox">Patrut</label>
            <br>
            <label>
              <input type="checkbox">Ciobaca</label>
            <br>
            <label>
              <input type="checkbox">Tiplea</label>
            <br>
          </nav>
        </div>
      </div>
    </div>
    <div class="right-buttons">
      <button onclick="window.location.href='./surveyForm.php'" class="survey-button">
        <i class="ion ion-chatbox-working"></i>
      </button>
      <button onclick="window.location.href='./login.php'" class="logIn-button">Log In</button>
    </div>
  </header>