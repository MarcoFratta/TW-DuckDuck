var items = ["bottom", "base", "middle", "top"];
var layers = [];
var actuals = [];
var dimensions = [];
$(document).ready(function () {
  for (var i = 0; i < 4; i++) {
    loadParts(i);
  }
  addButtonListener();
});
function loadParts(layer) {
  $.ajax({
    context: this,
    url: "ajax/get_items.php?layer=" + String(layer + 1),
    success: function (result) {
      res = JSON.parse(result);
      console.log(res);
      fillLayer(res, layer);
    },
  }).fail(function (error) {
    // If there was an error with this request
    console.log(error);
  });

  $.ajax({
    context: this,
    url: "ajax/get_items.php?dim=true",
    success: function (result) {
      res = JSON.parse(result);
      dimensions = res;
    },
  }).fail(function (error) {
    // If there was an error with this request
    console.log(error);
  });
}

function fillLayer(data, layer) {
  layers[layer] = data;
  updateView(0, layer);
}

function updateView(index, layer) {
  console.log("layer > " + layer + ", index > " + index);
  if (index >= 0 && index < layers[layer].length) {
    $("#" + items[layer] + "_img").attr("src", layers[layer][index].image_path);
    $("#" + items[layer] + "_id").attr("value", layers[layer][index].id);
    actuals[layer] = index;
    updatePrice();
  }
}

function addButtonListener() {
  console.log("adding listeners");
  console.log(layers);
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
  var dim = parseInt($("#dimension").text());
  var dimprice = 0;
  dimensions.forEach((dimension) => {
    if (parseInt(dimension.size) == dim) {
      dimprice = parseInt(dimension.price)/100;
    }
  });

  var price = dimprice;
  for (var i = 0; i < actuals.length; i++) {
      price += parseInt(layers[i][actuals[i]].price)/100;
  }

  $("#price").text("$" + price);
}
