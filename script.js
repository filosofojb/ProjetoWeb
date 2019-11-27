//php tests




//Global Variables
var partida,chegada,tlLat,tlLong,brLat,brLong,totAv,regiao,rotaPoly;
var avoidsList = new Array();
var rotas = new Array();
var rotasGrupo = new Array();
// Initialize the platform object:
var platform = new H.service.Platform({
'apikey': 'YR668uX1SYnxyZO7E4td9F6HdgEZxP5YNbof_8waaNA'
});     

// Obtain the default map types from the platform object
var defaultLayers = platform.createDefaultLayers();
var group = new H.map.Group();
var geocoderService = platform.getGeocodingService();
var routerService = platform.getRoutingService();

//Geocoder Function with a promise
var geocoder = query => {
  return new Promise((resolve,reject)=>{
    geocoderService.geocode(
      {
        "searchtext":query
      },
      success => {
        resolve(success.Response.View[0].Result[0].Location.DisplayPosition);
      },
      error => {
        reject(error);
      }
    );
  });
}

//Geocoder Function with a promise to find rectangles around area:
var geocoderArea = query => {
  return new Promise((resolve,reject)=>{
    geocoderService.geocode(
      {
        "searchtext":query
      },
      success => {
        resolve(success.Response.View[0].Result[0].Location.MapView);
      },
      error => {
        reject(error);
      }
    );
  });
}

//Route Function with a promise
var calculateRoute = (partida,chegada,aString)=>{
  return new Promise((resolve, reject)=>{
    const params = {
      mode: "fastest;car;traffic:enabled",
      waypoint0: partida.Latitude+","+partida.Longitude,
      waypoint1: chegada.Latitude+","+chegada.Longitude,
      avoidareas: aString,
      representation: "display"
    };
    routerService.calculateRoute(params, success=>{
      resolve(success.response.route[0].shape);
    },error => {
      reject(error);
    });
  });
};
//Asyncron function to use promises.


//Starting map
var map = new H.Map(
document.getElementById("mapContainer"),
defaultLayers.vector.normal.map,
{
  zoom: 10, 
  center: {lat:-19.91952 ,  lng:-43.93833}
});
//MapEvents allow us to move the map, pinch, zoom in and out
var mapEvents = new H.mapevents.MapEvents(map);
//Listener to said mapEvents
map.addEventListener('tap',function(evt){
  console.log(evt.type,evt.currentPointer.type);
});

//Behavior to said mapevents
var behavior = new H.mapevents.Behavior(mapEvents);

//User interface
var ui = H.ui.UI.createDefault(map,defaultLayers);

//Function that starts the route
var start = async(p,c) =>{
  //Remove already existing routes
  if(Boolean(rotaPoly)){
    map.removeObject(rotaPoly);
  }
  //Variables hardcoded for now - EDIT 07/10: not hardcoded anymore!!
  var pl1 = await geocoder(p);
  var pl2 = await geocoder(c);
  //Console log test to see if objects are instanciated
  console.log(pl1,pl2);
  //Markers, just in case but not necessary
  var pl1M= new H.map.Marker({lng: pl1.Longitude,  lat:pl1.Latitude});
  var pl2M= new H.map.Marker({lng: pl2.Longitude,  lat:pl2.Latitude});

  //Variable containing the route calculated avoiding tl1
  var avoids;
  avoidsList.forEach( av =>{
    if(!Boolean(avoids)){
      avoids=av;
    }else{
    avoids+="!"+av;
    }
  });

  //Console log to check if the string is well formed.
  console.log(avoids);

  var rota = await calculateRoute(pl1,pl2,avoids);

  //Object with eachpoint from the route
  var linhaRota = new H.geo.LineString();
  rota.forEach(points => {
    let parts = points.split(",");
    linhaRota.pushPoint({
      lat:parts[0],
      lng:parts[1]
    });
  });

  //Using above object to create a line printable on the map
  rotaPoly = new H.map.Polyline(linhaRota,{
    style:{
      lineWidth: 5
    }
  });

  //Save route line into array
  rotasGrupo.push(rotaPoly);

  //Test objects printed.
  map.addObject(rotaPoly);
  group.forEach(ob => {
    map.addObject(ob);
  });

  //Reframe the map to see the whole route
  map.getViewModel().setLookAtData({bounds:rotaPoly.getBoundingBox()});

}

