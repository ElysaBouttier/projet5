
// document.getElementsByClassName("img-home")[0].src="/public/img/beige.jpg"
// a = setInterval(function(){document.getElementsByClassName("img-home")[0].src="/public/img/beige"+Math.ceil(Math.random()*4)+".jpg"}, 5000)
// API Access Key : 4e1451b8bd2c2090e4c386dc754342a3
// http://api.weatherstack.com/
// // Current Weather API Endpoint

// http://api.weatherstack.com/current
//     ? access_key = 4e1451b8bd2c2090e4c386dc754342a3
//     & query = New York

// // optional parameters:

//     & units = m
//     & language = en
//     & callback = MY_CALLBACK

// current => weather_descriptions
// async function apiRequest() {
  const params = {
    access_key: "4e1451b8bd2c2090e4c386dc754342a3",
    query: "Toulouse",
  };

  axios
    .get("https://api.weatherstack.com/current", { params })
    .then((response) => {
      const apiResponse = response.data;
      console.log(apiResponse);
      console.log(
        `Current temperature in ${apiResponse.location.name} is ${apiResponse.current.temperature}℃`
      );
    })
    .catch((error) => {
      console.log(error);
    });
// }





//
//  DOMS
//
//au passage : titre apparait