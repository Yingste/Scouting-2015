<?php

// get the q parameter from URL
$q=$_REQUEST["q"]; 
$team="";


function console($ctext){
	$time = time();
$console = $time . " : " . $ctext . "\n";
  file_put_contents('console.txt',$console, FILE_APPEND);
}



console("ajax connection worked");

// !!!!!!!!!!!!!!!!!!!!When inputing teams for teams with less than 4 charactors include a zero to fill the 4 slots
// the program will only track corectly if every slot contains 4 charactors

//sample
/*if ($q=="1")
{
	$team .="3488".","."1850".","."4302".","."4972".","."2830".","."2358";
}*/

/*
if ($q=="1")
{
$team .="0461".","."0020".","."1114".","."4488".","."0330".","."0447";
}

if ($q=="2")
{
$team .="0340".","."0071".","."1730".","."0233".","."1310".","."1732";
}

if ($q=="3")
{
$team .="0225".","."0195".","."2614".","."0045".","."0368".","."0469";
}

if ($q=="4")
{
$team .="1806".","."1477".","."1718".","."0399".","."0494".","."0179";
}

if ($q=="5")
{
$team .="0359".","."2337".","."0254".","."0027".","."1625".","."1741";
}

if ($q=="6")
{
$team .="0148".","."0910".","."4039".","."2468".","."2481".","."1108";
}

if ($q=="7")
{
$team .="0067".","."0503".","."1640".","."0234".","."0573".","."0011";
}

if ($q=="8")
{
$team .="3683".","."0125".","."0107".","."1024".","."0074".","."1023";
}

if ($q=="9")
{
$team .="1619".","."2056".","."0868".","."0624".","."1086".","."2867";
}

if ($q=="10")
{
$team .="3478".","."2013".","."2451".","."0016".","."2175".","."2590";
}

if ($q=="0011")
{
$team .="3098".","."0118".","."1817".","."2928".","."0033".","."0051";
}

if ($q=="12")
{
$team .="1241".","."0461".","."0359".","."4265".","."0071".","."0573";
}

if ($q=="13")
{
$team .="0447".","."0234".","."2614".","."1741".","."0179".","."1310";
}

if ($q=="14")
{
$team .="4488".","."0254".","."0011".","."4039".","."0368".","."0125";
}

if ($q=="15")
{
$team .="1732".","."1024".","."2337".","."0503".","."1108".","."0624";
}

if ($q=="0016")
{
$team .="1114".","."0074".","."0868".","."0118".","."2468".","."0027";
}

if ($q=="17")
{
$team .="1625".","."1619".","."0233".","."0469".","."2451".","."1806";
}

if ($q=="18")
{
$team .="0020".","."4265".","."0494".","."0148".","."0225".","."2867";
}

if ($q=="19")
{
$team .="0033".","."0330".","."0016".","."2175".","."0067".","."1023";
}

if ($q=="20")
{
$team .="1730".","."0051".","."1086".","."0910".","."0045".","."1640";
}

if ($q=="21")
{
$team .="3683".","."0195".","."1241".","."1817".","."2013".","."0399";
}

if ($q=="22")
{
$team .="3478".","."2928".","."1718".","."2481".","."0340".","."0107";
}

if ($q=="23")
{
$team .="2590".","."3098".","."0447".","."1477".","."2056".","."2337";
}

if ($q=="24")
{
$team .="2175".","."0469".","."0027".","."0071".","."1741".","."0020";
}

if ($q=="25")
{
$team .="1732".","."0461".","."2468".","."2451".","."1640".","."0368";
}

if ($q=="26")
{
$team .="0011".","."1625".","."0494".","."1108".","."0033".","."1241";
}

if ($q=="27")
{
$team .="0179".","."1086".","."0233".","."3683".","."0067".","."0225";
}

if ($q=="28")
{
$team .="0624".","."2590".","."4488".","."0045".","."0074".","."1817";
}

if ($q=="29")
{
$team .="0118".","."0254".","."0107".","."0359".","."2867".","."0399";
}

if ($q=="30")
{
$team .="0868".","."0234".","."1718".","."1619".","."0148".","."0051";
}

if ($q=="31")
{
$team .="1806".","."2481".","."1023".","."1730".","."4265".","."0195";
}

if ($q=="32")
{
$team .="0125".","."1310".","."3478".","."0503".","."1114".","."3098";
}

if ($q=="0033")
{
$team .="2928".","."4039".","."0573".","."0016".","."1024".","."2056";
}

if ($q=="34")
{
$team .="1477".","."2614".","."0330".","."0340".","."0910".","."2013";
}

if ($q=="35")
{
$team .="0020".","."0399".","."0469".","."1732".","."0234".","."0051";
}

if ($q=="36")
{
$team .="0225".","."0447".","."1108".","."0254".","."2451".","."2175";
}

if ($q=="37")
{
$team .="1086".","."1718".","."0503".","."0461".","."2590".","."1741";
}

if ($q=="38")
{
$team .="0045".","."2481".","."2056".","."0071".","."0011".","."2337";
}

if ($q=="39")
{
$team .="2013".","."0494".","."1023".","."0359".","."2468".","."1619";
}

if ($q=="40")
{
$team .="1477".","."1730".","."0368".","."0125".","."2928".","."0624";
}

if ($q=="41")
{
$team .="2867".","."1625".","."0573".","."0148".","."0074".","."3478";
}

if ($q=="42")
{
$team .="1640".","."0016".","."3098".","."0027".","."0107".","."4265";
}

if ($q=="43")
{
$team .="0179".","."0340".","."0330".","."1024".","."0118".","."1241";
}

if ($q=="44")
{
$team .="0195".","."1310".","."0033".","."4488".","."0233".","."0868";
}

if ($q=="45")
{
$team .="1817".","."4039".","."0067".","."1806".","."1114".","."2614";
}

if ($q=="46")
{
$team .="3683".","."0071".","."0399".","."0910".","."0447".","."1625";
}

if ($q=="47")
{
$team .="2867".","."0234".","."0461".","."1023".","."1477".","."2928";
}

if ($q=="48")
{
$team .="0179".","."0254".","."0624".","."0494".","."2481".","."0469";
}

if ($q=="49")
{
$team .="2056".","."0573".","."0107".","."0233".","."1108".","."0051";
}

if ($q=="50")
{
$team .="0503".","."0033".","."1730".","."1619".","."0027".","."4039";
}

if ($q=="0051")
{
$team .="0340".","."0016".","."2337".","."1114".","."1086".","."0148";
}

if ($q=="52")
{
$team .="4488".","."1241".","."1741".","."1732".","."0067".","."1806";
}

if ($q=="53")
{
$team .="0074".","."0330".","."2175".","."0195".","."3098".","."0359";
}

if ($q=="54")
{
$team .="2013".","."0225".","."0045".","."1310".","."0118".","."1640";
}

if ($q=="55")
{
$team .="4265".","."0910".","."2451".","."1817".","."0125".","."0868";
}

if ($q=="56")
{
$team .="0368".","."0020".","."0011".","."2590".","."3683".","."3478";
}

if ($q=="57")
{
$team .="2468".","."1024".","."0071".","."2614".","."1718".","."0254";
}

if ($q=="58")
{
$team .="1741".","."4039".","."0494".","."0330".","."0233".","."1023";
}

if ($q=="59")
{
$team .="0469".","."2013".","."0148".","."3098".","."1806".","."0461";
}

if ($q=="60")
{
$team .="0910".","."2928".","."0359".","."0503".","."4488".","."0225";
}

if ($q=="61")
{
$team .="1241".","."2337".","."0868".","."1730".","."0107".","."0020";
}

if ($q=="62")
{
$team .="0051".","."0118".","."1477".","."3478".","."1024".","."4265";
}

if ($q=="63")
{
$team .="1108".","."0027".","."0067".","."2867".","."3683".","."0045";
}

if ($q=="64")
{
$team .="0399".","."1086".","."2468".","."2175".","."1310".","."0011";
}

if ($q=="65")
{
$team .="0074".","."1619".","."1640".","."2614".","."2056".","."0340";
}

if ($q=="66")
{
$team .="1625".","."1817".","."0368".","."0447".","."0179".","."0016";
}

if ($q=="67")
{
$team .="0624".","."2451".","."1114".","."1718".","."0195".","."0573";
}

if ($q=="68")
{
$team .="1732".","."2590".","."2481".","."0033".","."0125".","."0234";
}

if ($q=="69")
{
$team .="0910".","."1806".","."4488".","."2337".","."2175".","."0107";
}

if ($q=="70")
{
$team .="0118".","."0233".","."0359".","."0011".","."0461".","."2614";
}

if ($q=="71")
{
$team .="0027".","."0225".","."0051".","."1241".","."0447".","."0340";
}

if ($q=="72")
{
$team .="0503".","."0195".","."0071".","."0016".","."1477".","."0494";
}

if ($q=="73")
{
$team .="0033".","."2056".","."1741".","."4265".","."3683".","."1114";
}

if ($q=="0074")
{
$team .="0074".","."4039".","."3098".","."0234".","."2451".","."1086";
}

if ($q=="75")
{
$team .="1310".","."0368".","."1619".","."1024".","."0067".","."2481";
}

if ($q=="76")
{
$team .="2867".","."1108".","."1817".","."0469".","."1730".","."1718";
}

if ($q=="77")
{
$team .="1023".","."0045".","."0179".","."1732".","."0868".","."0573";
}

if ($q=="78")
{
$team .="2468".","."2013".","."0125".","."0020".","."0624".","."1625";
}

if ($q=="79")
{
$team .="2590".","."2928".","."0148".","."0330".","."1640".","."0254";
}

if ($q=="80")
{
$team .="3478".","."0067".","."0033".","."0399".","."0461".","."2337";
}

if ($q=="81")
{
$team .="0494".","."2175".","."0234".","."1024".","."1730".","."1114";
}

if ($q=="82")
{
$team .="1741".","."2867".","."0011".","."0195".","."0179".","."0910";
}

if ($q=="83")
{
$team .="0447".","."0107".","."1732".","."4039".","."2013".","."1086";
}

if ($q=="84")
{
$team .="0233".","."4265".","."0503".","."0074".","."1718".","."0368";
}

if ($q=="85")
{
$team .="3478".","."0225".","."1817".","."2468".","."2056".","."0330";
}

if ($q=="86")
{
$team .="0399".","."0573".","."0027".","."2590".","."2614".","."0125";
}

if ($q=="87")
{
$team .="2451".","."4488".","."1023".","."0148".","."0071".","."0118";
}

if ($q=="88")
{
$team .="0359".","."0051".","."1310".","."0016".","."1806".","."0624";
}

if ($q=="89")
{
$team .="2481".","."1640".","."0868".","."1477".","."1108".","."1625";
}

if ($q=="90")
{
$team .="0254".","."0020".","."0045".","."0340".","."1619".","."3098";
}

if ($q=="91")
{
$team .="0469".","."3683".","."2468".","."1241".","."2928".","."0503";
}

if ($q=="92")
{
$team .="0027".","."0148".","."1024".","."2013".","."0195".","."0011";
}

if ($q=="93")
{
$team .="0225".","."1741".","."0016".","."0461".","."1730".","."0074";
}

if ($q=="94")
{
$team .="0071".","."0107".","."1806".","."0330".","."0234".","."0368";
}

if ($q=="95")
{
$team .="1108".","."0179".","."1619".","."3478".","."4488".","."1114";
}

if ($q=="96")
{
$team .="1477".","."0020".","."1086".","."0573".","."0033".","."1817";
}

if ($q=="97")
{
$team .="3098".","."1732".","."1625".","."1718".","."0067".","."0118";
}

if ($q=="98")
{
$team .="0469".","."2590".","."0340".","."0868".","."4039".","."0359";
}

if ($q=="99")
{
$team .="0125".","."2481".","."0233".","."2867".","."0447".","."1640";
}

if ($q=="100")
{
$team .="4265".","."0045".","."0624".","."2175".","."0399".","."2928";
}

if ($q=="101")
{
$team .="2614".","."2337".","."3683".","."2451".","."0051".","."0494";
}

if ($q=="102")
{
$team .="0910".","."1023".","."1310".","."1241".","."0254".","."2056";
}

*/