//Route Button
function definePontos(){
  partida=document.getElementById("partida").value;
  chegada=document.getElementById("chegada").value;
  start(partida,chegada);
}

//Avoid Button
function addAvoid(){
  //Grab values of form
  tlLat = document.getElementById("lat1").value;
  tlLong = document.getElementById("long1").value;
  brLat = document.getElementById("lat2").value;
  brLong = document.getElementById("long2").value;
  //Add value to array
  avoidsList.push(tlLat+","+tlLong+";"+brLat+","+brLong);
  //Create rectangle
  var rec = new H.geo.Rect(tlLat,tlLong,brLat,brLong);
  //Adding above object into the group
  group.addObject(new H.map.Rect(rec,{
    style: {
      strokeColor: "black"
    }
  }));
  console.log(rec);
  if(Boolean(partida)&&Boolean(chegada))
    definePontos();
}

function addAvoidArea(){
  addAvoidAreaNoBut();
}

//AvoidArea Button
var addAvoidAreaNoBut =  async() => {
  //Getting the info from id labelAvoidArea
  regiao = document.getElementById("labelAvoidArea").value;
  //Using Geocoder function
  var avoidable = await geocoderArea(regiao);
  //Adding that place into avoidsList
  avoidsList.push(avoidable.TopLeft.Latitude+","+avoidable.TopLeft.Longitude+";"+avoidable.BottomRight.Latitude+","+avoidable.BottomRight.Longitude);

  //Rectangle around that area (what is gonna be avoided)
  var rec = new H.geo.Rect(avoidable.TopLeft.Latitude,avoidable.TopLeft.Longitude,avoidable.BottomRight.Latitude,avoidable.BottomRight.Longitude);

  //Object containing above rectangle, printable on the map
  //Adding above object into a group
  group.addObject(new H.map.Rect(rec,{
    style: {
      strokeColor: "black"
    }
  }));
  console.log(group.getObjects());
  //If we have a route, we'll call the main function
  if(Boolean(partida)&&Boolean(chegada))
    definePontos();
}

//Function to make a rectangle around the choosen coordinate with a level

function addReg(){
  lat = document.getElementById("lat").value; 
  long = document.getElementById("long").value; 
  level = document.getElementById("level").value; 
  
  lat1=parseFloat(lat)+parseFloat(level*0.01);
  long1=parseFloat(long)-parseFloat(level*0.01);
  lat2=parseFloat(lat)-parseFloat(level*0.01);
  long2=parseFloat(long)+parseFloat(level*0.01);

  avoidsList.push(lat1 + "," + long1 + ";" + lat2 + "," + long2);
  var rec = new H.geo.Rect(lat1,long1,lat2,long2);

  group.addObject(new H.map.Rect(rec,{
    style: {
      strokeColor: "black"
    }
  }));
  
  if(Boolean(partida)&&Boolean(chegada))
    definePontos();

}
//Restart Map to show correct route
function atualizaRota(rot){
  //Remove already existing routes
  if(Boolean(rotaPoly)){
    map.removeObject(rotaPoly);
  }
  //Add route into map
  rotaPoly = rotasGrupo[rot];
  map.addObject(rotaPoly);
  //Reframe the map to see the whole route
  map.getViewModel().setLookAtData({bounds:rotaPoly.getBoundingBox()});
  
}

//Dynamically populate dropdownBox
function criaLista(){
  partida=document.getElementById("partida").value;
  chegada=document.getElementById("chegada").value;
  rotas.push("Inicio: "+partida+" - Final: "+chegada+ " - Desvios: "+avoidsList.length );
  
  var test= '<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rotas Salvas</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';

  for(var i = 0; i < rotas.length; i++)
  {
    test+='<a class="dropdown-item" onClick =atualizaRota('+i+') href="#">'+rotas[i]+'</a>';
  }
  test+='</div>';
  document.getElementById("select").innerHTML = test;
}