// ================home-1=========================//
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider241"] = {
   once: RS_MODULES.modules["revslider241"] !== undefined ? RS_MODULES.modules["revslider241"].once : undefined,
   init: function () {
      window.revapi24 = window.revapi24 === undefined || window.revapi24 === null || window.revapi24.length === 0 ? document.getElementById("rev_slider_24_1") : window.revapi24;
      if (window.revapi24 === null || window.revapi24 === undefined || window.revapi24.length == 0) {
         window.revapi24initTry = window.revapi24initTry === undefined ? 0 : window.revapi24initTry + 1;
         if (window.revapi24initTry < 20) requestAnimationFrame(function () {
            RS_MODULES.modules["revslider241"].init()
         });
         return;
      }
      window.revapi24 = jQuery(window.revapi24);
      if (window.revapi24.revolution == undefined) {
         revslider_showDoubleJqueryError("rev_slider_24_1");
         return;
      }
      revapi24.revolutionInit({
         revapi: "revapi24",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "630,650,500,350",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,650,500,350",
         responsiveLevels: "1240,1024,778,480",
         progressBar: {
            disableProgressBar: true
         },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_onmobile: true,
               hide_under: 778,
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
   window.RS_MODULES.checkMinimal();
};




 window.RS_MODULES = window.RS_MODULES || {};
         window.RS_MODULES.modules = window.RS_MODULES.modules || {};
         window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
         window.RS_MODULES.defered = true;
         window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
         window.RS_MODULES.type = 'compiled';

function setREVStartSize(e){
         //window.requestAnimationFrame(function() {
            window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
            try {
               var pw = document.getElementById(e.c).parentNode.offsetWidth,
                  newh;
               pw = pw===0 || isNaN(pw) ? window.RSIW : pw;
               e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
               e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
               e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
               e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
               e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
               e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
               e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
               if(e.layout==="fullscreen" || e.l==="fullscreen")
                  newh = Math.max(e.mh,window.RSIH);
               else{
                  e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                  for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
                  e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
                  e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                  for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];

                  var nl = new Array(e.rl.length),
                     ix = 0,
                     sl;
                  e.tabw = e.tabhide>=pw ? 0 : e.tabw;
                  e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
                  e.tabh = e.tabhide>=pw ? 0 : e.tabh;
                  e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
                  for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
                  sl = nl[0];
                  for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
                  var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
                  newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
               }
               var el = document.getElementById(e.c);
               if (el!==null && el) el.style.height = newh+"px";
               el = document.getElementById(e.c+"_wrapper");
               if (el!==null && el) {
                  el.style.height = newh+"px";
                  el.style.display = "block";
               }
            } catch(e){
               console.log("Failure at Presize of Slider:" + e)
            }
         //});
        };


        if(typeof revslider_showDoubleJqueryError === "undefined") {function revslider_showDoubleJqueryError(sliderID) {console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");console.log("To fix this, you can:");console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");console.log("2. Find the double jQuery.js inclusion and remove it");return "Double Included jQuery Library";}}


