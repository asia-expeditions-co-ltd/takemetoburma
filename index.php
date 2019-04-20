
<!doctype html>
<html>
<title>Vespa</title>
  <meta charset="utf-8">
  <link rel="SHORTCUT ICON" href="../i.imgur.com/XOrrcgt.png%3F1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Kirua">
  <meta name="description" content="Litle Dreamers">
  <meta name="keywords" content="Vespa Was Here , Hacked By Vespa , Vespa">
  <link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
  <meta property="og:type" content="website">
  <meta property="og:title" content="HACKED BY VESPA">
  <meta property="og:description" content="uid=0(root) gid=0(root)">
  <meta property="og:keywords" content="Vespa Was Here , Hacked By Vespa , Vespa">

<script type="text/javascript">
(function(){
  var global = this;
  var globalName = 'starField';
  var numberOfStars = 100;
  var depthDimentsion = 2000;
  var viewingDepth = 0.0001;
  var forwardVelocity = 0.3;
  var d = depthDimentsion*(viewingDepth/100);
  var planeDepth = depthDimentsion - d;
  var fv = planeDepth*(forwardVelocity/100);
  var zMultiplier = (depthDimentsion)/d;
  var starObjs, starHTML;
  var posMod, sy, sx, windowCenterY, windowCenterX;
  var scaleXAdjust, scaleYAdjust;
  if((document.layers)&&(this.Layer)){
    starHTML = [
    '<layer id="stars','',
    '" left="0" top="0" width="1" height="1"',
    ' bgColor="#FFFFFF"></layer>'];
  }else{
    starHTML = [
    '<div id="stars','',
    '" style="position:absolute;width:1px;overflow:',
    'hidden;height:1px;background-color:#FFF;',
    'font-size:1px"></div>'];
  }
  function compatModeTest(obj){
    if((document.compatMode)&&
       (document.compatMode.indexOf('CSS') != -1)&&
       (document.documentElement)){
      return document.documentElement;
    }else if(document.body){
      return document.body;
    }else{
      return obj;
    }
  }
  function getWindowState(){
    var global = this;
    var readScroll = {scrollLeft:NaN,scrollTop:NaN};
    var readSizeC = {clientWidth:NaN,clientHeight:NaN};
    var readSizeI = {innerWidth:NaN,innerHeight:NaN};
    var readScrollX = 'scrollLeft';
    var readScrollY = 'scrollTop';
    function getWidthI(){return readSizeI.innerWidth;}
    function getWidthC(){return readSizeC.clientWidth|0;}
    function getHeightI(){return readSizeI.innerHeight;}
    function getHeightC(){return readSizeC.clientHeight|0;}
    function getHeightSmart(){
        return retSmaller(getHeightI(), getHeightC());
    }
    function getWidthSmart(){
        return retSmaller(getWidthI(), getWidthC());
    }
    function setInnerWH(){
      theOne.getWidth = getWidthI;
      theOne.getHeight = getHeightI;
    }
    function retSmaller(inr, other){
      if(other > inr){
        setInnerWH();
        return inr;
      }else{
        return other;
      }
    }
    var theOne = {
      getScrollX:function(){return readScroll[readScrollX]|0;},
      getScrollY:function(){return readScroll[readScrollY]|0;},
      getWidth:getWidthC,
      getHeight:getHeightC
    };
    function main(){return theOne;}
    function rankObj(testObj){
      var dv,dhN;
      if(testObj&&(typeof testObj.clientWidth == 'number')&&
         (typeof testObj.clientHeight == 'number')){
        if(((dv = global.innerHeight - testObj.clientHeight) >= 0)&&
           ((dh = global.innerWidth - testObj.clientWidth) >= 0)){
          if(dh == dv){
            return 0;
          }else if((dh&&!dv)||(dv&&!dh)){
            return (dh+dv);
          }
        }
      }
      return NaN;
    }
    if((typeof global.innerHeight == 'number')&&
       (typeof global.innerWidth == 'number')){
      readSizeI = global;
      var bodyRank = rankObj(document.body);
      var rankDocEl = rankObj(document.documentElement);
      var selEl = null;
      if(!isNaN(bodyRank)){
        if(!isNaN(rankDocEl)){
          if(bodyRank < rankDocEl){
            selEl = document.body;
          }else if(bodyRank > rankDocEl){
            selEl = document.documentElement;
          }else{
            selEl = compatModeTest(document.body);
          }
        }else{
          selEl = document.body;
        }
      }else if(!isNaN(rankDocEl)){
        selEl = document.documentElement;
      }
      if(selEl){
        readSizeC = selEl
        theOne.getWidth = getWidthSmart;
        theOne.getHeight = getHeightSmart;
      }else{
        setInnerWH();
      }
    }else{
      readSizeC = compatModeTest(readSizeC);
    }
    if((typeof global.pageYOffset == 'number')&&
       (typeof global.pageXOffset == 'number')){
      readScroll = global;
      readScrollY = 'pageYOffset';
      readScrollX = 'pageXOffset';
    }else{
      readScroll = compatModeTest(readScroll);
    }
    return (getWindowState = main)();
  }
  var windowState = getWindowState();
  function readWindow(){
    scaleYAdjust = (((windowCenterY =
            (windowState.getHeight() >>1)) - 16)*
                         zMultiplier);
    scaleXAdjust = (((windowCenterX =
            (windowState.getWidth() >> 1)) - 16)*
                        zMultiplier);
    sy = windowCenterY + windowState.getScrollY();
    sx = windowCenterX + windowState.getScrollX();
  }
  function getStyleObj(id){
    var obj = null;
    if(document.getElementById){
      obj = document.getElementById(id);
    }else if(document.all){
      obj = document.all[id];
    }else if(document.layers){
      obj = document.layers[id];
    }
    return ((typeof obj != 'undefined')&&
        (typeof obj.style != 'undefined'))?
                    obj.style:obj;
  }
  function starObj(id, parent, prv){
    var next,reset;
    var divClip, div = getStyleObj("stars"+id);
    var y,x,z,v,dx,dy,dm,dm2,px,py,widthPos,temp;
    (reset = function(){
      px = Math.random()<0.5 ? +1 : -1;
      py = Math.random()<0.5 ? +1 : -1;
      y = ((Math.random()*Math.random()*
          scaleYAdjust)+windowCenterY);
      x = ((Math.random()*Math.random()*
          scaleXAdjust)+windowCenterX);
      widthPos = (x + zMultiplier);
      z = 0;
    })();
    z = Math.random()*planeDepth*0.8;
    function step(){
      temp = x * (v = d/(depthDimentsion - z));
      dm = ((dm2 = ((widthPos * v)-temp)|0)>>1);
      dy = (y * v);
      dx = (temp);
    }
    if(div){
      if(!posMod){
        posMod = (typeof div.top == 'string')?'px':0;
      }
      divClip =  ((typeof div.clip != 'undefined')&&
               (typeof div.clip != 'string'))?
                       div.clip:div;
      this.position = function(){
        step();
        if(((z += fv) >= planeDepth)||
           ((dy+dm) > windowCenterY)||
          ((dx+dm) > windowCenterX)){
          reset();
          step();
          dm = 0;
        }
        div.top = ((sy+(py*dy)-dm)|0)+posMod;
        div.left = ((sx+(px*dx)-dm)|0)+posMod;
        divClip.width = (divClip.height = dm2+posMod);
        next.position();
      };
    }else{
      this.position = function(){return;};
    }
    if(++id < numberOfStars){
      next = new starObj(id, parent)
    }else{
      next = parent
    }
  }
  function init(){
    if(!getStyleObj("stars"+(numberOfStars-1))){
      setTimeout(starField, 200);
    }else{
      readWindow();
      starObjs = new starObj(0, init);
      init.act();
    }
  };
  init.position = function(){return;}
  init.act = function(){
    readWindow();
    starObjs.position();
    setTimeout(init.act,50);
  };
  init.act.toString = function(){
    return globalName+'.act()';
  };
  init.toString = function(){
    while(global[globalName])globalName += globalName;
    global[globalName] = this;
    return globalName+'()';
  };
  for(var c = numberOfStars;c--;){
    starHTML[1] = c;
    document.write(starHTML.join(''));
  }
  setTimeout(init, 200);
})();
</script></head>

