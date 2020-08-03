function initMap() {
    let location = {lat: 38.500000, lng: -98.000000};
    let map = new google.maps.Map(document.getElementById("map"), {
    zoom: 3.9,
    center: location
    });
    renderPosition(map)
  }

  function renderPosition(map) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'getlocations', true); 
    xhr.send(null);
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4){
      let rez = JSON.parse(xhr.responseText);
        for( let i in rez){
          if(rez[i].lat !== null) {
            marker = new google.maps.Marker({
            position: {lat: rez[i].lat, lng: rez[i].lng}, 
            map: map,
            });
          }
        }
      }
    }
  }