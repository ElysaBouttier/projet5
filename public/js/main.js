function getTemperature() {
  const params = {
    access_key: "4e1451b8bd2c2090e4c386dc754342a3",
    query: "Los Angeles",
  };

  axios
    .get("http://api.weatherstack.com/current", { params })
    .then((response) => {
      const apiResponse = response.data;
      console.log("la température est de : " + apiResponse.current.temperature);
      this.temperature = apiResponse.current.temperature;
      changeStyle(this.temperature);
    })
    .catch((error) => {
      console.log(error);
    });
}

function changeStyle(temperature) {
  let newFont = new Font("body", "img-home");
  if (temperature < 12) {
    newFont.changeIntoCold();
  }
  if (temperature >= 12 && temperature <= 24) {
    newFont.changeIntoTemp();
  } else {
    newFont.changeIntoHot();
  }

  document.querySelector("body").classList.remove("hide");
}

getTemperature();