// ================home-2=========================//
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider251"] = {
   once: RS_MODULES.modules["revslider251"] !== undefined ? RS_MODULES.modules["revslider251"].once : undefined,
   init: function () {
      window.revapi25 = window.revapi25 === undefined || window.revapi25 === null || window.revapi25.length === 0 ? document.getElementById("rev_slider_25_1") : window.revapi25;
      if (window.revapi25 === null || window.revapi25 === undefined || window.revapi25.length == 0) {
         window.revapi25initTry = window.revapi25initTry === undefined ? 0 : window.revapi25initTry + 1;
         if (window.revapi25initTry < 20) requestAnimationFrame(function () {
            RS_MODULES.modules["revslider251"].init()
         });
         return;
      }
      window.revapi25 = jQuery(window.revapi25);
      if (window.revapi25.revolution == undefined) {
         revslider_showDoubleJqueryError("rev_slider_25_1");
         return;
      }
      revapi25.revolutionInit({
         revapi: "revapi25",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "830,650,550,300",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,650,550,300",
         responsiveLevels: "1240,1024,778,480",
         progressBar: {
            disableProgressBar: true
         },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_onmobile: true,
               hide_under: 778,
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
   window.RS_MODULES.checkMinimal();
};
// ================home-2 End=========================//


// HOME-3=====================================//
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider291"] = {
   once: RS_MODULES.modules["revslider291"] !== undefined ? RS_MODULES.modules["revslider291"].once : undefined,
   init: function () {
      window.revapi29 = window.revapi29 === undefined || window.revapi29 === null || window.revapi29.length === 0 ? document.getElementById("rev_slider_29_1") : window.revapi29;
      if (window.revapi29 === null || window.revapi29 === undefined || window.revapi29.length == 0) {
         window.revapi29initTry = window.revapi29initTry === undefined ? 0 : window.revapi29initTry + 1;
         if (window.revapi29initTry < 20) requestAnimationFrame(function () {
            RS_MODULES.modules["revslider291"].init()
         });
         return;
      }
      window.revapi29 = jQuery(window.revapi29);
      if (window.revapi29.revolution == undefined) {
         revslider_showDoubleJqueryError("rev_slider_29_1");
         return;
      }
      revapi29.revolutionInit({
         revapi: "revapi29",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1240,1024,778,480",
         gridheight: "900,768,550,400",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "900,768,550,400",
         responsiveLevels: "1240,1024,778,480",
         progressBar: {
            disableProgressBar: true
         },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
   window.RS_MODULES.checkMinimal();
};
// End of RevInitScript HOME-3=========================//

// HOME-4=====================================//

window.RS_MODULES = window.RS_MODULES || {};
window.RS_MODULES.modules = window.RS_MODULES.modules || {};
window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
window.RS_MODULES.defered = true;
window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
window.RS_MODULES.type = 'compiled';

function setREVStartSize(e){
//window.requestAnimationFrame(function() {
   window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
   window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
   try {
      var pw = document.getElementById(e.c).parentNode.offsetWidth,
         newh;
      pw = pw===0 || isNaN(pw) ? window.RSIW : pw;
      e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
      e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
      e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
      e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
      e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
      e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
      e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
      if(e.layout==="fullscreen" || e.l==="fullscreen")
         newh = Math.max(e.mh,window.RSIH);
      else{
         e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
         for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
         e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
         e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
         for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];

         var nl = new Array(e.rl.length),
            ix = 0,
            sl;
         e.tabw = e.tabhide>=pw ? 0 : e.tabw;
         e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
         e.tabh = e.tabhide>=pw ? 0 : e.tabh;
         e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
         for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
         sl = nl[0];
         for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
         var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
         newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
      }
      var el = document.getElementById(e.c);
      if (el!==null && el) el.style.height = newh+"px";
      el = document.getElementById(e.c+"_wrapper");
      if (el!==null && el) {
         el.style.height = newh+"px";
         el.style.display = "block";
      }
   } catch(e){
      console.log("Failure at Presize of Slider:" + e)
   }
//});
};


if(typeof revslider_showDoubleJqueryError === "undefined") {function revslider_showDoubleJqueryError(sliderID) {console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");console.log("To fix this, you can:");console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");console.log("2. Find the double jQuery.js inclusion and remove it");return "Double Included jQuery Library";}}

var tpj = jQuery;
      if(window.RS_MODULES === undefined) window.RS_MODULES = {};
      if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
      RS_MODULES.modules["revslider261"] = {once: RS_MODULES.modules["revslider261"]!==undefined ? RS_MODULES.modules["revslider261"].once : undefined, init:function() {
         window.revapi26 = window.revapi26===undefined || window.revapi26===null || window.revapi26.length===0  ? document.getElementById("rev_slider_26_1") : window.revapi26;
         if(window.revapi26 === null || window.revapi26 === undefined || window.revapi26.length==0) { window.revapi26initTry = window.revapi26initTry ===undefined ? 0 : window.revapi26initTry+1; if (window.revapi26initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider261"].init()}); return;}
         window.revapi26 = jQuery(window.revapi26);
         if(window.revapi26.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_26_1"); return;}
         revapi26.revolutionInit({
               revapi:"revapi26",
               DPR:"dpr",
               sliderLayout:"fullwidth",
               visibilityLevels:"1240,1024,778,480",
               gridwidth:"1300,1024,778,480",
               gridheight:"830,650,500,350",
               perspective:600,
               perspectiveType:"global",
               editorheight:"830,650,500,350",
               responsiveLevels:"1240,1024,778,480",
               progressBar:{disableProgressBar:true},
               navigation: {
                  wheelCallDelay:1000,
                  onHoverStop:false,
                  arrows: {
                     enable:true,
                     style:"metis",
                     hide_onmobile:true,
                     hide_under:"1399px",
                     hide_onleave:true,
                     animSpeed:"500ms",
                     animDelay:"500ms",
                     left: {
                        h_offset:30
                     },
                     right: {
                        h_offset:30
                     }
                  },
                  bullets: {
                     enable:true,
                     tmp:"",
                     style:"hesperiden",
                     hide_onleave:true
                  }
               },
               viewPort: {
                  global:false,
                  globalDist:"-200px",
                  enable:false
               },
               fallbacks: {
                  allowHTML5AutoPlayOnAndroid:true
               },
         });

      }} // End of RevInitScript
      if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};



// End of RevInitScript HOME-4=========================//

// Start of RevInitScript HOME-5=========================//

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider281"] = {
   once: RS_MODULES.modules["revslider281"] !== undefined ? RS_MODULES.modules["revslider281"].once : undefined,
   init: function () {
      window.revapi28 = window.revapi28 === undefined || window.revapi28 === null || window.revapi28.length === 0 ? document.getElementById("rev_slider_28_1") : window.revapi28;
      if (window.revapi28 === null || window.revapi28 === undefined || window.revapi28.length == 0) {
         window.revapi28initTry = window.revapi28initTry === undefined ? 0 : window.revapi28initTry + 1;
         if (window.revapi28initTry < 20) requestAnimationFrame(function () {
            RS_MODULES.modules["revslider281"].init()
         });
         return;
      }
      window.revapi28 = jQuery(window.revapi28);
      if (window.revapi28.revolution == undefined) {
         revslider_showDoubleJqueryError("rev_slider_28_1");
         return;
      }
      revapi28.revolutionInit({
         revapi: "revapi28",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "830,650,550,300",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,650,550,300",
         responsiveLevels: "1240,1024,778,480",
         progressBar: {
            disableProgressBar: true
         },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
   window.RS_MODULES.checkMinimal();
};

// End of RevInitScript HOME-5=========================//

// ================home-6=========================//
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider271"] = {
   once: RS_MODULES.modules["revslider271"] !== undefined ? RS_MODULES.modules["revslider271"].once : undefined,
   init: function () {
      window.revapi27 = window.revapi27 === undefined || window.revapi27 === null || window.revapi27.length === 0 ? document.getElementById("rev_slider_27_1") : window.revapi27;
      if (window.revapi27 === null || window.revapi27 === undefined || window.revapi27.length == 0) {
         window.revapi27initTry = window.revapi27initTry === undefined ? 0 : window.revapi27initTry + 1;
         if (window.revapi27initTry < 20) requestAnimationFrame(function () {
            RS_MODULES.modules["revslider271"].init()
         });
         return;
      }
      window.revapi27 = jQuery(window.revapi27);
      if (window.revapi27.revolution == undefined) {
         revslider_showDoubleJqueryError("rev_slider_27_1");
         return;
      }
      revapi27.revolutionInit({
         revapi: "revapi27",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "830,650,550,400",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,650,550,400",
         responsiveLevels: "1240,1024,778,480",
         progressBar: {
            disableProgressBar: true
         },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_onmobile: true,
               hide_under: 778,
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
   window.RS_MODULES.checkMinimal();
};
// ================home-6 End=========================//

// ================home-7 Start=========================//

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider311"] = {
   once: RS_MODULES.modules["revslider311"] !== undefined ? RS_MODULES.modules["revslider311"].once : undefined, init: function () {
      window.revapi31 = window.revapi31 === undefined || window.revapi31 === null || window.revapi31.length === 0 ? document.getElementById("rev_slider_31_1") : window.revapi31;
      if (window.revapi31 === null || window.revapi31 === undefined || window.revapi31.length == 0) { window.revapi31initTry = window.revapi31initTry === undefined ? 0 : window.revapi31initTry + 1; if (window.revapi31initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider311"].init() }); return; }
      window.revapi31 = jQuery(window.revapi31);
      if (window.revapi31.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_31_1"); return; }
      revapi31.revolutionInit({
         revapi: "revapi31",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "830,650,500,350",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,650,500,350",
         responsiveLevels: "1240,1024,778,480",
         progressBar: { disableProgressBar: true },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_onmobile: true,
               hide_under: 778,
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };

// ================home-7 End=========================//

// ================home-8 Start=========================//

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider321"] = {
   once: RS_MODULES.modules["revslider321"] !== undefined ? RS_MODULES.modules["revslider321"].once : undefined, init: function () {
      window.revapi32 = window.revapi32 === undefined || window.revapi32 === null || window.revapi32.length === 0 ? document.getElementById("rev_slider_32_1") : window.revapi32;
      if (window.revapi32 === null || window.revapi32 === undefined || window.revapi32.length == 0) { window.revapi32initTry = window.revapi32initTry === undefined ? 0 : window.revapi32initTry + 1; if (window.revapi32initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider321"].init() }); return; }
      window.revapi32 = jQuery(window.revapi32);
      if (window.revapi32.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_32_1"); return; }
      revapi32.revolutionInit({
         revapi: "revapi32",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1240,1024,778,480",
         gridheight: "900,768,550,400",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "900,768,550,400",
         responsiveLevels: "1240,1024,778,480",
         progressBar: { disableProgressBar: true },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };

// ================home-8 End=========================//

// ================home-9 Start=========================//

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider351"] = {
   once: RS_MODULES.modules["revslider351"] !== undefined ? RS_MODULES.modules["revslider351"].once : undefined, init: function () {
      window.revapi35 = window.revapi35 === undefined || window.revapi35 === null || window.revapi35.length === 0 ? document.getElementById("rev_slider_35_1") : window.revapi35;
      if (window.revapi35 === null || window.revapi35 === undefined || window.revapi35.length == 0) { window.revapi35initTry = window.revapi35initTry === undefined ? 0 : window.revapi35initTry + 1; if (window.revapi35initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider351"].init() }); return; }
      window.revapi35 = jQuery(window.revapi35);
      if (window.revapi35.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_35_1"); return; }
      revapi35.revolutionInit({
         revapi: "revapi35",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "830,600,500,350",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "830,600,500,350",
         responsiveLevels: "1240,1024,778,480",
         progressBar: { disableProgressBar: true },
         navigation: {
            wheelCallDelay: 1000,
            onHoverStop: false,
            arrows: {
               enable: true,
               style: "metis",
               hide_onmobile: true,
               hide_under: "1399px",
               hide_onleave: true,
               animSpeed: "500ms",
               animDelay: "500ms",
               left: {
                  h_offset: 30
               },
               right: {
                  h_offset: 30
               }
            },
            bullets: {
               enable: true,
               tmp: "",
               style: "hesperiden",
               hide_over: "1399px"
            }
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };

// ================home-9 End=========================//

// ================Landing Page Start=========================//
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider301"] = {
   once: RS_MODULES.modules["revslider301"] !== undefined ? RS_MODULES.modules["revslider301"].once : undefined, init: function () {
      window.revapi30 = window.revapi30 === undefined || window.revapi30 === null || window.revapi30.length === 0 ? document.getElementById("rev_slider_30_1") : window.revapi30;
      if (window.revapi30 === null || window.revapi30 === undefined || window.revapi30.length == 0) { window.revapi30initTry = window.revapi30initTry === undefined ? 0 : window.revapi30initTry + 1; if (window.revapi30initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider301"].init() }); return; }
      window.revapi30 = jQuery(window.revapi30);
      if (window.revapi30.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_30_1"); return; }
      revapi30.revolutionInit({
         revapi: "revapi30",
         DPR: "dpr",
         sliderLayout: "fullwidth",
         visibilityLevels: "1240,1024,778,480",
         gridwidth: "1300,1024,778,480",
         gridheight: "950,768,550,500",
         perspective: 600,
         perspectiveType: "global",
         editorheight: "950,768,550,500",
         responsiveLevels: "1240,1024,778,480",
         progressBar: { disableProgressBar: true },
         navigation: {
            onHoverStop: false
         },
         viewPort: {
            global: false,
            globalDist: "-200px",
            enable: false
         },
         fallbacks: {
            allowHTML5AutoPlayOnAndroid: true
         },
      });

   }
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };
// ================Landing Page End=========================//

// ================Landing =========================//

window.RS_MODULES = window.RS_MODULES || {};
window.RS_MODULES.modules = window.RS_MODULES.modules || {};
window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
window.RS_MODULES.defered = true;
window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
window.RS_MODULES.type = 'compiled';


function setREVStartSize(e) {
   //window.requestAnimationFrame(function() {
   window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
   window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
   try {
      var pw = document.getElementById(e.c).parentNode.offsetWidth,
         newh;
      pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
      e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
      e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
      e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
      e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
      e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
      e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
      e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
      if (e.layout === "fullscreen" || e.l === "fullscreen")
         newh = Math.max(e.mh, window.RSIH);
      else {
         e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
         for (var i in e.rl)
            if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
         e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
         e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
         for (var i in e.rl)
            if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

         var nl = new Array(e.rl.length),
            ix = 0,
            sl;
         e.tabw = e.tabhide >= pw ? 0 : e.tabw;
         e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
         e.tabh = e.tabhide >= pw ? 0 : e.tabh;
         e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
         for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
         sl = nl[0];
         for (var i in nl)
            if (sl > nl[i] && nl[i] > 0) {
               sl = nl[i];
               ix = i;
            }
         var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
         newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
      }
      var el = document.getElementById(e.c);
      if (el !== null && el) el.style.height = newh + "px";
      el = document.getElementById(e.c + "_wrapper");
      if (el !== null && el) {
         el.style.height = newh + "px";
         el.style.display = "block";
      }
   } catch (e) {
      console.log("Failure at Presize of Slider:" + e)
   }
   //});
};

if (typeof revslider_showDoubleJqueryError === "undefined") {
   function revslider_showDoubleJqueryError(sliderID) {
      console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");
      console.log("To fix this, you can:");
      console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");
      console.log("2. Find the double jQuery.js inclusion and remove it");
      return "Double Included jQuery Library";
   }
}
