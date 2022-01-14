// Update style in terms of temperature
function getTemperature() {
  const params = {
    access_key: "4d55b55c416847fbb8ead421c090fa66",
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

// async function getTemperature() {
//   const city = "Toulouse";
//   const apiKey = "4e1451b8bd2c2090e4c386dc754342a3";
//   const apiURL =
//     `http://api.weatherstack.com/current?access_key=` +
//     apiKey +
//     `&query=` +
//     city; // API get request
//   let apiResponse = await fetch(apiURL); //fetch data
//   const responseJson = await apiResponse.json(); //converts data to json
//   console.log(
//     "La température à " +
//       city +
//       " est de : " +
//       responseJson.current.temperature +
//       "°"
//   );
//   let temperature = responseJson.current.temperature;
//   changeStyle(temperature);
// }

// Update style with temperature params
function changeStyle(temperature) {
  let newFont = new Font("body", "img-home");
  temperature = 15;
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
  document.getElementById("black").style.display = "none";
}

getTemperature();
setTimeout(hideOverlay, 2000);