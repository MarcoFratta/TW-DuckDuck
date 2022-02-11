var items = ["bottom", "base", "middle", "top"];
var layers = [];
var actuals = [];
var dimensions = [];
$(function () {
  for (var i = 0; i < 4; i++) {
    loadParts(i);
  }
  addButtonListener();
  addDimensionListener();
 
  window.onresize = function(event) {
    adjustPosition();
  };
  adjustPosition();
});
function loadParts(layer) {
  $.ajax({
    context: this,
    url: "ajax/get_items.php?layer=" + String(layer + 1),
    success: function (result) {
      res = JSON.parse(result);
      fillLayer(res, layer);
    },
  }).fail(function (error) {
    // If there was an error with this request
    //console.log(error);
  });

  $.ajax({
    context: this,
    url: "ajax/get_items.php?dim=true",
    success: function (result) {
      res = JSON.parse(result);
      dimensions = res;
      updatePrice();
      adjustPosition();
    },
  }).fail(function (error) {
    // If there was an error with this request
    //console.log(error);
  });
}

function fillLayer(data, layer) {
  layers[layer] = data;
  updateView(0, layer);
}

function updateView(index, layer) {
  if (index >= 0 && index < layers[layer].length) {
    $("#" + items[layer] + "_img").attr("src", layers[layer][index].image_path);
    $("#" + items[layer] + "_id").attr("value", layers[layer][index].id);
    actuals[layer] = index;
    updatePrice();
  }
}

function addButtonListener() {
  items.forEach((item) => {
    $("#" + item + "_left").click(function () {
      var layer = items.indexOf(item);
      if (actuals[layer] > 0) {
        updateView(actuals[layer] - 1, layer);
      }
    });
    $("#" + item + "_right").click(function () {
      var layer = items.indexOf(item);
      if (actuals[layer] < layers[layer].length - 1) {
        updateView(actuals[layer] + 1, layer);
      }
    });
  });
}

function updatePrice() {
  var dim = parseInt($("#dimension").val());
  var dimprice = 0;
  if(layers.length < items.length){
      return;
  }
  dimensions.forEach((dimension) => {
    if (parseInt(dimension.size) == dim) {
      dimprice = parseInt(dimension.price)/100;
    }
  });

  var price = dimprice;
  for (var i = 0; i < actuals.length; i++) {
      if(layers[i] !== undefined)
        price += parseInt(layers[i][actuals[i]].price)/100;
  }

  $("#price").text("€ " + price);
}

function addDimensionListener(){
  $("#dimension").on("change",function(){
    updatePrice("changing ");
    
  });
}

function adjustPosition(){
  var count = 0;
  var divY = 0;
  var buttonHeight = 0;
  var divHeight = 0;
  var imgHeight = 0;
  divs = $("form > div").each(function(){
    if(count == 0){
      divY = $(this).offset().top
      divHeight = $(this).height();
      c = 0;
      $(this).children("button").each(function(){
        if(c==0){
          buttonHeight = $(this).height();
          c+=1;
        }
      });
      c=0;
      $(this).children("img").each(function(){
        if(c==0){
          imgHeight = $(this).height();
        }        
        
    });
    }
    $(this).children("button").each(function(){
        var h =(count*buttonHeight) + (0.12*imgHeight) + ((count*0.15)*imgHeight);
        $(this).css("margin-top", h);
        $(this).css("z-index",(count>1) ? (count == 2 ? 1:2) : 4-count);
    });
    $(this).children("img").each(function(){
      $(this).css("z-index",(count>1) ? (count == 2 ? 1:2) : 4-count);
  });
    this.style.position = "absolute";
    $(this).offset().top = divY+'px';
    count +=1;
  }); 
  adjustOtherComponent(divHeight);
}

function adjustOtherComponent(val){
  var g = val;
  var f = 0.15;
  //console.log("g",g);
  if($(window).width() > 1100){
    f=-0.0;
    //$("#size_selector").first().css("z-index",(count));
  }
  $("#size_selector").first().css("margin-top",g + (g*f));
}
