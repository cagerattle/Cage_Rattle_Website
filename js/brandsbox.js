/*
* brandsBox 1.1.7
* @author: Mateusz Mania
* @file: js/brandsbox.js
* @file_version: 1.1.7
*/
var _brandsBox_instances = {};
function brandsBox(b) {
  var a = this, h = !1, e = !0, k = !0, f = !1;
  this.widget = $("<div></div>", {"class":"brandsbox_container"}).append($("<div></div>", {"class":"brandsbox_inner"}));
  this.renderItems = function(b) {
    function c() {
      if ("undefined" !== typeof d) {
        $(a.widget).find(".brandsbox_inner").html("");
        for (var c in d) {
          itemObject = d[c], qx = jQuery(itemObject).attr("href")?jQuery(itemObject).attr("href"):jQuery(itemObject).attr("url"), imageElement = qx ? $('<a class="brandsbox_item_image"></a>').attr({href:function() {
            itemHref = qx;
            "undefined" == typeof itemHref && (itemHref = "javascript:void(0);");
            return itemHref;
          }, target:function() {
            itemTarget = $(itemObject).attr("target");
            "undefined" == typeof itemTarget && (itemTarget = "_SELF");
            return itemTarget;
          }}) : $('<span class="brandsbox_item_image"></span>'), $(imageElement).css({"background-image":'url("' + $(itemObject).attr("src") + '")', opacity:b.startOpacity}), $(a.widget).find(".brandsbox_inner").append($('<div class="brandsbox_item"></div>').append(imageElement));
        }
      }
    }
    var g = b.collection, d = void 0;
    switch(typeof g) {
      case "object":
        d = [];
        d = g;
        c();
        break;
      case "string":
        d = [];
        $.ajax({url:g, async:!1, success:function(a) {
          $(a).find("item").each(function(a) {
            d[a] = {src:$(this).attr("src"), url:$(this).attr("url"), target:$(this).attr("target")};
          });
          c();
        }, error:function() {
          console.log("Cant to load XML collection file.");
          console.log({collection:g});
        }});
        break;
      default:
        console.log("Collection not set or have invalid format");
    }
  };
  this.setOptions = function(a) {
    var c = {collection:!1, cols:4, rows:2, scrollingTransition:"fade-out-in", scrollingMode:"single", scrollingOrientation:"vertical", hoverEffectSpeed:"medium", scrollingTransitionSpeed:"medium", colorMode:"color", hoverOpacity:1, startOpacity:1, scrollingDelay:2E3}, b;
    for (b in a) {
      "undefined" === typeof c[b] || typeof a[b] != typeof c[b] && "collection" != b || (c[b] = a[b]);
    }
    "horizontal" == c.scrollingOrientation && (c.scrollingOrientation = "vertical");
    this.renderItems(c);
    return c;
  };
  this.switchSlide = function() {
    if (!1 == e && !0 == k) {
      k = !1;
      a.pauseTimer();
      switch(a.settings.scrollingTransitionSpeed) {
        case "slow":
          transitionStepDuration = 1E3;
          break;
        case "fast":
          transitionStepDuration = 250;
          break;
        default:
          transitionStepDuration = 500;
      }
      $(a.widget).addClass("out");
      f = setTimeout(function() {
        var b = "";
        if ("single" == a.settings.scrollingMode) {
          if ("vertical" == a.settings.scrollingOrientation) {
            for (var c = 0;c < parseInt(a.settings.cols);c++) {
              b += " .brandsbox_item:eq(" + c + ")", c < parseInt(a.settings.cols - 1) && (b += ",");
            }
            $(a.widget).find(b).appendTo($(a.widget).find(".brandsbox_inner"));
          } else {
            for (c = 0;c < parseInt(a.settings.rows);c++) {
              itemToMoveIndex = 2 * a.settings.cols * c, appendAfterIndex = parseInt(itemToMoveIndex + 2 * a.settings.cols - 1), lastItemIndex = a.settings.collection.length - 1, appendAfterIndex > lastItemIndex && (appendAfterIndex = lastItemIndex), $(a.widget).find(".brandsbox_item:eq(" + itemToMoveIndex + ")").insertAfter($(a.widget).find(".brandsbox_item:eq(" + appendAfterIndex + ")"));
            }
          }
        } else {
          if ("vertical" == a.settings.scrollingOrientation) {
            for (c = 0;c < parseInt(a.settings.cols * a.settings.rows);c++) {
              b += " .brandsbox_item:eq(" + c + ")", c < parseInt(a.settings.cols * a.settings.rows) - 1 && (b += ",");
            }
            $(a.widget).find(b).appendTo($(a.widget).find(".brandsbox_inner"));
          } else {
            for (c = 0;c < parseInt(a.settings.rows);c++) {
              for (itemToMoveIndex = 2 * a.settings.cols * c, appendAfterIndex = parseInt(itemToMoveIndex + 2 * a.settings.cols - 1), lastItemIndex = a.settings.collection.length - 1, appendAfterIndex > lastItemIndex && (appendAfterIndex = lastItemIndex), b = itemToMoveIndex;b < parseInt(itemToMoveIndex + a.settings.cols);b++) {
                appendAfterIndex = parseInt(b + 2 * a.settings.cols - 1), $(a.widget).find(".brandsbox_item").eq(b).insertAfter($(a.widget).find(".brandsbox_item").eq(appendAfterIndex));
              }
            }
          }
        }
        $(a.widget).addClass("in");
        f = setTimeout(function() {
          $(a.widget).removeClass("out").removeClass("in");
          k = !0;
          a.runTimer();
        }, parseInt(transitionStepDuration + 0));
      }, parseInt(transitionStepDuration + 0));
    }
  };
  this.play = function() {
    !0 == e && (a.runTimer(), e = !1);
  };
  this.runTimer = function() {
    h = setInterval(a.switchSlide, a.settings.scrollingDelay);
  };
  this.pauseTimer = function() {
    clearInterval(h);
    h = !1;
  };
  this.pause = function() {
    !1 == e && (a.pauseTimer(), e = !0);
  };
  this.stop = function() {
    a.pause();
    clearTimeout(f);
    f = !1;
  };
  this.destroy = function() {
    a.stop();
    $(a.widget).remove();
  };
  this.settings = this.setOptions(b);
  $(this.widget).on("mouseenter, mousemove", function() {
    a.pause();
  }).on("mouseleave", function() {
    a.play();
  }).on("mouseenter, mousemove", ".brandsbox_item", function() {
  }).on("mouseenter", ".brandsbox_item", function() {
    $(this).find(".brandsbox_item_image").css({opacity:a.settings.hoverOpacity});
  }).on("mouseout, mouseleave", ".brandsbox_item", function() {
    $(this).find(".brandsbox_item_image").css({opacity:a.settings.startOpacity});
  });
  $(window).blur(function() {
    a.pause();
  }).focus(function() {
    a.play();
  });
}
$.extend({brandsBox:{embed:function(b, a) {
  "undefined" == typeof _brandsBox_instances[b] && (_brandsBox_instances[b] = new brandsBox(a), $(b).append(_brandsBox_instances[b].widget), colsNum = _brandsBox_instances[b].settings.cols, rowsNum = _brandsBox_instances[b].settings.rows, cellWidth = parseInt($(b).innerWidth() / colsNum), cellHeight = parseInt($(b).innerHeight() / rowsNum), $(_brandsBox_instances[b].widget).find(".brandsbox_item").css({width:cellWidth + "px", height:cellHeight + "px"}), setTimeout(function() {
    $(_brandsBox_instances[b].widget).attr({"data-hover-effect-speed":_brandsBox_instances[b].settings.hoverEffectSpeed, "data-color-mode":_brandsBox_instances[b].settings.colorMode, "data-scrolling-mode":_brandsBox_instances[b].settings.scrollingMode, "data-scrolling-transition":_brandsBox_instances[b].settings.scrollingTransition, "data-scrolling-transition-speed":_brandsBox_instances[b].settings.scrollingTransitionSpeed}).addClass(_brandsBox_instances[b].settings.scrollingOrientation);
    setTimeout(function() {
      $(_brandsBox_instances[b].widget).attr("data-ready", !0);
      setTimeout(function() {
        _brandsBox_instances[b].play();
      }, 750);
    }, 0);
  }, 0));
}, getInstance:function(b) {
  return _brandsBox_instances[b];
}, destroy:function(b) {
  "undefined" !== typeof _brandsBox_instances[b] && (_brandsBox_instances[b].destroy(), delete _brandsBox_instances[b]);
}}});