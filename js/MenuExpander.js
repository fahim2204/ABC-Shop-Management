  function ExpandSubMenu(id) {
      var child = id.children;
      for (var i = 0; i < child.length; i++) {
          if (child[i].tagName == "UL" && child[i].style['visibility'] == "visible") {
              child[i].style['opacity'] = "0";
              child[i].style['position'] = "absolute";
              child[i].style['visibility'] = "hidden";
              child[i].style['z-index'] = "-2";
              id.style['background-color'] = "#26abd6";
          } else {
              child[i].style['opacity'] = "1";
              child[i].style['position'] = "relative";
              child[i].style['visibility'] = "visible";
              child[i].style['z-index'] = "3";
              // id.addEventListener('focus', id.style['background-color'] = "black");
              id.style['background-color'] = "black";
          }
      }


  }