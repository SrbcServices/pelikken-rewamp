window.addEventListener('load',()=>{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position=>{
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;

            fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=10c8a5a1e88e64984bb17d5eccd4bb78`)
            .then((res)=>{
                return(res.json())
            }).then((data=>{
               console.log(data);
                var whetherCondition = data.weather[0].description;
                var location = data.name;
                var temp = Math.floor((data.main.temp -273));
               console.log(data.main.temp);
                var code = data.weather[0].icon;
                 data = {
                    whetherCondition,
                    location,
                    temp,
                    code

                }
                setitem(data);
               
            }));

           setitem =(data)=>{
               
               
               document.getElementById('location').innerHTML = data.location;
               document.getElementById('temp').innerHTML = data.temp;
              
             
               var imgsrc = document.getElementById('img_loc');
               imgsrc.src = `http://openweathermap.org/img/wn/${data.code}@2x.png`;
               
 }
    });
        } 
            });