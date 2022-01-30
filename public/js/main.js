// Update style in terms of temperature
function getTemperature() {
  const params = {
    access_key: "302922489c9c27a4a35378efab40af4e",
    query: "Toulouse",
  };

  // API get request
  axios
    .get("http://api.weatherstack.com/current", { params })

    // Get temperature and change Style
    .then((response) => {
      const apiResponse = response.data;
      console.log("La température à " + params.query + " est de : " + apiResponse.current.temperature + "°");
      this.temperature = apiResponse.current.temperature;
      changeStyle(this.temperature);
    })
    .catch((error) => {
      console.log(error);
    });
    
}

// Update style with temperature params
function changeStyle(temperature) {
  let newFont = new Font("body", "img-home");
  if (temperature < 12) {
    newFont.changeIntoCold();
  } else if (temperature >= 12 && temperature <= 24) {
    newFont.changeIntoTemp();
  } else if (temperature > 25) {
    newFont.changeIntoHot();
  }
}

// Hide black overlay
function hideOverlay(){
  document.getElementById("overlay").style.display = "none";
}
getTemperature();
setTimeout(hideOverlay, 4000);


