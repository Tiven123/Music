



function iniciar() {
    
   cargar();
  
  btnSearch = document.getElementById("btnSearch");
  btnSearch.addEventListener("click", search, false);
  
  
  
  }
  function search(){
  
      var start = $("#from").val();
  var end  = $("#to").val();
  
         
  if(start == "" || end == ""){
  alert("Complete the fields correctly");
  cargar();
  }else {
  
      if(localStorage.getItem("rides")){
      
          var rides = JSON.parse(localStorage.getItem("rides"));
  
          for(i=0; i<rides.length;i++){
             
              if (start.toUpperCase() ==rides[i].start.toUpperCase() && end.toUpperCase() == rides[i].end.toUpperCase()) {
                
                  rides =[ rides[i]];
  generarTabla(rides);
 
              }
          }
  }
  }
  }
  
  function cargar(){
  
  var s = [];
      if(localStorage.getItem("rides")){
      
          var rides = JSON.parse(localStorage.getItem("rides"));
         
        
  generarTabla(rides);
  
  
      }
  }
  
  function generarTabla(rides){
   
   
    $("#tableBody").remove();
    
          var columnas =["ride","start","end","action"];
      var rides = rides;
      var table = document.getElementById("tableMain");
      
        var tblBody = document.createElement("tbody");
        tblBody.id="tableBody";
    
        var head =["User", "Start", "End","Action"];
       table.appendChild(tblBody);
        var row = document.createElement("tr");
         tblBody.appendChild(row);
        for (var i = 0; i < head.length; i++) {
            
    
           th = document.createElement("th");
           th.innerText = head[i];
           row.appendChild(th);
        
        }

  
    for (var i = 0; i < rides.length; i++) {
     
      var hilera = document.createElement("tr");
  
      for (var j = 0; j < columnas.length; j++) {
     
        var celda = document.createElement("td");       
       
  
  if (j == 3){  
  
  
      var button =  document.createElement("button");
       button.className = "btnView btnCreated btn-default";
      button.id= "btnView";  
   button.innerHTML = "View "; 
  
   
  var view={user:rides[i].user, start:rides[i].start, end:rides[i].end}
     var myJsonString = JSON.stringify(view);
  

  button.value = myJsonString; 
  
         var span =  document.createElement("span");
         span.className="glyphicon glyphicon-hand-right";
         button.appendChild(span);

   celda.appendChild(button);
    hilera.appendChild(celda);
  
  
  
  
  }else if(j==0){
  
      var button =  document.createElement("button");
       button.className = "btnProfile btnCreated  btn-default";
      button.id= "btnProfile"; 
   button.innerHTML = rides[i].user; 
  button.value = rides[i].user; 
   celda.appendChild(button);
    hilera.appendChild(celda);
  
  }
  else{
  
  var ride = rides[i];
  
             for(var p in ride){
                     
     if(columnas[j]== p){
        var textoCelda = document.createTextNode(ride[columnas[j]]);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
  
      }
      }
      tblBody.appendChild(hilera);
    }
    table.appendChild(tblBody);
  }    
  }
  }
  

  
  // anexo de url
  function getAnexo(){
    var loc = document.location.href;
    var getString = loc.split('?')[1];
    var GET = getString.split('&');
    var get = {};
 
    for(var i = 0, l = GET.length; i < l; i++){
       var tmp = GET[i].split('=');
       get[tmp[0]] = unescape(decodeURI(tmp[1]));
    }
    return get;
 }


  
  $("#tableMain").on('click','.btnProfile', function() {
    var userName = $(this).attr('value');
      user={
  user : userName
      }
    
  var myJsonString = JSON.stringify(user); //  pasa formato json

    location.href ="profile.html" +"?var1="+ myJsonString;
  
  })
  
  
  $("#tableMain").on('click','.btnView', function() {

    var view = $(this).attr('value');
  //var user = document.querySelector("btnProfile")[0].val;
  
    location.href ="view.html" +"?var1="+ view;
  
  })
  
  
  
  
  window.addEventListener("load", iniciar, false);