if ($q=="1")
{
$team .="5568".","."5551".","."1209".","."4490".","."2200".","."3337";
}
if ($q=="2")
{
$team .="2972".","."3061".","."4213".","."1732".","."1208".","."4090";
}
if ($q=="3")
{
$team .="0931".","."3937".","."5006".","."0418".","."1625".","."4500";
}
if ($q=="4")
{
$team .="0935".","."2773".","."1986".","."4745".","."5040".","."5409";
}
if ($q=="5")
{
$team .="1706".","."2386".","."3179".","."2359".","."0401".","."2040";
}
if ($q=="6")
{
$team .="1939".","."0016".","."4329".","."4330".","."5721".","."4849";
}
if ($q=="7")
{
$team .="4256".","."2481".","."3847".","."5153".","."3616".","."5437";
}
if ($q=="8")
{
$team .="3931".","."2451".","."5454".","."1108".","."1785".","."5259";
}
if ($q=="9")
{
$team .="2395".","."3783".","."3160".","."3612".","."4522".","."3284";
}
if ($q=="10")
{
$team .="1209".","."1732".","."5040".","."5551".","."3937".","."2386";
}
if ($q=="11")
{
$team .="1706".","."2040".","."5721".","."4745".","."1208".","."0931";
}
if ($q=="12")
{
$team .="2481".","."5568".","."4213".","."4256".","."0935".","."4330";
}
if ($q=="13")
{
$team .="4329".","."3847".","."3337".","."1108".","."3061".","."5006";
}
if ($q=="14")
{
$team .="5409".","."5437".","."2200".","."1785".","."0016".","."5454";
}
if ($q=="15")
{
$team .="3783".","."4849".","."4522".","."2395".","."4500".","."2451";
}
if ($q=="16")
{
$team .="3616".","."3179".","."0401".","."1939".","."3931".","."2773";
}
if ($q=="17")
{
$team .="1625".","."3160".","."3612".","."4090".","."0418".","."2359";
}
if ($q=="18")
{
$team .="2972".","."3284".","."4490".","."1986".","."5259".","."5153";
}
if ($q=="19")
{
$team .="5568".","."5454".","."3847".","."3937".","."0016".","."4745";
}
if ($q=="20")
{
$team .="1785".","."2200".","."0931".","."4522".","."4256".","."2386";
}
if ($q=="21")
{
$team .="4329".","."1706".","."1208".","."2773".","."5437".","."3783";
}
if ($q=="22")
{
$team .="3160".","."2451".","."3179".","."3337".","."3616".","."1209";
}
if ($q=="23")
{
$team .="4090".","."5040".","."5259".","."1108".","."2395".","."1939";
}
if ($q=="24")
{
$team .="1732".","."3612".","."4500".","."2481".","."5153".","."1625";
}
if ($q=="25")
{
$team .="0935".","."4490".","."5409".","."0401".","."5006".","."4330";
}
if ($q=="26")
{
$team .="2359".","."2972".","."5721".","."3061".","."4849".","."3284";
}
if ($q=="27")
{
$team .="4213".","."3931".","."2040".","."5551".","."0418".","."1986";
}
if ($q=="28")
{
$team .="4522".","."1108".","."0016".","."1209".","."2773".","."4256";
}
if ($q=="29")
{
$team .="1625".","."5259".","."4329".","."3847".","."1208".","."5040";
}
if ($q=="30")
{
$team .="3937".","."4490".","."5153".","."5409".","."3160".","."1706";
}
if ($q=="31")
{
$team .="3179".","."4745".","."1785".","."2972".","."2395".","."3612";
}
if ($q=="32")
{
$team .="5006".","."3284".","."3616".","."1732".","."2040".","."4330";
}
if ($q=="33")
{
$team .="1986".","."3931".","."2359".","."1939".","."2451".","."2200";
}
if ($q=="34")
{
$team .="5454".","."5551".","."2481".","."0931".","."4090".","."4849";
}
if ($q=="35")
{
$team .="3783".","."2386".","."0418".","."3061".","."5568".","."0935";
}
if ($q=="36")
{
$team .="4500".","."5721".","."3337".","."4213".","."0401".","."5437";
}
if ($q=="37")
{
$team .="4745".","."3284".","."4256".","."4329".","."3179".","."3937";
}
if ($q=="38")
{
$team .="1625".","."4330".","."3616".","."1986".","."1785".","."2395";
}
if ($q=="39")
{
$team .="4522".","."1208".","."2040".","."4490".","."4849".","."5454";
}
if ($q=="40")
{
$team .="2481".","."3612".","."1706".","."3061".","."3931".","."5551";
}
if ($q=="41")
{
$team .="5153".","."5040".","."0401".","."5437".","."2451".","."1209";
}
if ($q=="42")
{
$team .="4500".","."1108".","."2972".","."3160".","."5721".","."5568";
}
if ($q=="43")
{
$team .="2200".","."2773".","."2386".","."5259".","."4213".","."5006";
}
if ($q=="44")
{
$team .="1939".","."3783".","."4090".","."3847".","."5409".","."0418";
}
if ($q=="45")
{
$team .="0935".","."0931".","."3337".","."2359".","."0016".","."1732";
}
if ($q=="46")
{
$team .="4329".","."4256".","."2395".","."1209".","."2481".","."0401";
}
if ($q=="47")
{
$team .="5551".","."4490".","."4745".","."1625".","."3179".","."5437";
}
if ($q=="48")
{
$team .="4849".","."4213".","."2386".","."3931".","."3160".","."3937";
}
if ($q=="49")
{
$team .="5006".","."0418".","."5040".","."5454".","."3616".","."5721";
}
if ($q=="50")
{
$team .="3337".","."0016".","."4090".","."3783".","."1986".","."1706";
}
if ($q=="51")
{
$team .="5259".","."3061".","."1732".","."5409".","."2359".","."4500";
}
if ($q=="52")
{
$team .="1208".","."5568".","."3284".","."1785".","."1939".","."4522";
}
if ($q=="53")
{
$team .="0935".","."1108".","."2040".","."2200".","."2972".","."5153";
}
if ($q=="54")
{
$team .="2773".","."4330".","."2451".","."0931".","."3847".","."3612";
}
if ($q=="55")
{
$team .="5006".","."1986".","."3160".","."0016".","."3179".","."2481";
}
if ($q=="56")
{
$team .="4490".","."4256".","."3616".","."4329".","."3061".","."4090";
}
if ($q=="57")
{
$team .="0401".","."3337".","."1732".","."5454".","."4522".","."4745";
}
if ($q=="58")
{
$team .="5409".","."1939".","."4213".","."1625".","."2040".","."2972";
}
if ($q=="59")
{
$team .="2451".","."1108".","."3612".","."1208".","."3937".","."0935";
}
if ($q=="60")
{
$team .="5259".","."1209".","."0418".","."4849".","."1785".","."1706";
}
if ($q=="61")
{
$team .="3783".","."4330".","."5568".","."2200".","."5551".","."5040";
}
if ($q=="62")
{
$team .="4500".","."5437".","."0931".","."3931".","."3847".","."3284";
}
if ($q=="63")
{
$team .="5153".","."5721".","."2773".","."2359".","."2386".","."2395";
}
if ($q=="64")
{
$team .="1986".","."5454".","."1939".","."4522".","."4329".","."0935";
}
if ($q=="65")
{
$team .="0016".","."4849".","."1209".","."1625".","."4090".","."4745";
}
if ($q=="66")
{
$team .="4330".","."2481".","."3937".","."5259".","."2972".","."3337";
}
if ($q=="67")
{
$team .="2200".","."3179".","."4500".","."3616".","."5040".","."1706";
}
if ($q=="68")
{
$team .="2451".","."3847".","."5551".","."5721".","."5409".","."2386";
}
if ($q=="69")
{
$team .="0931".","."2359".","."5153".","."3783".","."4213".","."1785";
}
if ($q=="70")
{
$team .="3284".","."0401".","."1108".","."3612".","."4490".","."0418";
}
if ($q=="71")
{
$team .="3160".","."5437".","."3061".","."5568".","."2040".","."2773";
}
if ($q=="72")
{
$team .="1208".","."3931".","."2395".","."5006".","."1732".","."4256";
}
if ($q=="73")
{
$team .="4330".","."3847".","."2972".","."1209".","."1706".","."5454";
}
if ($q=="74")
{
$team .="5259".","."4522".","."3616".","."5721".","."0935".","."4213";
}
if ($q=="75")
{
$team .="3612".","."4745".","."1939".","."4490".","."2386".","."4500";
}
if ($q=="76")
{
$team .="5153".","."4090".","."5409".","."0931".","."5568".","."3179";
}
if ($q=="77")
{
$team .="2773".","."5040".","."1625".","."3337".","."4256".","."3931";
}
if ($q=="78")
{
$team .="3061".","."3937".","."2040".","."2395".","."0016".","."0401";
}
if ($q=="79")
{
$team .="4849".","."1986".","."5437".","."1732".","."1108".","."3783";
}
if ($q=="80")
{
$team .="0418".","."2200".","."3284".","."1208".","."2451".","."2481";
}
if ($q=="81")
{
$team .="1785".","."3160".","."2359".","."4329".","."5006".","."5551";
}
if ($q=="82")
{
$team .="5721".","."4090".","."4522".","."5153".","."4330".","."3931";
}
if ($q=="83")
{
$team .="4745".","."1209".","."3061".","."5259".","."0931".","."1939";
}
if ($q=="84")
{
$team .="4213".","."1108".","."5454".","."3179".","."3783".","."5409";
}
if ($q=="85")
{
$team .="4256".","."1625".","."1706".","."0935".","."3284".","."2451";
}
if ($q=="86")
{
$team .="1208".","."5551".","."2359".","."4500".","."0016".","."3616";
}
if ($q=="87")
{
$team .="0418".","."2395".","."3337".","."4329".","."2972".","."2386";
}
if ($q=="88")
{
$team .="4849".","."3612".","."5006".","."5568".","."5437".","."5040";
}
if ($q=="89")
{
$team .="3937".","."1785".","."2773".","."2040".","."4490".","."2481";
}
if ($q=="90")
{
$team .="1732".","."2200".","."1986".","."3847".","."0401".","."3160";
}















// Output "no team" if no team was found
// or output the correct values 
echo $team==="" ? "no team" : $team;

?>
