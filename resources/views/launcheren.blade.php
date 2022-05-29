<HTML>
<HEAD>
<title>RPS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<%=mode%>
<!-- LAUNCH_ARGUMENT : sframe.exe /auth_ip:server.example.ru /auth_port:14500 /locale:windows-1251 /country:RU /use_nprotect:0 /en /help_url_w:902 /help_url_h:670 /cash /commercial_shop /cash_url_w:708 -->
<!-- UPDATE_SERVER : 109.248.46.169 -->
<!-- UPDATE_COMPLETE_MESSAGE : Обновление Завершено Успешно.  -->
<!-- ALREADY_UPDATE_MESSAGE : Обновление не требуется. -->
<!-- MOVE_BOX_RECT : 0,0,650,20 -->
<!-- FILENAME_DECO : <div style="color: #000; margin: 10px 0 0 10px; font-size: 8pt;">Загрузка: %s (%d%s)</div> -->
<!-- UPDATE_INFO_DECO : <div style="color: #000; margin: 10px 0 0 10px; font-size: 8pt;">Получение информации от сервера обновлений...</div> -->
<!-- LAUNCHER_UPDATE_MESSAGE : Restart launcher -->

<!-- START_BUTTON_DECO : <a href="action://START/" class="bstart"></a> -->
<!-- LAUNCH_BUTTON_DECO : <a href="action://LAUNCH/" class="blaunch"></a> -->
<!-- CONFIG_BUTTON_DECO : <a href="action://CONFIG/" ><strong>SETTINGS<strong></a> -->
<!-- LAUNCHER_SIZE : 704, 446 -->
<style type="text/css">
body {FONT-FAMILY: "Arial";}
.LAUNCH_BUTTON { WIDTH: 132px; HEIGHT: 44px }
.START_BUTTON { WIDTH: 132px; HEIGHT: 44px }
.PROGRESS_BAR { BORDER-RIGHT: black 1px solid; BORDER-TOP: black 1px solid; BORDER-LEFT: black 1px solid; WIDTH: 540px; BORDER-BOTTOM: black 1px solid; BACKGROUND-COLOR: black ; height : 14px}
.PROGRESS_BAR_PRIMARY { background: url(launcher/img_e72/lineblue.gif) repeat-x left top; display: block; height: 14px;}
.PROGRESS_BAR_SECONDARY {}
.PRIMARY_FONT { COLOR: white }
.SECONDARY_FONT { COLOR: white }
#MESSAGE { FONT-SIZE: 9pt; LEFT: 125px; COLOR: #000000; FONT-FAMILY: "Arial"; POSITION: absolute; TOP: 364px; z-index:1 }
#FILENAME { FONT-SIZE: 9pt; LEFT: 115px; COLOR: #00a6a1; FONT-FAMILY: "Arial"; POSITION: absolute; TOP: 364px; z-index:1 }
#UPDATE_STATUS { FONT-SIZE: 9pt; LEFT: 115px; COLOR: #00a6a1; FONT-FAMILY: "Arial"; POSITION: absolute; TOP: 400px; z-index:1 }
#PROGRESS_1 { position:absolute; left:116px; top:372px; width:540px; height:14px;}
#PERCENTAGE_1 { FONT-SIZE: 9pt; COLOR: #00a6a1; LEFT: 658px; FONT-FAMILY: "Arial"; POSITION: absolute; TOP: 368px }
#PROGRESS_2 { position:absolute; left:116px; top:400px; width:540px; height:14px;}
#PERCENTAGE_2 { FONT-SIZE: 9pt; COLOR: #00a6a1; LEFT: 658px; FONT-FAMILY: "Arial"; POSITION: absolute; TOP: 398px }
#LAUNCH_BUTTON { LEFT: 544px; POSITION: absolute; TOP: 213px; z-index:6}
#START_BUTTON { LEFT: 549px; POSITION: absolute; TOP: 188px; z-index:2}
#CONFIG_BUTTON	{ WIDTH: 95px; HEIGHT: 25px; POSITION: absolute; left: 159px; TOP: 420px; z-index:4;}
#LAUNCHER_VERSION { font-family:Verdana; color:#fff; font-weight: bold; font-size: 9px; POSITION: absolute; TOP: 421px; LEFT:355px; z-index:1 }
#CLIENT_VERSION { font-family:Verdana; color:#fff; font-weight: bold; font-size: 9px; POSITION: absolute; TOP: 421px; LEFT:470px; z-index:1 }
Layer { SCROLLBAR-FACE-COLOR: #222222; SCROLLBAR-HIGHLIGHT-COLOR: #666666; SCROLLBAR-SHADOW-COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #222222; SCROLLBAR-ARROW-COLOR: #666666; SCROLLBAR-TRACK-COLOR: #222222; SCROLLBAR-DARKSHADOW-COLOR: #000000 }
TEXTAREA { SCROLLBAR-FACE-COLOR: #222222; SCROLLBAR-HIGHLIGHT-COLOR: #666666; SCROLLBAR-SHADOW-COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #222222; SCROLLBAR-ARROW-COLOR: #666666; SCROLLBAR-TRACK-COLOR: #222222; SCROLLBAR-DARKSHADOW-COLOR: #000000 }
DIV { SCROLLBAR-FACE-COLOR: #222222; SCROLLBAR-HIGHLIGHT-COLOR: #666666; SCROLLBAR-SHADOW-COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #222222; SCROLLBAR-ARROW-COLOR: #666666; SCROLLBAR-TRACK-COLOR: #222222; SCROLLBAR-DARKSHADOW-COLOR: #000000 }
TD { FONT-SIZE: 8pt; COLOR: #dac8a4; LINE-HEIGHT: 130%; FONT-FAMILY: "Arial"; }
A:link { FONT-SIZE: 8pt; COLOR: #dac8a4; LINE-HEIGHT: 130%; TEXT-DECORATION: none }
A:visited { FONT-SIZE: 8pt; COLOR: #dac8a4; LINE-HEIGHT: 130%; TEXT-DECORATION: none }
A:active { FONT-SIZE: 8pt; COLOR: #dac8a4; LINE-HEIGHT: 130% }
A:hover { FONT-SIZE: 8pt; COLOR: #fff; LINE-HEIGHT: 130%; text-decoration: underline; }
.style1 { FONT-WEIGHT: bold; FONT-SIZE: 11pt; COLOR: #dac8a4; FONT-FAMILY: "Arial"; display: block; margin-bottom: 0px; }
.style2 { FONT-SIZE: 8pt; COLOR: #ffe9a6; font-family: Arial; }
#guide {
position:absolute;
left:9px;
top:315px;
width:335px;
height:36px;
z-index:3;
}
.news, .bnews {width: 260px; padding-bottom: 16px; padding-left: 10px;}
.blocks {
    width: 305px;
    height: 140px;
    margin-left: 10px;
    overflow: hidden;
    overflow-y:auto;

    position: absolute;
    top: 43px;
    left: 0;

    scrollbar-arrow-color: #DC7825;
    scrollbar-base-color: #3E2111;
    scrollbar-3dlight-color: #8F5C07;
    scrollbar-darkshadow-color: #3E2111;
    scrollbar-highlight-color: #3E2111;
    scrollbar-track-color: #A57000;
}

.bnews a {
    text-decoration: none;
    border: none;
    outline : none;
    padding: 0px;
    margin: 0px;
    cursor: pointer;
    height: 38px;
    display: block;
	overflow: hidden;

    background:url(launcher/img/btn_news.png) no-repeat scroll center top;

    width: 185px;
    margin-top: -5px;
}

#news {
    color: #DAC8A4;
    display: block;
    font-family: "Arial";
    font-size: 11pt;
    font-weight: bold;

    position: absolute;
    top: 15px;
    left: 20px;
}

.bnews a:hover {
    background:url(launcher/img/btn_news.png) no-repeat scroll center -39px;
}

a.btn1 {display: block; background: url(launcher/img_e72/button1.gif) no-repeat left top; width: 94px; height: 20px; float: left; margin-right: 7px; POSITION: absolute; left: 10px; TOP: 420px;}
a.btn1:hover {background-image: url(launcher/img_e72/button1h.gif);}
a.btn2 {display: block; background: url(launcher/img_e72/button2.gif) no-repeat left top; width: 44px; height: 20px; float: left; margin-right: 7px; POSITION: absolute; left: 110px; TOP: 420px;}
a.btn2:hover {background-image: url(launcher/img_e72/button2h.gif);}
a.btn3 {display: block; background: url(launcher/img_e72/button3.gif) no-repeat left top; width: 81px; height: 20px; float: left;}
a.btn3:hover {background-image: url(launcher/img_e72/button3h.gif);}

a.close {display: block; background: url(launcher/img_e72/close_en.gif) no-repeat left top; width: 13px; height: 13px; float: right;}
a.close:hover {background-image: url(launcher/img_e72/closehover_en.gif);}



.bstart {display: block; width: 132px; height: 130px; background: url(launcher/img_e72/startbutton_off_en.png) no-repeat left top;}

a.blaunch {display: block; width: 132px; height: 130px; background: url(launcher/img_e72/startbutton_on_en.png) no-repeat left top;}
a.blaunch:hover { background: url(launcher/img_e72/startbutton_hover_en.png) no-repeat left top;}

#list a {border:none; outline: none;}
#list a img {border:none;}
</style>
<!--[if lt IE 7]>
<script src="../ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
<style type="text/css">
	/* img, div, a, li, input { behavior: url(iepngfix.htc) } */
	#oDiv, .agpx, #list, .bstart { behavior: url(iepngfix.htc) }
</style>
<script type="text/javascript" src="iepngfix_tilebg.js"></script>
<![endif]-->
<script language="JavaScript">




<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function ViewNotice(no)
{
	MM_showHideLayers('notice','','show','update','','hide')
	notice1.location="read.aspx@code=notice&no="+no;
}
function ViewUpdate(no)
{
	MM_showHideLayers('notice','','hide','update','','show')
	update1.location="read.aspx@code=update&no="+no;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function chback(){
  	arback = new Array("parallel_bg");
	n = arback[rand(arback.length)];
	b = "launcher/img/"  + n + ".jpg";  document.getElementById("back").src = b;
}
function rand ( n ){
  return ( Math.floor ( Math.random ( ) * n ) );
}
//-->
</script>
<!--
<script type="text/javascript" src="http://www.gamexp.ru/auth/jquery.js"></script>
<script type="text/javascript" src="http://www.gamexp.ru/auth/jquery.cookie.js"></script>
<script>
$(function(){
    window.open("http://launcher.rzonline.ru/shopevent20110812.html", "", "width=500, height=650, menubar=0, toolbar=0");
});
</script>
-->
</HEAD>

<BODY bgColor="#ffffff" leftMargin="0" topMargin="0" rightMargin="0" scroll="no" onload="chback();">
<div style="display: none; visibility: hidden; position: absolute;">
<img src="launcher/img_e72/button1h.gif"><img src="launcher/img_e72/button2h.gif"><img src="launcher/img_e72/button3h.gif"><img src="launcher/img_e72/closehover_en.gif"><img src="launcher/img_e72/startbutton_hover.gif"><img src="launcher/img_e72/startbutton_on.gif">
</div>
    <div ID="oDiv" style="background-image: url(launcher/img_e72/bgl.png); width: 704px; height: 60px; position: absolute; left: 0; top: 307px;"></div>
	<!-- <a target="_blank" href="../www.rzonline.ru/gauction.php" class="agpx" title="Аукцион GXP"></a>
	<div id="list" style="position: absolute; top: 120px; left: 11px; background: url(launcher/img_e72/newsbg.png) no-repeat left top; width: 335px; height: 240px; overflow: hidden;">
                <div id="news">News</div>
	    <div class="blocks">
		<table cellSpacing="0" cellPadding="0" width="304" align="center" border="0">

                                                        <tr>
                    <td class="news"><asp:literal id="Literal1" runat="server">04.12.2020 <a target="_blank" href="/"><div class="nikita_online_news_head"><span class="nikita_online_news_4"></span>Welcome!<span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
            <!--                                    <tr>
                    <td class="news"><asp:literal id="Literal2" runat="server">28.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83608"><div class="nikita_online_news_head"><span class="nikita_online_news_4"></span>Лавка Мэвриана! <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                                            <tr>
                    <td class="news"><asp:literal id="Literal3" runat="server">27.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83602"><div class="nikita_online_news_head"><span class="nikita_online_news_4"></span>Урожайный Джекпот - итоги! <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                                            <tr>
                    <td class="news"><asp:literal id="Literal4" runat="server">27.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83353"><div class="nikita_online_news_head"><span class="nikita_online_news_6"></span>Технические работы 27.08.2018 завершены <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                                            <tr>
                    <td class="news"><asp:literal id="Literal5" runat="server">21.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83504"><div class="nikita_online_news_head"><span class="nikita_online_news_4"></span>Ураган скидок! <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                                            <tr>
                    <td class="news"><asp:literal id="Literal6" runat="server">20.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83531"><div class="nikita_online_news_head"><span class="nikita_online_news_4"></span>Темные кубы уже в продаже! <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                                            <tr>
                    <td class="news"><asp:literal id="Literal7" runat="server">20.08.2018 <a target="_blank" href="../www.rzonline.ru/news.php@id=83351"><div class="nikita_online_news_head"><span class="nikita_online_news_6"></span>Технические работы 20.08.2018 завершены <span style="color:red;">>></span></a></div></asp:literal></td>
                </tr>
                            <tr>
                    <td class="bnews"><a href="../rzonline.ru/news.php" title="больше новостей" target="_blank">&nbsp;</a></td>
                </tr>
      
            		</table>
		</div>
		<div style="position: absolute; top: 186px; left: 19px; width: 304px; height: 54px;">
		<span class="style1" style="margin-bottom: 10px;"></span>
		<table cellSpacing="0" cellPadding="0" width="304" align="center" border="0">
			<tr>
				<td width="10"></td>
				<td width="280"><asp:literal id="Literal4" runat="server"></asp:literal><b></b></td>
			</tr>
		</table>
		</div>
          </div> -->
	<div id="guide"></div>
	<asp:Panel id="pnlMsg" Runat="server" Visible="False">
	</asp:Panel>
	<table cellSpacing="0" cellPadding="0" width="704" bgColor="#000000" border="0">
		<tr>
			<td valign="top" style="height: 24px; background: #000 url(launcher/img_e72/linetop.gif) no-repeat center top;">
				<div style="padding: 3px 10px 0 0; text-align: right; height: 24px; cursor: default; position: relative;">
				    <a href="action://DESTROY/" class="close"></a>
				</div>
				<div style="height: 342px; width: 698px;"><IMG height="337" src="launcher/img/parallel_bg.jpg" width="704" id='back'></div>
				<table cellSpacing="0" cellPadding="1" width="675" border="0" style="margin-top: 8px;">
					<tr>
						<td width="109" align="right" style="padding-right: 7px;"><span class="style2">File Upload </span></td>
						<td align="center" width="540">
							<table cellSpacing="0" cellPadding="0" width="540" border="0">
								<tr>
									<td align="center" width="50%" style="color: #000;"></td>
								</tr>
							</table>
						</td>
						<td align="right" class="style2" style="font-size: 8pt; color: #FFE9A6;"></td>
					</tr>
				</table>
				<br>
				<table cellSpacing="0" cellPadding="1" width="675" border="0">
					<tr>
						<td width="109" align="right" style="padding-right: 7px;"><span class="style2">Update status </span></td>
						<td align="center" width="540">
							<table cellSpacing="0" cellPadding="0" width="540" border="0">
								<tr>
									<td align="center" width="50%" style="color: #000;"></td>
								</tr>
							</table>
						</td>
						<td align="right" class="style2" style="font-size: 8pt; color: #FFE9A6;"></td>
					</tr>
				</table>
				<table cellSpacing="0" width="690" cellPadding="0" align="center" border="0">
					<tr>
						<td width="250" height="27">
                            <a href="" target="_blank"><strong>REGISTRATION<strong></a>
                            <a href="" target="_blank"><strong>WEB SITE<strong></a>
                            <!--a href="#" target="_blank" class="btn3"></a-->
                        </td>
						<td width="70">&nbsp;</td>
						<td style="color: #fff;">LAUNCHER&nbsp;</td>
                        <td style="color: #fff;" ID="Span1"><span ID="Span1"></span>&nbsp;</td>
						<td style="color: #fff;">&nbsp;&nbsp;&nbsp;CLIENT&nbsp;</td>
                        <td style="color: #fff;"><span ID="Span2"></span>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div id="notice" align="center" style="BORDER-RIGHT:#000000 1px; BORDER-TOP:#000000 1px; Z-INDEX:8; FILTER:alpha(opacity=90); LEFT:10px; VISIBILITY:hidden; BORDER-LEFT:#000000 1px; WIDTH:680px; BORDER-BOTTOM:#000000 1px; POSITION:absolute; TOP:34px; HEIGHT:300px; BACKGROUND-COLOR:#ffffff; layer-background-color:#000000">
		<div align="right"><a href="javascript:;" onClick="MM_showHideLayers('notice','','hide','update','','hide')"><img src="launcher/img_e72/close_en.gif" width="12" height="12" border="0"></a><br>
		</div>
		<iframe name="notice1" width="660" height="280" frameborder="0" scrolling="auto"></iframe>
</div>
	<div id="update" align="center" style="BORDER-RIGHT:#000000 1px; BORDER-TOP:#000000 1px; Z-INDEX:7; FILTER:alpha(opacity=90); LEFT:10px; VISIBILITY:hidden; BORDER-LEFT:#000000 1px; WIDTH:680px; BORDER-BOTTOM:#000000 1px; POSITION:absolute; TOP:34px; HEIGHT:300px; BACKGROUND-COLOR:#ffffff; layer-background-color:#FFFFFF">
		<div align="right">
			<a href="javascript:;" onClick="MM_showHideLayers('notice','','hide','update','','hide')">
				<img src="launcher/img_e72/close_en.gif" width="12" height="12" border="0"></a>
		</div>
		<iframe name="update1" width="660" height="280" frameborder="0" scrolling="auto"></iframe>
		<br>
</div>
	<div id="button" class="bstart" style="position:absolute; left:545px; top:215px; z-index:2"></div>
	<span ID="START_BUTTON"></span><span ID="MESSAGE"></span><span ID="FILENAME"></span>
	<span ID="PROGRESS_1"></span><span ID="PROGRESS_2"></span><span ID="PERCENTAGE_1"></span>
	<span ID="PERCENTAGE_2"></span><span ID="LAUNCH_BUTTON"></span><span id="CONFIG_BUTTON"></span>
	<span ID="LAUNCHER_VERSION"></span><span ID="CLIENT_VERSION"></span>
</BODY>
</HTML>
