// Update style in terms of temperature
function getTemperature() {
  const params = {
    access_key: "4e1451b8bd2c2090e4c386dc754342a3",
    query: "Toulouse",
  };

  // document.querySelector("body").classList.add("hide");
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
  }
  else if (temperature >= 12 && temperature <= 24) {
    newFont.changeIntoTemp();
  }
  else if (temperature > 25) {
    newFont.changeIntoHot();
  }
  // Make that the template isnt visible if the api request isn't ready
  // document.querySelector("body").classList.remove("hide");
}

getTemperature();
