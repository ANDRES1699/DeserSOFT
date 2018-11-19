  function menutoggle(x){
        var panel = document.getElementById(x), navarrow = document.getElementById('navarrow'), disp = "block";

        if(panel.style.display == disp){
            panel.style.display = "none";
            
        }else{
            panel.style.display = disp;
        }
    }
