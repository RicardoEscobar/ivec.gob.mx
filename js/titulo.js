// JavaScript Document
var titletext="Zona Crítica"
var thetext=""
var started=false
var step=0
var times=1

function welcometext()
{
times--
if (times==0)
{
if (started==false)
{
started = true;
document.title = titletext;
setTimeout("anim()",1);
}
thetext = titletext;
}
}

function showstatustext(txt)
{
thetext = txt;
setTimeout("welcometext()",4000)
times++
}

function anim()
{
step++
if (step==9) {step=1}
if (step==1) {document.title='>---'+thetext+'---<'}
if (step==2) {document.title='->--'+thetext+'--<-'}
if (step==3) {document.title='-->-'+thetext+'-<--'}
if (step==4) {document.title='--->'+thetext+'<---'}
if (step==5) {document.title='---<'+thetext+'>---'}
if (step==6) {document.title='--<-'+thetext+'->--'}
if (step==7) {document.title='-<--'+thetext+'-->-'}
if (step==8) {document.title='<---'+thetext+'--->'}
setTimeout("anim()",200);
}

if (document.title)
window.onload=onload=welcometext