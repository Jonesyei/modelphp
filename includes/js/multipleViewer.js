/**
* 支持多个广告轮换显示的函数,需jQuery框架支持
*
* @author: Eays
* @version: 1.0
*
* html布局格式要求：
<div id="play" class="play">	
	<span class="play_text">
		<ul>
			<li>1</li>
			<!-- N... -->
		</ul>
	</span>
	<p class="play_list">
	<a href="http://www.shunde.gov.cn" target="_blank">
		<img src="http://19.200.57.110/data/2008/10/06/1223263807.gif" title="" alt="gif动画测试" />
	</a>
	<!-- N... -->
	</p>
</div>
*/
var viewerElements = [];
var viewerWrap = [];
function setParam(){
	for(i = 0 ; i < viewerElements.length ; i++){
		viewerWrap.push($(viewerElements[i]));
		viewerWrap[i].t = 0;
		viewerWrap[i].i = 0;
		viewerWrap[i].n = 0;
		viewerWrap[i].id = viewerElements[i];
		viewerWrap[i].count = viewerWrap[i].find("a").size();
	}
}
function setViewSize(viewID){
	$(viewID+" > span").css("margin-top", $(viewID).height() - 22);
	$(viewID+" > span").css("width", $(viewID).width());
	$(viewID+" > p a").css("width", $(viewID).width());
	$(viewID+" > p a").css("height", $(viewID).height());
	
	// 圖片 強制 設定 長寬 terry edit
	//$(viewID+" > p img").css("height", $(viewID).height());
	//$(viewID+" > p img").css("width", $(viewID).width());
}
$(function(){
	setParam();
	
	for(i = 0 ; i < viewerWrap.length ; i++)
	{
		setViewSize(viewerWrap[i].id);
		viewerWrap[i].find("p a:not(:first-child)").hide();
		viewerWrap[i].find("span").attr("current", i);
		 viewerWrap[i].find("span li").click(function() {
		 	var current = $(this.parentNode.parentNode).attr("current");
			var i = $(this).text() - 1;
			viewerWrap[current].n = i;
			if (viewerWrap[current].i >= viewerWrap[current].count) return;
			viewerWrap[current].find("p a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
			$(this).css({"background":"#fff",'color':'#000'}).siblings().css({"background":"#000",'color':'#fff'});
		});
		
		viewerWrap[i].t = setInterval("showAuto("+i+")", 5000);
		
		viewerWrap[i].hover(function(){
			var current = $(this).find("span").attr("current");
			clearInterval(viewerWrap[current].t);
			
			}, 
			function(){
				var current = $(this).find("span").attr("current");
				viewerWrap[current].t = setInterval("showAuto("+current+")", 5000);
			});
	}
})

function showAuto(i)
{
	viewerWrap[i].n = viewerWrap[i].n >= (viewerWrap[i].count - 1) ? 0 : ++viewerWrap[i].n;
	viewerWrap[i].find("span li").eq(viewerWrap[i].n).trigger('click');
}

function proxy(id)
{
	viewerElements.push(id);
}