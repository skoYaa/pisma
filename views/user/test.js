$(document).ready(function(){
        var broj = 10;
        //$('input:checkbox').removeAttr('checked');
    //alert('radi'); 
    $( "#target" ).change(function() {
        //alert('radi2');
        var str = "";

        str=$("#target :selected").text();
        //alert( str);
         $.ajax({
            method: "GET",
            url: "http://localhost/pisma/web/index.php?r=user/poslato",
            data: { name: str},

            success: function(data){
              //alert(data);
              //$varijabla= data;
              //$("#deftext").val($varijabla->purchase_price);
              var a=data;
                $("#deftext").val(a);
                
            },
            
          })
          $.ajax({
            method: "GET",
            url: "http://localhost/pisma/web/index.php?r=user/poslato2",
            data: { name: str},

            success: function(data){
              //alert(data);
              //$varijabla= data;
              //$("#deftext").val($varijabla->purchase_price);
              broj=data;
                $("#deftext2").val(broj);
                
            },
            
          })
        $(":checkbox").removeAttr("disabled");
        $('input:checkbox').removeAttr('checked');

   });

  var count = 0;
  var checked = 0;
  function countBoxes() { 
    count = $("input[type='checkbox']").length;
    console.log(count);
  }
  
  countBoxes();
  $(":checkbox").click(countBoxes);
  
  // count checks

  function countChecked() {
      if(checked+1>= broj){
        console.log(checked,broj);
          alert("nemozes vise check-irati");
           $(":checkbox").attr("disabled", true);
           
      }else{
         $(":checkbox").removeAttr("disabled"); 
      }
    
    checked = $("input:checked").length; 
    console.log(checked);
      
          
    
  }
  
  countChecked();
  $(":checkbox").click(countChecked);
  $("#restart").click(function(){
    $("input.group1").removeAttr("disabled"); 
    $('input.group1').attr('checked', false);
    checked = 0;
  });
  
  
});



   
