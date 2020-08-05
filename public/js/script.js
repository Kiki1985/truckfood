function initMap() {
    let location = {lat: 38.500000, lng: -98.000000};
    let map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
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
      console.log(rez);
        for( let i in rez[0]){
          //if(rez[i].lat !== null) {
            marker = new google.maps.Marker({
            icon: 'http://maps.google.com/mapfiles/ms/icons/'+rez[1][i]+'-dot.png',
            position: {lat: rez[0][i].lat, lng: rez[0][i].lng},
            title:"Hello World!", 
            map: map,
            }); 
          //}
        }
      }
    }
  }