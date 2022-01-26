
let max_dim = 5;
var dimension = 1;

$(function () {
    dimension = parseInt($("#dimension").val());
    $("#decrease").on("click", function(){
        if(dimension !== 1){
            dimension -= 1;
            updateDimension(dimension);
        }
      });
    $("#increase").on("click", function(){
        if(dimension !== max_dim){
            dimension += 1;
            updateDimension(dimension);
        }
      });
      updateDimension(dimension);
  });
  


  function updateDimension(dimension){  
    $("#size_selector").children("img").slice(1, dimension).css("opacity","1");
    $("#size_selector").children("img").slice(dimension,max_dim).css("opacity","0.5");
    $("#dimension").attr('value',String(dimension));
    $('#dimension').trigger('change');
  }


