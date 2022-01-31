
let max_dim = 5;
var dimension = 1;

$(function () {
  $('section[id*="size_selector"]').each(function(){
    var parent = this;
    dimension = parseInt($(this).children('[id*="dimension"]').val());
    console.log(dimension);
    $(this).children('button[id*="decrease"]').on("click", function(){
      console.log(dimension);
        if(dimension !== 1){
            dimension -= 1;
            updateDimension($(parent),dimension);
        }
      });
      $(this).children('button[id*="increase"]').on("click", function(){
        console.log(dimension);
        if(dimension !== max_dim){
            dimension += 1;
            updateDimension($(parent),dimension);
        }
      });
      updateDimension($(parent),dimension);
    });
  });
  


  function updateDimension(parent, dimension){  
    parent.find('img').slice(1, dimension+1).css('opacity','1');
    parent.find('img').slice(dimension,max_dim+1).css('opacity','0.5');
    parent.find('[id*="dimension"]').attr('value', String(dimension));
    parent.find('[id*="dimension"]').trigger('change');
  }


