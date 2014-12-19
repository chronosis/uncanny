/**
  *  Uncanny
  *  Version 0.3.0
  *  Canned Response Generator
  *
  *  Copyright 2014, Jay Reardon, All Rights Reserved
  */

var defaultLength = 50;

var Uncanny = {
  checkedResponses: [ ],

  prettyTruncString: function(str, len) {
    if (str.length > len) {
      str = str.substring(0,len-3) + "...";
    }
    return str;
  },

  toggleArrayItem: function(a, v) {
      var i = a.indexOf(v);
      if (i === -1)
          a.push(v);
      else
          a.splice(i,1);
  },

  getResponses: function() {
    $.get( "./categories/index/.json", function( categoriesData ) {
        $.get( "./responses/index/.json", function( responsesData ) {
            var output = "<div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">";
            for (c_index in categoriesData.categories) {
              category = categoriesData.categories[c_index];
              c_heading = "heading_" + category.Category.id;
              c_label = "category_" + category.Category.id;
              output += "<div class=\"panel panel-default\">" +
                        "<div class=\"panel-heading\" role=\"tab\" id=\"" + c_heading + "\">" +
                        "<h4 class=\"panel-title\">" +
                        "<a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#" + c_label + "\" aria-expanded=\"false\" aria-controls=\"" + c_label + "\">" +
                        category.Category.label +
                        "</a>" +
                        "<span style=\"float:right\"><a href=\"responses/Add/category_id:" + category.Category.id + "\"><img src=\"/uncanny/img/add.png\" alt=\"New Response\" width=\"20px\"></a></span>" +
                        "</h4>" +
                        "</div>" +
                        "<div id=\"" + c_label + "\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"" + c_heading + "\">" +
                        "<div class=\"panel-body\">";

              for (r_index in responsesData.responses) {
                response = responsesData.responses[r_index];
                if (response.Response.category_id == category.Category.id) {
                  desc = Uncanny.prettyTruncString(response.Response.description, defaultLength);
                  output += "<div class=\"btn-group btn-block\" data-toggle=\"buttons\" style=\"margin-bottom: 5px;\">" +
                            "<label class=\"btn btn-default btn-block\" style=\"text-align: left;\">" +
                            "<input type=\"checkbox\" autocomplete=\"off\" id=\"resp_" + response.Response.id + "\" value=\"" + response.Response.id + "\">" +
                            "<b>" + response.Response.label + "</b><br/>" +
                            desc +
                            "</label>" +
                            "</div><br/>";
                }
              }

              output += "</div>" +
                        "</div>" +
                        "</div>";
            }
            output += "</div><br/>";

            var resp = $("#responses");
            resp.toggleClass('responses-loading');
            resp.toggleClass('responses-buttons');
            resp.html( output );

            for (response in responsesData.responses) {
              obj = responsesData.responses[response];
              el = '#resp_' + obj.Response.id;
              $(el).on('change', function () {
                Uncanny.toggleResponse(this);
              });
            }
          }
        );
      }
    );
  },

  toggleResponse: function(el) {
    Uncanny.toggleArrayItem(Uncanny.checkedResponses, el.value);
    var list = "";
    for (item in Uncanny.checkedResponses) {
      if (list != "") {
        list += ",";
      }
      list += Uncanny.checkedResponses[item];
    }
    Uncanny.updateCannedOutput(list);
  },

  updateCannedOutput: function(list) {
    var generated = $("#generated");
    if (list != "") {
      $.get( "./responses/generate_response/" + list + "/.json", function( data ) {
          var output = data.generated;
          generated.html( output );
        }
      );
    }
    else {
      generated.html("This will be replaced with generated text.");
    }
  },

  clearSelection: function() {
    if (window.getSelection) {
      if (window.getSelection().empty) {  // Chrome
        window.getSelection().empty();
      } else if (window.getSelection().removeAllRanges) {  // Firefox
        window.getSelection().removeAllRanges();
      }
    } else if (document.selection) {  // IE?
      document.selection.empty();
    }
  },

  selectText: function(containerId) {
      Uncanny.clearSelection();
      if (document.selection) {
          var range = document.body.createTextRange();
          range.moveToElementText(document.getElementById(containerId));
          range.select();
      } else if (window.getSelection) {
          var range = document.createRange();
          range.selectNode(document.getElementById(containerId));
          window.getSelection().addRange(range);
      }
  }
}

Uncanny.getResponses();