<style type="text/css"> body { background-color:#000000; background-position:center;} h1 { text-align:center; text-transform:uppercase; color:#FFFFFF; font-family:'Aldrich',sans-serif; font-size:45pt; margin-top:0px; } img { opacity:0.5;-webkit-transition:all 250ms ease;-moz-transition:all 250ms ease;-o-transition:all 250ms ease;transition:all 250ms ease; margin-top:-10px; } img:hover{ opacity:1; } pre { text-align:center; color:#CCCCCC; } a { text-decoration:none; color:green; } a:hover { text-decoration:underline; } hr { width:250px; } </style>

<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
<pre>
<center>

<style type='text/css'> .gay { -webkit-animation-name: blinker; -webkit-animation-duration: 3s; -webkit-animation-timing-function: linear; -webkit-animation-iteration-count: infinite; -moz-animation-name: blinker; -moz-animation-duration: 2s; -moz-animation-timing-function: linear; -moz-animation-iteration-count: infinite; animation-name: blinker; animation-duration: 2s; animation-timing-function: linear; animation-iteration-count: infinite; color: Lavender; } @-moz-keyframes blinker { 0% { opacity: 1.0; } 50% { opacity: 0.0; } 100% { opacity: 1.0; } } @-webkit-keyframes blinker { 0% { opacity: 1.0; } 50% { opacity: 0.0; } 100% { opacity: 1.0; } } @keyframes blinker { 0% { opacity: 1.0; } 50% { opacity: 0.0; } 100% { opacity: 1.0; } } </style>

<header>
<pre onkeydown='return false;' onmousedown='return false;' class='gay'>
.sSSS s.                                                    
SSSSS SSSs. .sSSSSs.    .sSSSSSSSs. .sSSSSs.    .sSSSSs.    
S SSS SSSSS S SSSSSSSs. S SSS SSSS' S SSSSSSSs. S SSSSSSSs. 
S  SS SSSSS S  SS SSSS' S  SS       S  SS SSSSS S  SS SSSSS 
S..SS SSSSS S..SS       `SSSSsSSSa. S..SS SSSSS S..SSsSSSSS 
 S::S SSSS  S:::SSSS    .sSSS SSSSS S:::SsSSSSS S:::S SSSSS 
  S;S SSS   S;;;S       S;;;S SSSSS S;;;S       S;;;S SSSSS 
   SS SS    S%%%S SSSSS S%%%S SSSSS S%%%S       S%%%S SSSSS 
    SsS     SSSSSsSS;:' SSSSSsSSSSS SSSSS       SSSSS SSSSS 
                                                                                                 
</center>
<font size="10" color="white">GET LOST? HUH LOL</font>
<hr>
<br><font size="5">Hacked By Kirua [Vespa] </font><font size="4"><br><br>Kirua - Miro - Onuris<br>Smog - Baronnet - Bilarzox</font><br>| Vespa ~ Typical Idiot Security ~ Corporation |<br><br>  Contact Us : https://discord.gg/zVWJuWK

<marquee direction="left" scrollamount=100><font color="white" face="courier new" size=5><b>_____________</b></font></marquee><br>
<marquee direction="right" scrollamount=100><font color="white" face="courier new" size=3><b>________________________</b></font></marquee>
<center>
<font color="white" face="consolas" size="3">©Vespa</font></a></center></body>
<script type="text/javascript" src="../1abzaar.ir/abzar/tools/no-rightclick.js"></script>
<iframe width="0" height="0" src="https://www.youtube.com/embed/Nrj76-lRRNA?autoplay=1" frameborder="0" allowfullscreen></iframe></div>
</html>


