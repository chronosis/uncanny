/**
  *  Uncanny
  *  Version 0.2.0
  *  Canned Response Generator
  *
  *  Copyright 2014, Jay Reardon, All Rights Reserved
  */

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
    $.get( "./responses/index/.json", function( data ) {
        var output = "";
        for (response in data.responses) {
          obj = data.responses[response];
          desc = Uncanny.prettyTruncString(obj.Response.description, 40);
          output += "<div class=\"btn-group btn-block\" data-toggle=\"buttons\" style=\"margin-bottom: 5px;\">" +
                    "<label class=\"btn btn-default btn-block\" style=\"text-align: left;\">" +
                    "<input type=\"checkbox\" autocomplete=\"off\" id=\"resp_" + obj.Response.id + "\" value=\"" + obj.Response.id + "\">" +
                    "<b>" + obj.Response.label + "</b><br/>" +
                    desc +
                    "</label>" +
                    "</div><br/>";
        }
        output += "<br/>";

        var resp = $("#responses");
        resp.toggleClass('responses-loading');
        resp.toggleClass('responses');
        resp.html( output );

        for (response in data.responses) {
          obj = data.responses[response];
          el = '#resp_' + obj.Response.id;
          $(el).on('change', function () {
            Uncanny.toggleResponse(this);
          });
        }
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
