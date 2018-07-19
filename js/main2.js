console.log(window.innerWidth);
function start()

{

var
    p=document.getElementById('timetext'),

    text=document.createTextNode('Hello, This is a HTML Website.'),
    text2=document.createTextNode('Awesome Website is Designed and provided by Me.'),
    text3=document.createTextNode('If you need this website, Please contact me.'),
    i=0,
    j=0,
    z=0;

   function writ()
{
	var char=text.textContent.charAt(i);
	p.innerHTML+=char;
	i++;
	
	if(i==text.textContent.length)
		  {
                       
			
			  p.innerHTML=' &ensp;';
			  var time2=setInterval(writ2,100);
		}
	
}   ;
function writ2()
{
	var char=text2.textContent.charAt(j);
	p.innerHTML+=char;
	j++;
	
       if(j==text2.textContent.length)
		  {
                       
		  p.innerHTML=' &ensp;';
			  var time3=setInterval(writ3,100);
		}
		
		
}
	
function writ3()
{
	var char=text3.textContent.charAt(z);
	p.innerHTML+=char;
	z++;
	
       if(z==text3.textContent.length)
		  {
                       
		  p.innerHTML=' &ensp;';
			  start();
		}
		
		
}


var time=setInterval(writ,100);

};

	//start();
var v=0.14564;
function op()
	
	  {
		  
	var we=document.getElementById('we');
		  we.style.opacity+=0.840;
	
	  }
		setInterval(op,100);

	var arr=document.getElementById('arrow');
window.onscroll=function()

	{
	if(window.scrollY>=1)
		{
		arr.style.display='block';
		}
	if(window.scrollY==0)
		{
		arr.style.display='none';	
			
		}
	}
	
arr.onclick=function()
{
	window.scrollTo(0,0);
	
	
}

    var but2=document.getElementById('but');

	

start();	

	
