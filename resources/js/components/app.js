
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Urlshort from './urlshort'
import Urllist from './urllist'




document.onreadystatechange = function () {
  if (document.readyState === 'complete') {
      var app = document.getElementById("forma");
      ReactDOM.render(<Urlshort />, app);

      var app = document.getElementById("lista");
      ReactDOM.render(<Urllist />, app);
  }
}
