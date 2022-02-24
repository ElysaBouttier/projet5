// Update style in terms of temperature
function getTemperature() {
  const params = {
    access_key: "302922489c9c27a4a35378efab40af4e",
    query: "Toulouse",
  };

  axios
  
  .get('https://api.meteo-concept.com/api/forecast/daily?token=42af599197f2215eaf74a2ce8458cde5bf98f29a60c0dcb7d8d7f9c1e6aeb6e4&insee=31555')

    // Get temperature and change Style
    .then((response) => {
      const apiResponse = response.data;
      console.log("La température minimum à " + params.query + " est de : " + apiResponse.forecast[0].tmin + "°");
      this.temperature = apiResponse.forecast[0].tmin;
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


