function addField(){
                               
    var field = "<input type='file' name='avatar[]' value='' class='form-control-file ml-3 ' aria-describedby='fileHelpId'/><br/>";
    document.getElementById('fields').innerHTML += field;
    let x=0;
    if(document.getElementById('button').clicked == true) {
      let x=x+1;
    }
    if (x===4) {
        document.getElementById("button").style.display = "none"; 
    }
  
    
  }